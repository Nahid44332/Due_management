<div class="navbar">
    <div class="nav-left">
      <div class="menu-btn" onclick="toggleSidebar()">☰</div>
      <h1>Admin Panel</h1>
    </div>
    <div class="nav-right">
      <div class="toggle-btn" onclick="toggleDarkMode()">
        <div class="toggle-circle"></div>
      </div>
      <div class="profile" onclick="toggleDropdown()">
        <img src="{{asset('backend/images/admin/'.$user->image)}}" alt="profile">
        <span>Admin ▼</span>
        <div class="dropdown" id="dropdownMenu">
          <a href="{{url('/admin/profile')}}">Profile</a>
          <a href="{{url('/logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>