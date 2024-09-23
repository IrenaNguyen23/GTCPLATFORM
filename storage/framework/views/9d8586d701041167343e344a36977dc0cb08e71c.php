<div class="shop-sidebar">
    <div class="menu-nav">
        <div class="pres-archive" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">
            <div class="name-archive text-uppercase">Loại kho bãi</div>
            <i class="fa fa-angle-down"></i>
        </div>
        <div class="collapse multi-collapse show" id="multiCollapseExample1">
            <div class="item-check">
                <a href="<?php echo e($category->getUrl()); ?>" class="item-radius" title="<?php echo e($category->slug); ?>">Tất cả</a>
            </div>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $menu_active = '';
                    if (url()->current() == $item->getUrl($category->slug??''))
                       $menu_active = ' active';
                ?>
            <div class="item-check">
                <a href="<?php echo e($item->getUrl($category->slug??'')); ?>" class="item-radius<?php echo e($menu_active); ?>" title="<?php echo e($category->slug); ?>"><?php echo e($item->name); ?></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="menu-nav">
        <div class="goods-origin" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="true" aria-controls="multiCollapseExample2">
            <div class="name-origin text-uppercase">Diện tích </div>
            <i class="fa fa-angle-down"></i>
        </div>
        <div class="list-filter-item collapse multi-collapse show" id="multiCollapseExample2">
            <div class="item-check">
                <a href="javascript:;" data-name="acreage" class="item-radius filter-set <?php echo e(request('acreage') == 100 ? 'active' : ''); ?>" title="<100"><= 100 m2</a>
            </div>
            <div class="item-check">
                <a href="javascript:;" data-name="acreage" class="item-radius filter-set <?php echo e(request('acreage') == 100-200 ? 'active' : ''); ?>" title="100-200">100 - 200 m2</a>
            </div>
            <div class="item-check">
                <a href="javascript:;" data-name="acreage" class="item-radius filter-set <?php echo e(request('acreage') == 200-300 ? 'active' : ''); ?>" title="200-300">200 - 300 m2</a>
            </div>
            <div class="item-check">
                <a href="javascript:;" data-name="acreage" class="item-radius filter-set <?php echo e(request('acreage') == 300-400 ? 'active' : ''); ?>" title="300-400">300 - 400 m2</a>
            </div>
            <div class="item-check">
                <a href="javascript:;" data-name="acreage" class="item-radius filter-set <?php echo e(request('acreage') == 400-500 ? 'active' : ''); ?>" title="400-500">400 - 500 m2</a>
            </div>
            <div class="item-check">
                <a href="javascript:;" data-name="acreage" class="item-radius filter-set <?php echo e(request('acreage') == 500 ? 'active' : ''); ?>" title=">500">>= 500 m2</a>
            </div>
        </div>
    </div>

    <?php if ($__env->exists($templatePath .'.product.filter-option',['id' => 112, 'type' => 'price', 'title' => 'Khoảng giá'])) echo $__env->make($templatePath .'.product.filter-option',['id' => 112, 'type' => 'price', 'title' => 'Khoảng giá'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/kho-bai/filter-right.blade.php ENDPATH**/ ?>