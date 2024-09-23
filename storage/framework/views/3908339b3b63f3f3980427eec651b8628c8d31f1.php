<?php $__env->startSection('seo'); ?>
   <?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="page-archive py-5">
        <div class="container text-center py-5">
            <h3 class="text-white">Nâng cấp tài khoản</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Nâng cấp tài khoản</li>
                </ol>
            </nav>
        </div>
    </div>

<section class="package-page">
   <div class="container">
      <?php echo $__env->make($templatePath .'.package.package-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-footer'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/package/index.blade.php ENDPATH**/ ?>