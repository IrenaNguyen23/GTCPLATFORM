<?php
    $post_type = 'buy';
    if(empty($products))
    {
        $category_id = $category_sub->id??$category->id;
        
        $products = $modelProduct->setCategory($category_id)->getList([
            'post_type' => $post_type??''
        ]);
    }
    $category_folder = $category_folder??'';
    
?>
<?php if(empty($category_sub) && !empty($categories)): ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $products = $modelProduct->setCategory($category_item->id)->getList([
                'post_type' => $post_type??'sell',
                'transportation' => $transportation??0
            ]);

            $view = ($category_folder??'').'.product-list';
            if(!empty($category_folder) && \View::exists($category_folder.'.'. $category_item->slug ."-$post_type"))
            {
                $view = $category_folder.'.'. $category_item->slug ."-$post_type";
            }
            
        ?>
        <div class="mb-3">
            <h4><?php echo e($category_item->name); ?></h4>
            <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php
        $view = $templatePath.'.product.product_list';
        if(!empty($category_path) && \View::exists($category_path . '.'. $category_sub->slug))
            $view = $category_path . '.'. $category_sub->slug;
    ?>
    <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/van-chuyen/yeu-cau-chao-gia.blade.php ENDPATH**/ ?>