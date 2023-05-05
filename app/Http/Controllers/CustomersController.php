<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Jsonable;

class CustomersController extends Controller
{
    protected $customer;

    public function __construct(Customers $customer)
    {
        $this->customer = $customer;
    }

    /**
     * View list customer
     *
     * @param Request $request
     * 
     * @return void
     */
    public function index(Request $request)
    {
        $filter = $request->all();

        //Get list customer
        $listCustomer = $this->customer->getList($filter);

        return view('customer.index', [
            'LIST' => $listCustomer,
            'page' => $filter['page'] ?? 1,
            'perpage' => $filter['perpage'] ?? 10,
            'filter' => $filter
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show($customerId)
    {
        //Get info customer
        $info = $this->customer->find($customerId);

        $mImage = app()->get(Images::class);
        $mImage->path = '123456.png';

        $info->images()->save($mImage);

        return view('customer.show', [
            'info' => $info
        ]);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
