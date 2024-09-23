

<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="container-fluid py-5 product-detail">
  <div class="container">
    <!--=================================
    breadcrumb -->

    <nav class="mb-4" aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb breadcrumb-style mb-0">
            <li class="breadcrumb-item"><a href="/"><?php echo app('translator')->get('Trang chủ'); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($news->name); ?></li>
        </ol>
    </nav>
    <!--=================================
    breadcrumb -->

    <div class="row">
      <div class="col-lg-8">
        <div class="blog-detail">
          
            <div class="blog-post-title mb-3">
              <h2><?php echo e($news->name); ?></h2>
            </div>

            <div class="py-3 entry-meta d-flex align-items-center flex-wrap justify-content-between">
              <div>
                <span><i class="far fa-clock"></i> <?php echo e(date('d-m-Y', strtotime($news->created_at))); ?></span>
              </div>
              <?php echo $__env->make($templatePath .'.layouts.share-box', ['text' => $news->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="blog-post-content border-0">
              <?php echo htmlspecialchars_decode($news->content); ?>

            </div>
            <hr>
            
        </div>

        <h5 class="text-primary mt-4"><?php echo e(sc_language_render('news.related')); ?></h5>
        <ul>
          <?php if($post_lastests->count()): ?>
            <?php $__currentLoopData = $post_lastests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <a class="text-dark" href="<?php echo e($item->getUrl()); ?>"><?php echo e($item->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="col-lg-4 mt-5 mt-lg-0">
        <div class="blog-sidebar">
          <div class="widget">
            <div class="widget-title">
              <h6>Bài mới nhất</h6>
            </div>
              <?php if($news_featured->count()): ?>
                  <?php $__currentLoopData = $news_featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row mb-3">
                      <div class="col-md-3">
                        <img class="img-fluid" src="<?php echo e(asset($item->image)); ?>" alt="">
                      </div>
                      <div class="col-md-9">
                        <a class="text-dark" href="<?php echo e($item->getUrl()); ?>"><b><?php echo e($item->name); ?> </b></a>
                        <div class="blog-meta mt-2">
                          <span><i class="far fa-clock"></i> <?php echo e(date('d-m-Y', strtotime($item->created_at))); ?></span>
                        </div>
                      </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
        </div>
      </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/news/single.blade.php ENDPATH**/ ?>