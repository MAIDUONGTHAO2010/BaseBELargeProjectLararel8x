<?php

namespace App\Services;

use App\Repositories\Address\AddressRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class AddressService
{
    protected AddressRepository $addressRepository;
    public function __construct(
        AddressRepository $addressRepository
    ) 
    {
        $this->addressRepository = $addressRepository;
    }

    public function index($request)
    {
        return $this->addressRepository->paginate();
    }

    public function create($attributes)
    {

        $address = $this->addressRepository->create($attributes);
  
        return $address;
    }

    public function get($attributes)
    {
        $address = $this->addressRepository->find($attributes['id']);

        return $address;
    }

    public function update($attributes)
    {

        $address = $this->addressRepository->find($attributes['id']);

        $address->update($attributes);

        return $address;
    }

    public function delete($attributes)
    {
        $this->addressRepository->delete($attributes['id']);
        
        return response(null, 204);
    }
}