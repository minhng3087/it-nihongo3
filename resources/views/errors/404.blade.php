

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPORT SHOP</title>
    <!--link css-->
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/slick.min.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/slick-theme.min.css">
    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{__BASE_URL_FRONTEND__}}/css/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/style.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/responsive.css">
    @toastr_css
    @yield('css')
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/jquery.min.js"></script>
</head>
<body> 
    <main>
        <section id="error">
            <div class="container">
                <div class="content">
                    <div class="info-err text-center">
                        <img src="{{ __BASE_URL_FRONTEND__}}/images/404.png" class="img-fluid" alt="">
                        <h1>Trang bạn tìm kiếm không tồn tại</h1>
                        <div class="gohome">
                            <a href="{{ url('/') }}" class="robo-bold">Trở về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/slick.min.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/private.js"></script>

    @toastr_js
    @toastr_render
    @yield('scripts')

</body>
</html>
