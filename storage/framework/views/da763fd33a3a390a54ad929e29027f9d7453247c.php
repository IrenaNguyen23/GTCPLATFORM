<?php $__env->startSection('seo'); ?>
<?php echo $__env->make('admin.layouts.seo', [
   'title'  => 'Đăng nhập'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
         <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
               <div class="card-body">
                  <!-- Logo -->
                  <div class="app-brand justify-content-center">
                     <a href="javascript:;" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                           <img src="<?php echo e(asset('assets/images/logo-admin.png')); ?>" alt="">
                        </span>
                     </a>
                  </div>
                  <!-- /Logo -->
                  <h4 class="mb-4 text-center">Welcome to Admin Manager! 👋</h4>
                  <form id="formAuthentication" class="mb-3" action="<?php echo e(route('admin.login')); ?>" method="POST">
                     <?php echo csrf_field(); ?>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
                     </div>
                     <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                           <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                           <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                           <span class="input-group-text cursor-pointer">
                              <i class="bx bx-hide"></i>
                           </span>
                        </div>
                     </div>
                     <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /Register -->
         </div>
      </div>
   </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
   <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>" />
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>