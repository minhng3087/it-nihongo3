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
    <link rel="stylesheet" href="{{__BASE_URL_BACKEND__}}/dist/css/jquery.toast.min.css">
    <link rel="stylesheet" href="{{__BASE_URL_FRONTEND__}}/css/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/style.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/responsive.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/elegant-icons.css">
    <link rel="stylesheet" type="text/css" title="" href="{{__BASE_URL_FRONTEND__}}/css/themify-icons.css">

    @toastr_css
    @yield('css')
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/jquery.min.js"></script>
</head>
<body> 
    @include('frontend.layouts.header')
    <main>
        @yield('content')
    </main>
    @include('frontend.layouts.footer')
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/slick.min.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/private.js"></script>
    
    <script type="text/javascript" src="{{__BASE_URL_FRONTEND__}}/js/lte-ie7.js"></script>
    @toastr_js
    @toastr_render
    <script>
			jQuery(document).ready(function($) {
				$('body').on('keyup', '#query-search', function(event) {
					var query = $(this).val();
					if(query.length == 0){
						$('.list-search').hide().html('');
					}else{
						var btn = $('#icon-search');
						var classIconSearch = 'fa-spin fa fa-spinner';
						var classIcon = 'fa fa-search';
						$('#icon-search i').removeClass(classIcon).addClass(classIconSearch);
						$.get('{{ route('home.search') }}', { q: query } , function(data) {
                            console.log(data);
							$('#icon-search i').removeClass(classIconSearch).addClass(classIcon);
							if(data.trim() != ''){
								$('.list-search').show().html(data)
							}
						});
					}
					
				});

                $('.modal-product').click(function() {
                    event.preventDefault();
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        url: '{{ route('get.ajax.product') }}',
                        method: 'GET',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $('.modal-content').html(data);
                        },
                        
                    });
			    });
                $('.add-cart').click(function() {
                    var id = $(this).attr('data-id');
                    var count = $('#count-cart').html();
                    console.log(count);
                    $.ajax({
                        url: '{{ route('home.get-add-cart') }}',
                        method : 'get',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            console.log(data);
                            count++;
                            $('.cart-hover').html(data);
                            $('#count-cart').html(count);
                            toastr.success('Thêm thành công.');
                        }
                    })
                });
                $('.ti-close').click(function() {
                    var id = $(this).attr('data-id');
                    console.log(id);
                    var qty = $(this).attr('value');
                    var count = $('#count-cart').html(); 
                    $.ajax({
                        url: '{{ route('home.get-remove-cart') }}',
                        method : 'get',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            count -= qty;
                            $('.cart-hover').html(data);
                            $('#count-cart').html(count);
                            toastr.success('Xóa thành công.');
                        }
                    })
                  
                });
			});

			
	</script>
    
    @yield('scripts')

</body>
</html>