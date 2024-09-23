<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="shortcut icon" href="<?php echo e(asset(setting_option('favicon'))); ?>" />
  <?php echo $__env->yieldContent('seo'); ?>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"
  />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />

  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>

  <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>

  <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
   
  <?php echo $__env->yieldContent('content'); ?>
   

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>

  <script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>


  <script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
  <script src="<?php echo e(asset('js/ckfinder/ckfinder.js')); ?>"></script>
  <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>

  <!-- Main JS -->
  <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

  <!-- Page JS -->
  <script src="<?php echo e(asset('assets/js/dashboards-analytics.js')); ?>"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/auth/layout.blade.php ENDPATH**/ ?>