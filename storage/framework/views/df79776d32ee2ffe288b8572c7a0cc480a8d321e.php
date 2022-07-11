<label class="control-label required" for="current-slug" aria-required="true">Đường dẫn:</label>
<span id="sample-permalink">
	<a class="permalink" target="_blank" href="<?php echo e(asset('san-pham/'.$data->slug )); ?>">
    	<span class="default-slug">
    		<?php echo e(asset('san-pham')); ?>/<span id="editable-post-name"><?php echo e($data->slug); ?></span>
    	</span>
	</a>
</span>
<span id="edit-slug-buttons">
    <button type="button" class="btn btn-secondary" id="change_slug">Sửa</button>
    <button type="button" class="save btn btn-secondary" id="btn-ok" style="display: none;">Ok</button>
    <button type="button" class="cancel button-link">Hủy</button>
</span>
<input type="hidden" id="current-slug"  value="<?php echo e($data->slug); ?>">
<input type="hidden" id="baseUrl" value="<?php echo e(asset('san-pham')); ?>">
<input type="hidden" id="idPost" value="<?php echo e($data->id); ?>">


<?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/products/permalink.blade.php ENDPATH**/ ?>