<div class="block-search">
    <div class="search-feature">
        <form action="<?php echo e($url_action_filter); ?>" class="form-inline form-search" id="form-search">
            <input type="hidden" name="url_current" value="<?php echo e(url()->current()); ?>">
            <input type="hidden" name="post_type" value="<?php echo e($post_type); ?>">
            <input type="hidden" name="type_get" value="ajax">
            <input type="hidden" name="category_parent" value="<?php echo e($category_id); ?>">
            <div class="input-search input-w-auto icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="keyword" class="form-control" value="<?php echo e(request('keyword')); ?>" placeholder="Tìm kiếm theo tiêu đề, từ khóa..." />
            </div>
            <div class="input-search input-search-small">
                <select name="country" class="select2">
                    <option value="">Xuất xứ hàng hóa</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->name); ?>" <?php echo e(request('country') == $item->name ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="input-search input-search-small">
                <select name="place_sale" class="select2">
                    <option value="">Nơi bán</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->name); ?>" <?php echo e(request('place_sale') == $item->name ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <input type="submit" value="TÌM KIẾM" class="productSearch-btn">
        </form>
    </div>
</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/hang-hoa-xnk/filter-top.blade.php ENDPATH**/ ?>