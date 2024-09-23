

<?php $__env->startSection('seo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php        
        
        $category_first = $category_sub??$categories->first();
        $category_filters = $modelCategory->getList(['parent' => $category_first->id]);

        if($category->slug == 'viec-lam')
        {
            $products = $modelProduct->setCategory($category_id)->getList(request()->all());
        }
        else
            $products = $modelProduct->setCategory($category_first->id)->getList(request()->all());
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
                        <div class="col-lg-3">
                            <div class="shop-sidebar">
                                <?php if ($__env->exists($templatePath .'.product.filter-option',['id' => 104])) echo $__env->make($templatePath .'.product.filter-option',['id' => 104], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists($templatePath .'.product.filter-option',['id' => 126])) echo $__env->make($templatePath .'.product.filter-option',['id' => 126], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists($templatePath .'.product.filter-option',['id' => 147])) echo $__env->make($templatePath .'.product.filter-option',['id' => 147], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists($templatePath .'.product.filter-option',['id' => 75])) echo $__env->make($templatePath .'.product.filter-option',['id' => 75], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="col-lg-9 mx-auto">

                            <?php if(!empty($customers)): ?>
                            <div class="row">
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <?php echo $__env->make($templatePath .'.author.author-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
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
    <script src="<?php echo e(asset( $templateFile .'/js/clipboard.min.js' )); ?>"></script>
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
<?php echo $__env->make($templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/van-chuyen/cong-ty-logistic.blade.php ENDPATH**/ ?>