<?php
namespace App\Repositories;

use App\Models\Orders;

class OrderRepository extends BaseRepository

{

    function __construct(Orders $Orders)
    {
        parent::__construct($Orders);
    }

}



?>