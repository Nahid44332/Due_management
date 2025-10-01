<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    // Profile
    public function profile()
    {
        $user = auth()->user();
        return view('backend.admin.profile', compact('user'));
    }

    public function profileUpdate()
    {
        $user = auth()->user();
        return view('backend.admin.update-profile', compact('user'));
    }

    public function profileUpdateStore(Request $request)
    {
           $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

      
      if(isset($request->image)){

            if($user->image && file_exists('backend/images/admin/'.$user->image)){
                unlink('backend/images/admin/'.$user->image);
            }

            $imageName = rand().'-admin'.'.'.$request->image->extension();
            $request->image->move('backend/images/admin/', $imageName);

            $user->image = $imageName;
        }

        $user->save();
        toastr()->success('Profile Update Successfully');
        return redirect('/admin/profile');
    }

    public function changePassword()
    {
        return view('backend.admin.password');
    }

      public function updatePassword(Request $request)
    {
        // Validate input (confirmed মানে password_confirmation চাই)
        $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Please enter your old password',
            'password.required' => 'Please enter a new password',
            'password.min' => 'New password must be at least 8 characters',
            'password.confirmed' => 'New password confirmation does not match',
        ]);

        $user = auth()->user();

        // Manual check of old password (safer for debugging)
        if (! Hash::check($request->current_password, $user->password)) {
            // পুরনো পাসওয়ার্ড মেলেনি
            return back()->withErrors(['current_password' => 'Old password is incorrect.']);
        }

        // Update password (use Hash::make or bcrypt)
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Password updated successfully!');
        return redirect()->back();
    }
}
