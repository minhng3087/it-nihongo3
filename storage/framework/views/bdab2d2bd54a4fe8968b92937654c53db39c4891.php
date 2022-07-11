<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="" style="width: 100%; max-width: 650px; margin: 0 auto; border: 1px solid #348dcc; ">
		<div class="header" style="text-align: center; background: #348dcc; padding: 1px; color: #fff;"><h3 style="text-transform: uppercase; margin-top: 5px; margin-bottom: 2px">Thông báo đặt hàng</h3></div>	
		<div class="content" style="padding: 10px;">
			<p>Chào bạn,</p>
			<p>Bạn vừa nhận được một yêu cầu đặt hàng từ <a href="" title=""><?php echo e(@$name); ?> - <?php echo e(@$email); ?></a></p>
			<h3>Thông tin chi tiết</h3>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left:1px solid #dcdcdc;border-right:1px solid #dcdcdc">
				<tbody>
					<tr>
						<td colspan="2" align="center" style="font-family:Arial,Helvetica,sans-serif;background-color:#f2f2f2;padding:8px 20px;border-top:1px solid #dcdcdc"><span style="font-size:13px;color:#252525;font-weight:bold">THÔNG TIN CHI TIẾT</span></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Người đặt:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong><?php echo e(@$name); ?></strong></td>
					</tr>					
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Số điện thoại:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong><?php echo e(@$phone); ?></strong></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Địa chỉ:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>
							<?php echo e(@$address); ?>

						</strong></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Tổng tiền:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong><?php echo e(number_format($total)); ?></strong></td>
					</tr>
			  	</tbody>
			</table>			
			<div class="detail" style="margin-top: 30px;">
				<table cellpadding="0" cellspacing="0" border="0" width="100%;" 
				style="border-left:1px solid #dcdcdc;border-right:1px solid #dcdcdc">
					<tbody>
						<tr>
							<td width="70%" style="font-weight: bolder;">Sản phẩm</td>
							<td style="font-weight: bolder;">Giá</td>
							<td style="font-weight: bolder;">Số lượng</td>
							<td style="font-weight: bolder;">Thành tiền</td>
						</tr>
						<?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($item->name); ?></td>
							<td><?php echo e(number_format($item->price)); ?></td>
							<td><?php echo e($item->qty); ?></td>
							<td><?php echo e(number_format($item->price * $item->qty)); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>	
			</div>
				
		</div>		
	</div>
	<br/>
	<br>
</body>
</html><?php /**PATH C:\xampp\htdocs\m\resources\views/mail/orders.blade.php ENDPATH**/ ?>