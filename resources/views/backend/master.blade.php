<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 @include('backend.include.style')
</head>
<body>
 @include('backend.include.navber')

  <div class="container">
   @include('backend.include.sidebar')

    <div class="main-content">
      @yield('content')
    </div>
  </div>

 @include('backend.include.script')
</body>
</html>
