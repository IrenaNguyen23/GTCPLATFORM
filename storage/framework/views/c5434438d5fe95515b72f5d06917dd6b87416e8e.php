<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--=================================
Login -->
<section class="space-ptb bg-light login py-lg-5 py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 bg-white shadow p-lg-5 p-3 rounded-3">
         <h2 class="text-center mb-4"><?php echo app('translator')->get('Đăng nhập'); ?></h2>

         <?php if(count($errors) >0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="text-danger"> <?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         <?php if(session('status')): ?>
            <div class="text-danger"> <?php echo e(session('status')); ?></div>
         <?php endif; ?>
         <div class="list-content-loading">
             <div class="half-circle-spinner">
                 <div class="circle circle-1"></div>
                 <div class="circle circle-2"></div>
             </div>
         </div>
         <form id="form-login-page" class="form-horizontal login row align-items-center" method="POST" action="">
            <div class="error-message text-danger fs-sm"></div>
               <?php echo e(csrf_field()); ?>

               <input type="hidden" name="url_back" value="<?php echo e(url()->previous()); ?>">
               <div class="mb-3 col-sm-12">
                  <label>Tên đăng nhập <span class="required">*</span></label>
                  <input type="text" class="form-control" name="username" id="username" value=""/>
               </div>
               <div class="mb-3 col-sm-12">
                  <label>Mật khẩu <span class="required">*</span></label>
                  <input class="form-control" type="password" name="password" id="password"/>
               </div>
               <div class="mb-3 col-sm-12">
                  <div class="form-check mb-2">
                     <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me" value="1">
                     <label class="custom-control-label" for="remember_me"><?php echo app('translator')->get('Ghi nhớ'); ?></label>
                  </div>
               </div>
               <div class="col-12 mb-3 d-grid">
                  <button type="button" class="btn btn-primary btn-login-page"><?php echo app('translator')->get('Đăng nhập'); ?></button>
               </div>
               <div class="col-12">
                  <ul class="list-unstyled mb-1 mt-sm-0 mt-3">
                     <li class="me-1">
                        <a href="<?php echo e(route('forget')); ?>" rel="noindex nofollow"><b>Quên mật khẩu?</b></a>
                     </li>
                     
                     <li class="me-1">
                        <a href="<?php echo e(route('register')); ?>" rel="noindex nofollow">
                           <b>Click vào đây để đăng ký nếu chưa có tài khoản</b>
                        </a>
                     </li>                     
                  </ul>
               </div>
         </form>

      </div>
    </div>
  </div>
</section>
<!--=================================
Login -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/auth/login.blade.php ENDPATH**/ ?>