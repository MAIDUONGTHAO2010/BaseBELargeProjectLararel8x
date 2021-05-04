<?php

namespace App\Services;

use App\Repositories\Payment\PaymentRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class PaymentService
{
    protected PaymentRepository $paymentRepository;
    public function __construct(
        PaymentRepository $paymentRepository
    ) 
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index($request)
    {
        $this->paymentRepository->pushCriteria(new RequestCriteria($request));
        
        return $this->paymentRepository->where('user_id', auth()->user()->id)->paginate();
    }

    public function create($attributes)
    {
        $attributes['user_id'] = auth()->user()->id;

        $payment = $this->paymentRepository->create($attributes);
  
        return $payment;
    }

    public function get($attributes)
    {
        $payment = $this->paymentRepository->find($attributes['id']);

        return $payment;
    }

    public function update($attributes)
    {
        $attributes['user_id'] = auth()->user()->id;

        $payment = $this->paymentRepository->find($attributes['id']);

        $payment->update($attributes);

        return $payment;
    }

    public function delete($attributes)
    {
        $this->paymentRepository->delete($attributes['id']);
        
        return response(null, 204);
    }
}