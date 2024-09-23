

<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-archive py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h3 class="text-white animated slideInDown"><?php echo e($seo_title); ?></h3>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e($seo_title); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="block-archive pt-5">
        <div class="container">
            <h3>Tìm kiếm với từ khóa "<?php echo e(request('keyword')); ?>"</h3>
        
            <div class="tab-content wow fadeIn" data-wow-delay="0.1s">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-bs-labelledby="pills-new-tab">
                    <!-- Product Start -->
                    <div class="block-product py-5">
                        <div class="row g-3">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <?php echo $__env->make($templatePath .'.product.product_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- Product End -->
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('shortcode.keyword', ['menu'=>"Keyword-hot"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('shortcode.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/search.blade.php ENDPATH**/ ?>