<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    

    <div class="container text-center">
        <?php echo htmlspecialchars_decode($category->content); ?>

    </div>

    <?php if ($__env->exists($templatePath .'.news.tabs')) echo $__env->make($templatePath .'.news.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <div class="container">
       <div class="row g-3">
           <?php if(count($news)>0): ?>
               <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="col-lg-6">
                   <?php echo $__env->make($templatePath .'.news.includes.post-item', compact('post'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
           <?php echo $news->links(); ?>

       </div>
     </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/news/index.blade.php ENDPATH**/ ?>