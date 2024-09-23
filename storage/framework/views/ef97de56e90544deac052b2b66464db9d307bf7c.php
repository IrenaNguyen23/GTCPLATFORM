<div class="block-search">
    <div class="search-feature">
        <form action="<?php echo e($url_action_filter); ?>" class="form-inline form-search" id="form-search">
            <input type="hidden" name="url_current" value="<?php echo e(url()->current()); ?>">
            <input type="hidden" name="type_get" value="ajax">
            <input type="hidden" name="category_parent" value="<?php echo e($category_first->id); ?>">
            <div class="input-search icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="keyword" class="form-control" value="<?php echo e(request('keyword')); ?>" placeholder="Nhập vị trí tuyển dụng" />
            </div>

            <div class="input-search">
                <select class="form-control seaport" name="location_origin">
                    <option value="">Nhập nơi làm việc</option>
                </select>
            </div>

            <div class="input-search icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="price" class="form-control number_format" value="<?php echo e(request('price')); ?>" placeholder="Nhập mức lương" />
            </div>

            <input type="submit" value="TÌM KIẾM" class="productSearch-btn">
        </form>
    </div>
</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/viec-lam/filter-top.blade.php ENDPATH**/ ?>