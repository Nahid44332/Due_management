@extends('backend.master')

@section('content')
<style>
  .customer-card {
    max-width: 600px;
    margin: 50px auto;
    padding: 40px;
    border-radius: 20px;
    box-sizing: border-box;
    box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #fff;
    background: var(--card-bg, #e0e5ec);
  }

  .customer-card h3 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.6rem;
    color: #6c63ff;
  }

  .form-group {
    margin-bottom: 25px;
    padding-right: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: var(--label-color, #333);
  }

  .form-group input {
    width: 100%;
    padding: 15px 20px;
    border-radius: 20px;
    border: none;
    font-size: 1rem;
    background: var(--input-bg, #e0e5ec);
    color: var(--input-color, #333);
    box-shadow: inset 6px 6px 12px #a3b1c6, inset -6px -6px 12px #fff;
    outline: none;
  }

  button.submit-btn {
    width: 100%;
    padding: 18px;
    border: none;
    border-radius: 20px;
    font-size: 1.1rem;
    background: #6c63ff;
    color: white;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 6px 6px 12px #a3b1c6, -6px -6px 12px #fff;
    transition: 0.2s;
  }

  /* --- Dark Mode --- */
  .dark .customer-card {
    background: #2b2b2b;
    box-shadow: 6px 6px 12px #1a1a1a, -6px -6px 12px #3a3a3a;
  }

  .dark .form-group label {
    color: #e0e0e0;
  }

  .dark .form-group input {
    background: #2b2b2b;
    color: #fff;
    box-shadow: inset 6px 6px 12px #1a1a1a, inset -6px -6px 12px #3a3a3a;
  }

  .dark button.submit-btn {
    box-shadow: 6px 6px 12px #1a1a1a, -6px -6px 12px #3a3a3a;
  }
</style>

<div class="main-content">
  <div class="customer-card">
    <h3>Add New Customer</h3>

    <form action="{{url('/admin/add-customer/store')}}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
      </div>

      <div class="form-group">
        <label for="total_pay">Total Payment</label>
        <input type="number" name="total_pay" id="total_pay" step="0.01" value="0">
      </div>

      <div class="form-group">
        <label for="payment">Now Payment</label>
        <input type="number" name="payment" id="payment" step="0.01" value="0">
      </div>

      <div class="form-group">
        <label for="total_due">Total Due</label>
        <input type="number" name="total_due" id="total_due" step="0.01" value="0">
      </div>

      <button type="submit" class="submit-btn">Add Customer</button>
    </form>
  </div>
</div>
@endsection
