<?php 
namespace App\Services\Interface;

interface ProductServiceInterface extends BaseServiceInterface{

    function getProductWithCategoryById($id);
    function getProductWithCategory();

}


?>


