<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPORT SHOP</title>
    <!--link css-->
    <link rel="stylesheet" type="text/css" title="" href="<?php echo e(__BASE_URL__); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php echo e(__BASE_URL__); ?>/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php echo e(__BASE_URL__); ?>/css/slick.min.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php echo e(__BASE_URL__); ?>/css/slick-theme.min.css">
    <link rel="stylesheet" href="<?php echo e(url('public/admin_assets/dist/css/jquery.toast.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(__BASE_URL__); ?>/css/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php echo e(__BASE_URL__); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php echo e(__BASE_URL__); ?>/css/responsive.css">
    <?php echo toastr_css(); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <script type="text/javascript" src="<?php echo e(__BASE_URL__); ?>/js/jquery.min.js"></script>
</head>
<body> 
    <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript" src="<?php echo e(__BASE_URL__); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(__BASE_URL__); ?>/js/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo e(__BASE_URL__); ?>/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo e(__BASE_URL__); ?>/js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="<?php echo e(__BASE_URL__); ?>/js/private.js"></script>

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
						$.get('<?php echo e(route('home.search')); ?>', { q: query } , function(data) {
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
                        url: '<?php echo e(route('get.ajax.product')); ?>',
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
                        url: '<?php echo e(route('home.get-add-cart')); ?>',
                        method : 'get',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            console.log(data);
                            count++;
                            $('.hver-cart').html(data);
                            $('#count-cart').html(count);
                            toastr.success('Thêm thành công.');
                        }
                    })
                });
                $('.remove-cart').click(function() {
                    var id = $(this).attr('data-id');
                    var count = $('#count-cart').html();
                    $.ajax({
                        url: '<?php echo e(route('home.get-add-cart')); ?>',
                        method : 'get',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            count--;
                            $('.hver-cart').html(data);
                            $('#count-cart').html(count);
                        }
                    })
                });
			});

			
	</script>
    <?php echo toastr_js(); ?>
    <?php echo app('toastr')->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>