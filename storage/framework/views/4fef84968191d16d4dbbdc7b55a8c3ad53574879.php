<?php
    $categories = $categories??$modelCategory->getList([]);
    
    $post_type = request('post_type');
    if(!empty($slug_sub) && $slug_sub == 'hang-nhap-khau')
    {
        $post_type = 'buy';
    }
?>
    <div class="shop-sidebar">
        <div class="menu-nav">
            <div class="pres-archive" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">
                <div class="name-archive">DANH MỤC SẢN PHẨM</div>
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="collapse multi-collapse show" id="multiCollapseExample1">
                <div class="item-check">
                    <?php if($post_type == 'buy'): ?>
                    <a href="<?php echo e(url('hang-hoa-xnk/hang-nhap-khau')); ?>" class="item-radius" title="<?php echo e($category->slug); ?>">Tất cả</a>
                    <?php else: ?>
                    <a href="<?php echo e($category->getUrl()); ?>" class="item-radius" title="<?php echo e($category->slug); ?>">Tất cả</a>
                    <?php endif; ?>
                </div>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $menu_active = '';
                        if (url()->current() == $item->getUrl($category->slug??''))
                           $menu_active = ' active';
                    ?>
                <div class="item-check">
                    <a href="<?php echo e($item->getUrl($category->slug??'', $post_type)); ?>" class="item-radius<?php echo e($menu_active); ?>" title="<?php echo e($category->slug); ?>"><?php echo e($item->name); ?></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
    </div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/hang-hoa-xnk/filter-right.blade.php ENDPATH**/ ?>