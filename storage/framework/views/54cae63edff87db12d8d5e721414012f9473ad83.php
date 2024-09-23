<div class="card">
   <div class="card-body">
      <h5>Thể loại tin</h5>
      <?php
      $listCate = [];
      $multiple = $multiple??'multiple';
      $input_name = 'category';
      if($multiple == 'multiple')
         $input_name = 'category[]';

      if(!empty($post))
      {
         $category = old('category', $post->categories->pluck('id')->toArray());
         if(is_array($category)){
             foreach($category as $value){
                 $listCate[] = $value;
             }
         }
      }
      ?>
      <select class="form-control category select2" <?php echo e($multiple); ?>

         data-placeholder="Chọn danh mục"
         name="<?php echo e($input_name); ?>">
         <option value="">-----select-----</option>
         <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <option value="<?php echo e($k); ?>"
             <?php echo e((count($listCate) && in_array($k, $listCate))?'selected':''); ?>><?php echo e($v); ?>

         </option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </select>
   </div> <!-- /.card-body -->
</div><!-- /.card --><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/partials/post_category.blade.php ENDPATH**/ ?>