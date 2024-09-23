<?php
    $option = \App\Models\ShopOption::find($id);
    $options = $option->posts;
?>

<div class="menu-nav">
    <div class="goods-origin" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="true" aria-controls="multiCollapseExample2">
        <div class="name-origin text-uppercase"><?php echo e($title??$option->name); ?> </div>
        <i class="fa fa-angle-down"></i>
    </div>
    <div class="list-filter-item collapse multi-collapse show" id="multiCollapseExample2">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-check">
                <a href="javascript:;" data-name="<?php echo e($type??'option'); ?>" title="<?php echo e($item->unit); ?>" class="item-radius filter-set <?php echo e(request('option') == $item->name ? 'active' : ''); ?>"><?php echo e($item->name); ?></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/filter-option.blade.php ENDPATH**/ ?>