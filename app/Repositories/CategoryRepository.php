<?php 
namespace App\Repositories;

use App\Models\Categories;
use App\Repositories\Interface\BaseRepositoryInterface;
use App\Repositories\Interface\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository 
{
     public function __construct(Categories $Categories)
    {
        parent::__construct($Categories);
    }
}




?>
