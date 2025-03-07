<?php
    if(empty($products))
    {
        $category_id = $category_sub->id??$category->id;
        
        $products = $modelProduct->setCategory($category_id)->getList([
            'post_type' => $post_type
        ]);
    }
?>
<div class="row g-3">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 col-md-3">
        <?php if(!empty($category_folder) && \View::exists($category_folder . '.product_item')): ?>
            <?php echo $__env->make($category_folder . '.product_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make($templatePath .'.product.product_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php if($products instanceof \Illuminate\Pagination\AbstractPaginator): ?>
<?php echo $products->links(); ?>

<?php endif; ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/dich-vu-khac/index.blade.php ENDPATH**/ ?>