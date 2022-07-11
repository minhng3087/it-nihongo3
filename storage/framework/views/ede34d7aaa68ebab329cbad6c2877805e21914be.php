<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<?php $product_attribute_types = \App\Models\ProductAttributeTypes::all(); ?>
	<td>
		<select name="product_version[<?php echo e($id); ?>][id_product_attribute_types]" class="form-control">
			<?php $__currentLoopData = $product_attribute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</td>
	<td><input type="text" class="form-control" name="product_version[<?php echo e($id); ?>][key]" required=""></td>
	<td><input type="number" class="form-control" name="product_version[<?php echo e($id); ?>][value]" required=""></td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/repeater/row-products-version.blade.php ENDPATH**/ ?>