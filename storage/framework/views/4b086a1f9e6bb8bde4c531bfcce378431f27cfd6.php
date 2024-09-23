<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
<?php if(!empty($datas)): ?>
    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <url>
                <loc><?php echo e($item->getUrl()); ?></loc>
                <lastmod><?php echo e(date(DATE_ATOM)); ?></lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</urlset><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/sitemap/index.blade.php ENDPATH**/ ?>