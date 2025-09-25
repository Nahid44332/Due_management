<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
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

    public function viewCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $transactions = $customer->transactions()->orderBy('date', 'desc')->get();

        return view('backend.customer.view', compact('customer', 'transactions'));
    }

    public function payDue(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $amount = $request->amount;

        $transactionNo = 'TRX-' . strtoupper(uniqid());

        Transaction::create([
            'transaction_no' => $transactionNo,
            'customer_id' => $customer->id,
            'description' => 'Due Payment',
            'amount' => $amount,
            'date' => now(),
        ]);

        $customer->total_due -= $amount;
        $customer->save();

        toastr()->success('Payment Successful.');
        return redirect('admin/customer/view/'.$customer->id);
    }


    public function customerDelete($id)
    {
        $customer = Customer::with('transactions')->find($id);

        $customer->delete();
        toastr()->success('Customer Delete Successfully.');
        return redirect()->back();
    }
}
