

<?php $__env->startSection('seo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $category_first = $category_sub??$categories->first();
        if($category_first)
            $category_filters = $modelCategory->getList(['parent' => $category_first->id]);

        $post_type = request('post_type')??'sell';

        
    ?>

    <div class="container text-center">
        <?php echo htmlspecialchars_decode($category->content); ?>

    </div>

    <div class="block-archive">
        <div class="container my-lg-4 my-3">
            <div class='page-content'>
                <div class="page-wrapper">
                    <?php echo $__env->make($templatePath .'.product.category-tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col mx-auto">
                            <?php if(!empty($category_path) && \View::exists($category_path . '-filter-top')): ?>
                                <?php echo $__env->make($category_path . '-filter-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php if ($__env->exists($category_folder .".filter-top")) echo $__env->make($category_folder .".filter-top", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                            <div class="product-list">
                                <?php if(!empty($category_path)): ?>
                                    <?php if ($__env->exists($category_path)) echo $__env->make($category_path, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                    <?php if ($__env->exists($templatePath .".product.product_list")) echo $__env->make($templatePath .".product.product_list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?php if ($__env->exists($category_folder .".filter-right")) echo $__env->make($category_folder .".filter-right", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('shortcode.keyword', ['menu'=>"Keyword-hot"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('shortcode.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/product.js?ver='. $templateVer)); ?>"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.datepicker').datepicker({
                  format: 'dd/mm/yyyy',
                  autoclose: true
              });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/category.blade.php ENDPATH**/ ?>