<?php
namespace App\Repositories\Interface;


interface ProductRepositoryInterface extends BaseRepositoryInterface{
    function getProductWithCategoryById($id);
    function getProductWithCategory();

}



?>