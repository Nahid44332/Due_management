<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminDashboard()
    {
        return view('backend.dashboad');
    }

    public function addCustomer()
    {
        return view('backend.customer.create');
    }

    public function CustomerStore(Request $request)
    {
        $customer = new Customer();

        $lastCustomer = Customer::latest('id')->first();
        $nextNumber = $lastCustomer ? $lastCustomer->id + 1 : 1;
        $customer->customer_id = 'CUS-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->total_pay = $request->total_pay;
        $customer->payment = $request->payment;
        $customer->total_due = $request->total_due;

        $customer->save();
        toastr()->success('Customer Added Successfully.');
        return redirect('/admin/customer/list');
    }

    public function CustomerList()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('backend.customer.list', compact('customers'));
    }
}
