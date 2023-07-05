<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Events\CustomerCalling;

class CustomerController extends Controller
{
    public function call()
    {
        return view('customers.call'); 
    }
    
    public function calling()
    {
        broadcast(new CustomerCalling());
        return view('customers.wait');
    }
}
?>