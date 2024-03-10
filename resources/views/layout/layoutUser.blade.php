<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTP8">
    <meta name="Viewport" content="width=device-width, inital-scale=1.0">
    <title>@yield('title_user','Blog system')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary"data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">&copy Test_website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto ms-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">หน้าแรก</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        ระบบสมาชิก
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/">รายชื่อสมาชิกทั้งหมด</a></li>
                      <li><a class="dropdown-item" href="/create">สร้างสมาชิก</a></li>

                    </ul>
                  </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        ระบบจัดการจังหวัดและอำเภอ
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/Province">จัดการจังหวัด</a></li>
                      <li><a class="dropdown-item" href="/Amphure">จัดการอำเภอ</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('logout') }}">ออกจากระบบ</a>
              </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container py-2">
    @yield('content_user')
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
