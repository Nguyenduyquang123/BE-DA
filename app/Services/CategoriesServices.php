<?php
namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Services\Interface\BaseServiceInterface;


class CategoriesServices extends Baseservice 
{
    protected CategoryRepository $Category;
  

    public function __construct(CategoryRepository $Category)
    {
        parent::__construct($Category);
        $this->Category = $Category;
    }

    

}

?>