<div class="numb-rait">
    <?php if($averageVote > 0): ?>
        <span><?php echo e($averageVote); ?></span>
        <?php for($i = 1; $i <= round($averageVote); $i++): ?>
            <i class="fa fa-star"></i>
        <?php endfor; ?>
        <?php for($i = 0; $i < 5- round($averageVote); $i++): ?>
            <i class="fa fa-star-o"></i>
        <?php endfor; ?>
        <label for=""><?php echo e(@$vote_info['all']['total_vote']); ?> đánh giá</label>
    <?php endif; ?>
</div>
<div class="list-review">
    <div class="item">
        <div class="nb" data-star="5">5 <i class="fa fa-star"></i></div>
        <div class="line"><div class="per" style="width: <?php echo e(number_format($vote_info['5']['percent'])); ?>%"></div></div>
        <div class="percent"><?php echo e(number_format($vote_info['5']['percent'])); ?>%<span> | <?php echo e(number_format($vote_info['5']['total_vote'])); ?> đánh giá</span></div>
    </div>
    <div class="item">
        <div class="nb" data-star="4">4 <i class="fa fa-star"></i></div>
        <div class="line"><div class="per" style="width:<?php echo e(number_format($vote_info['4']['percent'])); ?>%"></div></div>
        <div class="percent"><?php echo e(number_format($vote_info['4']['percent'])); ?>%<span> | <?php echo e(number_format($vote_info['4']['total_vote'])); ?> đánh giá</span></div>
    </div>
    <div class="item">
        <div class="nb" data-star="3">3 <i class="fa fa-star"></i></div>
        <div class="line"><div class="per" style="width: <?php echo e(number_format($vote_info['3']['percent'])); ?>%"></div></div>
        <div class="percent"><?php echo e(number_format($vote_info['3']['percent'])); ?>%<span> | <?php echo e(number_format($vote_info['3']['total_vote'])); ?> đánh giá</span></div>
    </div>
    <div class="item">
        <div class="nb" data-star="2">2 <i class="fa fa-star"></i></div>
        <div class="line"><div class="per" style="width: <?php echo e(number_format($vote_info['2']['percent'])); ?>%"></div></div>
        <div class="percent"><?php echo e(number_format($vote_info['2']['percent'])); ?>%<span> | <?php echo e(number_format($vote_info['2']['total_vote'])); ?> đánh giá</span></div>
    </div>
    <div class="item">
        <div class="nb" data-star="1">1 <i class="fa fa-star"></i></div>
        <div class="line"><div class="per" style="width: <?php echo e(number_format($vote_info['1']['percent'])); ?>%"></div></div>
        <div class="percent"><?php echo e(number_format($vote_info['1']['percent'])); ?>%<span> | <?php echo e(number_format($vote_info['1']['total_vote'])); ?> đánh giá</span></div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/components/products/vote-star.blade.php ENDPATH**/ ?>