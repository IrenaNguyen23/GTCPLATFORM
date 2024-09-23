<?php if(!empty($languages) && count($languages)>1): ?>
<?php 
    $i=0; 
    $type = $type??'';
?>

<ul class="nav nav-tabs" id="tabLang" role="tablist">
    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item">
        <a class="nav-link <?php echo e($i++ == 0 ? 'active' : ''); ?>" id="<?php echo e($type.$code); ?>-tab" data-bs-toggle="tab" href="#<?php echo e($type.$code); ?>" role="tab" aria-controls="<?php echo e($type.$code); ?>" aria-selected="false"><?php echo e($lang->name); ?></a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/partials/tab-lang-head.blade.php ENDPATH**/ ?>