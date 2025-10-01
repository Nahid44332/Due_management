@extends('backend.master')

@section('content')
<div style="min-height:90vh; display:flex; justify-content:center; align-items:center; background:var(--bg);">
    <div class="profile-card">
        <div class="avatar">
            <img src="{{asset('backend/images/admin/'.$user->image)}}" alt="avatar">
        </div>
        <h2>{{$user->name }}</h2>
        <p>{{$user->email}}</p>
        <div class="buttons">
            <a href="{{url('/admin/profile-update')}}" class="btn">Update Profile</a>
            <a href="{{url('/admin/change-password')}}" class="btn">Change Password</a>
        </div>
    </div>
</div>

<style>
    .profile-card {
        width: 360px;
        padding: 30px;
        border-radius: 20px;
        background: var(--bg);
        box-shadow: 9px 9px 16px var(--shadow-dark),
                    -9px -9px 16px var(--shadow-light);
        text-align: center;
    }

    .profile-card .avatar img {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        box-shadow: inset 6px 6px 12px var(--shadow-dark),
                    inset -6px -6px 12px var(--shadow-light);
    }

    .profile-card h2 {
        font-size: 22px;
        margin: 8px 0 4px;
        color: var(--text);
    }

    .profile-card p {
        font-size: 14px;
        color: var(--text);
        margin-bottom: 20px;
        opacity: 0.8;
    }

    .profile-card .buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .profile-card .btn {
        padding: 10px 20px;
        border-radius: 12px;
        background: var(--bg);
        box-shadow: 6px 6px 14px var(--shadow-dark),
                    -6px -6px 14px var(--shadow-light);
        text-decoration: none;
        color: var(--text);
        font-size: 14px;
        font-weight: 500;
        transition: 0.3s;
    }

    .profile-card .btn:hover {
        box-shadow: inset 4px 4px 8px var(--shadow-dark),
                    inset -4px -4px 8px var(--shadow-light);
        color: var(--primary);
    }
</style>
@endsection
