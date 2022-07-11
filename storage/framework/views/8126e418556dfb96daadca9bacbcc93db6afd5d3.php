<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
    <td class="index"><?php echo e($index); ?></td>
    <td><input type="text" class="form-control" name="content[social][<?php echo e($id); ?>][name]" value="<?php echo e(@$val->name); ?>" ></td>
    <td><input type="text" class="form-control" name="content[social][<?php echo e($id); ?>][icon]" required="" value="<?php echo e(@$val->icon); ?>"></td>
    <td>
        <input type="text" class="form-control" required="" name="content[social][<?php echo e($id); ?>][link]" value="<?php echo e(@$val->link); ?>">
    </td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\m\resources\views/backend/repeater/row-socials.blade.php ENDPATH**/ ?>