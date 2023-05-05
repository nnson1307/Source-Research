<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\OrderTable;
use SplDoublyLinkedList;

class TestController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        // $mCustomer = app()->get(CustomerTable::class);
        // $mOrder = app()->get(OrderTable::class);

        //Lấy ds khách hàng
        // $customer = $mCustomer::all();

        //Lấy ds đơn hàng của KH
        // $getOrderByCustomer = $mCustomer::find(1)->orders()->first();

        // $infoOrder = $mOrder::find(1);

        // $infoOrder->customer


        // return CustomerResource::collection(Customer::all());
    }
}
