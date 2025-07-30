<?php 


namespace App\Services;

use App\Repositories\UserRepository;
use Faker\Provider\Base;

class UserService extends BaseService{
    protected UserRepository $user;

    function __construct(UserRepository $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }


}

?>