<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<td>
		<input type="text" name="content[filter][<?php echo e($id); ?>][name]" class="form-control" value="<?php echo e(@$value->name); ?>">
	</td>
	<td>
		<input type="text" name="content[filter][<?php echo e($id); ?>][value]" class="form-control" value="<?php echo e(@$value->value); ?>">
	</td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/repeater/row-filter-attribute.blade.php ENDPATH**/ ?>