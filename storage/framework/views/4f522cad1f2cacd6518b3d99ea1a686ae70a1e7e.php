<?php
   $packagedays = \App\Models\PackageDay::get();
?>
<?php if(Session::has('error')): ?>
   <div class="text-danger mt-3">
      <?php echo e(Session::get('error')); ?>

   </div>
<?php endif; ?>
<div class="package-content py-3">
   <table class="table table-bordered font-weight-bold">
      <tbody>
         <tr class="table-danger text-center ">
            <th width="40%">Loại tài khoản</th>
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th><?php echo e($package->name); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tr>
         <?php if(!empty($options)): ?>
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <td><?php echo e($item->name); ?></td>

               <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                     $package_options = $package->getOptions();
                  ?>
                  <td class="text-center">
                     <?php if(in_array($item->id, $package_options)): ?>
                        <img src="<?php echo e(asset('assets/images/checked.png')); ?>" width="20">
                     <?php endif; ?>
                  </td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         <?php $__currentLoopData = $packagedays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td>
               <h5>Phí tài khoản <?php echo e($item->name); ?></h5>
               <p>(Khuyến mãi áp dụng cho <?php echo e($item->qty); ?> tài khoản đăng ký đầu tiên)</p>
            </td>
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
                  $package_item = \App\Models\PackageDayJoin::where('package_id', $package->id)->where('day_id', $item->id)->first();
               ?>
               <td class="text-end">
                  <div class="text-danger"><span style="text-decoration-line: line-through; font-size:14px;"><?php echo render_price($package_item->price); ?></span> (Giá gốc)</div>
                  <div><b><?php echo render_price($package_item->promotion); ?> (Giá khuyến mãi)</b></div>
                  <a href="<?php echo e($package->getUrl($item->id)); ?>" class="btn btn-custom" data="<?php echo e($package_item->id); ?>">Nâng cấp ngay</a>
               </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
      </tbody>
   </table>

</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/package/package-list.blade.php ENDPATH**/ ?>