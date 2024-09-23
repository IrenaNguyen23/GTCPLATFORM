<?php
  $segment_check = Request::segment(2); 
  $segment_check3 = Request::segment(3); 
  $menus = \App\Models\AdminMenu::getListVisible();
  // dd($menus);
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
   <div class="app-brand demo border-bottom">
      <a href="javascript:;" class="app-brand-link">
         <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">ADMIN</span> -->
         <img src="<?php echo e(asset('assets/images/logo-admin.png')); ?>" alt="">
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
         <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
   </div>
   <div class="menu-inner-shadow"></div>
   <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item">
         <a href="<?php echo e(route('admin.dashboard')); ?>" class="menu-link">
            <i class="menu-icon fas fa-tachometer-alt"></i>
            <div data-i18n="Analytics">Dashboard</div>
         </a>
      </li>
      <li class="menu-item">
         <a href="/" class="menu-link" target="_blank">
            <i class="menu-icon fas fa-home"></i>
            <div data-i18n="Analytics">Xem trang chủ</div>
         </a>
      </li>

      <?php if(count($menus)): ?>
         
         <?php $__currentLoopData = $menus[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level0): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(!empty($menus[$level0->id]) && $level0->hidden == 0): ?>
               <li class="menu-item has-treeview">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                     <i class="menu-icon <?php echo e($level0->icon); ?>"></i>
                     <div data-i18n="Account Settings"><?php echo __($level0->title); ?></div>
                  </a>

                  <ul class="menu-sub">
                     <?php $__currentLoopData = $menus[$level0->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        $menu_active = '';
                        if (\App\Models\AdminMenu::checkUrlIsChild(url()->current(), sc_url_render($level1->uri)))
                           $menu_active = 'active';
                     ?>
                     <li class="menu-item <?php echo e($menu_active); ?>">
                        <a href="<?php echo e($level1->uri?sc_url_render($level1->uri):'#'); ?>" class="menu-link <?php echo e($menu_active); ?>">
                           <div data-i18n="<?php echo __($level1->title); ?>"><i class="menu-icon <?php echo e($level1->icon); ?>"></i> <?php echo __($level1->title); ?></div>
                        </a>
                     </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </li> 
            <?php else: ?>
               <?php if($level0->hidden == 0): ?>
                  <li class="menu-item <?php echo e(\App\Models\AdminMenu::checkUrlIsChild(url()->current(), sc_url_render($level0->uri)) ? 'active' : ''); ?>">
                     <a href="<?php echo e($level0->uri?sc_url_render($level0->uri):'#'); ?>" class="menu-link">
                        <i class="menu-icon <?php echo e($level0->icon); ?>"></i>
                        <?php echo __($level0->title); ?>

                     </a>
                  </li> 
               <?php endif; ?>
            <?php endif; ?>
            
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
      <?php endif; ?>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Setting</span>
      </li>
      <?php if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->checkUrlAllowAccess(route('admin_theme_option'))): ?>
      <li class="menu-item">
         <a href="<?php echo e(route('admin_theme_option')); ?>" class="menu-link"><i class="menu-icon fas fa-sliders-h"></i> Theme Option</a>
      </li>

      <li class="menu-item">
         <a href="<?php echo e(route('admin_menu')); ?>" class="menu-link"><i class="menu-icon fas fa-bars"></i> Menu</a>
      </li>
      <?php endif; ?>

      <li class="menu-item">
         <a href="<?php echo e(route('admin_user_admin.change_password')); ?>" class="menu-link"><i class="menu-icon fas fa-user-circle"></i> Tài khoản</a>
      </li>
       <li class="menu-item">
         <a href="<?php echo e(route('admin.logout')); ?>" class="menu-link"><i class="menu-icon fas fa-sign-out-alt"></i> Logout</a>
       </li>
      
   </ul>
</aside><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>