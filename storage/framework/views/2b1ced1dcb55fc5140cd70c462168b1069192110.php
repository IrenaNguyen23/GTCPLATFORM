<?php
   $url = $post->getUrl();
   $date = \Carbon\Carbon::parse($post->created_at);
?>
<div class="box-news">
        <div class="thumb-product">
            <a href="<?php echo e($url); ?>">
                <img src="<?php echo e(asset($post->image)); ?>" onerror="this.src='<?php echo e(asset('assets/images/placeholder.png')); ?>';">
            </a>
        </div>
        <div class="bottom-wrapper">
            <div class="content-product">
                <h3><a href="<?php echo e($url); ?>"><?php echo e($post->name); ?></a></h3>
                <p class="fs-14 text_gray"><?php echo e($date->format('Y-m-d')); ?></p>
                <div class="des des-3">
                    <?php echo htmlspecialchars_decode($post->description); ?>

                </div>
            </div>
        </div>
</div>
<?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/news/includes/post-item.blade.php ENDPATH**/ ?>