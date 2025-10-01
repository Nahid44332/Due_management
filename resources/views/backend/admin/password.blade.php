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
    <div class="main-content">
  <div class="customer-card">
    <h3>Update Password</h3>

    <!-- Success Message -->
    @if(session('success'))
      <div class="alert alert-success" style="margin-bottom:15px; color:green;">
        {{ session('success') }}
      </div>
    @endif

    <!-- Validation Errors (general) -->
    @if($errors->any())
      <div class="alert alert-danger" style="margin-bottom:15px; color:red;">
        <ul style="margin:0; padding-left:18px;">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ url('/admin/change-password/update') }}" method="POST">
      @csrf

      <!-- Old Password -->
      <div class="form-group">
        <label for="current_password">Old Password</label>
        <input type="password" name="current_password" id="current_password" required placeholder="Enter old password">
        @error('current_password')
          <small style="color:red">{{ $message }}</small>
        @enderror
      </div>

      <!-- New Password -->
      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" required placeholder="Enter new password">
        @error('password')
          <small style="color:red">{{ $message }}</small>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirm new password">
      </div>

      <button type="submit" class="submit-btn">Update Password</button>
    </form>
  </div>
</div>
@endsection
