<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\CategoriesServices;
use App\Services\Products\ProductServies;
use App\Services\ProductServices;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected CategoriesServices $categoryServices;
    protected ProductServices $productServices;
    
    public function __construct(CategoriesServices $categoryServices , ProductServices $productServices){
        $this->categoryServices = $categoryServices;
        $this->productServices = $productServices;
       
    }

   


    
    public function index()
    {
        $productall = $this->productServices->getProductWithCategory();
     
        return view('admin.products.index',compact('productall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = $this->categoryServices->all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except('images'); 

        $this->productServices->create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sách thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
        $product = $this->productServices->getProductWithCategoryById($id);
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->categoryServices->all();
        $product = $this->productServices->find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(ProductRequest $request, $id)
    {
        $data = $request->except('images');
        $images = $request->file('images');

        $this->productServices->update($id, $data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productServices->delete($id);
        return redirect()->route('admin.products.index')->with('success', 'Xóa thành công.');
    }
}
