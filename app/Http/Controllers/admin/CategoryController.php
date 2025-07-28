<?php

namespace App\Http\Controllers\Admin;
use App\enum\CommonStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Repositories\CategoryRepositoryInterface;
use App\Services\BaseService;
use App\Services\CategoriesServices;
use App\Services\Interface\BaseServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    private $categoryServices;
    public function __construct(BaseServiceInterface $categoryServices){
        $this->categoryServices = $categoryServices;
    }
    public function index()
    {
         $categories = $this->categoryServices->all();
        return view('admin.categories.index',compact('categories'));
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           
            return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $this->categoryServices->create( $request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->categoryServices->find($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, string $id)
    {
     
        $this->categoryServices->update($id, $request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryServices->delete($id);
        return redirect()->route('admin.categories.index')->with('success', 'Xóa thành công.');
    }
}
