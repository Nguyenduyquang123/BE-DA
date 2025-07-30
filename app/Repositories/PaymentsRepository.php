<?php


namespace App\Repositories;

use App\Models\payments;

class PaymentsRepository extends BaseRepository{
    protected payments $payment;
    public function __construct(Payments $payment)
    {
        parent::__construct($payment);
        $this->payment = $payment;
    }
}


?>