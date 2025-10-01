@extends('backend.master')

@section('content')
<style>
  .customer-card {
    max-width: 600px;
    margin: 50px auto;
    padding: 40px;
    border-radius: 20px;
    box-sizing: border-box;
    background: var(--bg, #e0e5ec);
    box-shadow: 6px 6px 12px var(--shadow-dark, #a3b1c6),
                -6px -6px 12px var(--shadow-light, #fff);
  }

  .customer-card h3 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.6rem;
    color: var(--primary, #6c63ff);
  }

  .form-group {
    margin-bottom: 25px;
  }

  .form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: var(--text, #333);
  }

  .form-group input {
    width: 100%;
    padding: 15px 20px;
    border-radius: 20px;
    border: none;
    font-size: 1rem;
    background: var(--bg, #e0e5ec);
    color: var(--text, #333);
    box-shadow: inset 6px 6px 12px var(--shadow-dark, #a3b1c6),
                inset -6px -6px 12px var(--shadow-light, #fff);
    outline: none;
  }

  button.submit-btn {
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 20px;
    font-size: 1.1rem;
    background: var(--primary, #6c63ff);
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 6px 6px 12px var(--shadow-dark, #a3b1c6),
                -6px -6px 12px var(--shadow-light, #fff);
    transition: 0.2s;
  }

  button.submit-btn:hover {
    background: #5a54d6;
  }

  /* --- Dark Mode --- */
  body.dark .customer-card {
    background: #2b2b2b;
    box-shadow: 6px 6px 12px #1a1a1a,
                -6px -6px 12px #3a3a3a;
  }

  body.dark .form-group label {
    color: #e0e0e0;
  }

  body.dark .form-group input {
    background: #2b2b2b;
    color: #fff;
    box-shadow: inset 6px 6px 12px #1a1a1a,
                inset -6px -6px 12px #3a3a3a;
  }

  body.dark button.submit-btn {
    box-shadow: 6px 6px 12px #1a1a1a,
                -6px -6px 12px #3a3a3a;
  }
</style>

<div class="main-content">
  <div class="customer-card">
    <h3>Update Profile</h3>

    <form action="{{url('/admin/profile-update/store')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
      </div>

      <div class="form-group">
        <label for="image">Profile Picture</label>
        <input type="file" name="image" id="image"> <br>
        <img src="{{asset('backend/images/admin/'.$user->image)}}" alt="" height="100" width="100">
      </div>
      <div>
      <button type="submit" class="submit-btn">Update Profile</button>
      </div>
    </form>
  </div>
</div>
@endsection
