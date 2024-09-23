<div class="card">
    <div class="card-body">
        <h5><?php echo e($title ?? 'Image Thumbnail'); ?></h5>
            <div class="input-group">
                <input type="text" class="form-control" name="<?php echo e($name ?? 'image'); ?>" id="<?php echo e($name ?? 'image'); ?>" value="<?php echo e($image); ?>">
                <button class="btn btn-outline-secondary ckfinder-popup" type="button" id="<?php echo e($id ?? 'img'); ?>"  data-show="<?php echo e($id ?? 'img'); ?>_view" data="<?php echo e($name ?? 'image'); ?>">Upload</button>
            </div>
            <div class="demo-img bg-light" style="padding-top: 10px;">
                <?php if($image != ""): ?>
                    <img class="<?php echo e($id ?? 'img'); ?>_view" src="<?php echo e(asset($image)); ?>">
                <?php else: ?>
                    <img class="<?php echo e($id ?? 'img'); ?>_view" src="<?php echo e(asset('assets/images/placeholder.png')); ?>">
                <?php endif; ?>
            </div>
    </div> <!-- /.card-body -->
</div><!-- /.card --><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/partials/image.blade.php ENDPATH**/ ?>