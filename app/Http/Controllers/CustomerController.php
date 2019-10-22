<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->filter_gender) && !empty($request->filter_country))
      {
        $data = Customer::select('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country')
        ->where('Gender', $request->filter_gender)
        ->where('Country', $request->filter_country)
        ->get();
    }
    else if(!empty($request->filter_gender))
    {
        $data = Customer::select('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country')
        ->where('Gender', $request->filter_gender)
        ->get();
    }
   else if(!empty($request->filter_country))
    {
        $data = Customer::select('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country')
        ->where('Country', $request->filter_country)
        ->get();
    }
    else
    {
        $data = Customer::select('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country')
        ->get();
    }
    return datatables()->of($data)->make(true);
}
$country_name = Customer::select('Country')
->groupBy('Country')
->orderBy('Country', 'ASC')
->get();
return view('custom_search', compact('country_name'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
