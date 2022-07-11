<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<td>
		<input type="text" value="<?php echo e(@$value->title); ?>" class="form-control" name="value[list][<?php echo e($id); ?>][title]">
	</td>
	<td>
       <input type="number" value="<?php echo e(@$value->value); ?>" class="form-control" name="value[list][<?php echo e($id); ?>][value]">
	</td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/repeater/row-product-gift.blade.php ENDPATH**/ ?>