<?php
namespace App\Services;

use App\Repositories\PaymentsRepository;

class PaymentsService extends BaseService

{
    protected PaymentsRepository $payments;

    public function __construct(PaymentsRepository $payments)
    {
        parent::__construct($payments);
        $this->payments = $payments;
    }

}



?>