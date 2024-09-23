<?php if(!empty($categories)): ?>
<div class="block-archive">
    <div class="container mb-lg-4 mb-3">
        <div class='page-content'>
            <div class="page-wrapper">
                <div class="nav-scroll">
                    <ul class="nav nav-pills nav-product-tabs" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $menu_active = '';
                                if (url()->current() == $item->getUrl())
                                   $menu_active = ' active';
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($menu_active); ?>" href="<?php echo e($item->getUrl()); ?>"><span><?php echo e($item->name); ?></span></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/news/tabs.blade.php ENDPATH**/ ?>