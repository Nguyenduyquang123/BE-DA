<?php 
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\Interface\ProductServiceInterface;

class ProductServices extends BaseService implements ProductServiceInterface {

    protected ProductRepository $product;

    public function __construct(ProductRepository $product)
    {
        parent::__construct($product);
        $this->product = $product;
    }
    function getProductWithCategoryById($id)
    {
        return $this->product->getProductWithCategoryById($id);
    }
    function getProductWithCategory()
    {
        return $this->product->getProductWithCategory();
    }
    function create(array $data)
    {
        $images = request()->file('images');
        $imagePaths = [];

        if ($images && is_array($images)) {
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imageName);
                $imagePaths[] = 'product_images/' . $imageName;
            }
        }

        $data['image_url'] = json_encode($imagePaths);

        return $this->product->create($data);
    }
    function update($id, array $data)
    {
        $product = $this->product->find($id);

        if (!$product) {
            throw new \Exception("Product not found");
        }

        $images = request()->file('images');
        $imagePaths = [];

        if ($images && is_array($images)) {
            $oldImages = json_decode($product->image_url, true);
            if (is_array($oldImages)) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path($oldImage);
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }
            }

     
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imageName);
                $imagePaths[] = 'product_images/' . $imageName;
            }

            $data['image_url'] = json_encode($imagePaths);
        }

        return $product->update($data);
    }
    
}


?>