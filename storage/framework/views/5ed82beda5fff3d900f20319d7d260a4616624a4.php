<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<td>
		<input type="text" name="content_services_warranty[services][<?php echo e($id); ?>][title]" class="form-control" value="<?php echo e(@$value->title); ?>">
	</td>
	<td>
		<input type="number" name="content_services_warranty[services][<?php echo e($id); ?>][value]" class="form-control" value="<?php echo e(@$value->value); ?>">
	</td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<?php /**PATH /var/www/html/gdigital/resources/views/backend/repeater/row-products-services-warranty.blade.php ENDPATH**/ ?>