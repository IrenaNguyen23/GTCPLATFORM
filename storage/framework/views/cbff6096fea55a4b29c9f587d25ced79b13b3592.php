<?php $__env->startSection('seo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-archive py-5">
        <div class="container text-center py-5">
            <h3 class="text-white"><?php echo e($seo_title); ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?php echo e($page->name); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container my-lg-4 my-3">

        <div class='page-content'>
            <div class="page-wrapper">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <?php echo htmlspecialchars_decode($page->content); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('shortcode.keyword', ['menu'=>"Keyword-hot"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('shortcode.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/page/index.blade.php ENDPATH**/ ?>