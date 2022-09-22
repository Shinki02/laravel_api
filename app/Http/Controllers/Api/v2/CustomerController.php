<?php

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Http\Resources\v2\CustomerResource;
use App\Http\Resources\CustomerCollection;

class CustomerController extends Controller
{
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }
}
