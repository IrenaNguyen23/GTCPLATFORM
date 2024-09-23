<?php
    if(isset($post)){
        extract($post->toArray());
        $description = $post?$post->descriptions->keyBy('lang')->toArray():[];
        //dd($post);
    }
?>

<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('admin.layouts.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h6 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Dashboard /</span> <?php echo e($title); ?></h6>

<form action="<?php echo e($url_post); ?>" method="POST" id="frm-create-page" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id" value="<?php echo e($id??0); ?>">
    <div class="row">
        <div class="col-9">
            <!-- show error form -->
            <div class="errorTxt"></div>
            
            <div class="nav-align-top mb-4">
                <?php echo $__env->make('admin.partials.tab-lang-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.partials.tab-content', [
                    'description_show'  => true
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            
        </div> <!-- /.col-9 -->
        <div class="col-3">
            <?php echo $__env->make('admin.partials.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.image', ['title'=>'Hình ảnh', 'id'=>'img', 'name'=>'image', 'image'=>$image??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.partials.image', ['title'=>'Hình ảnh Banner', 'id'=>'cover-img', 'name'=>'cover', 'image'=>$cover??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> <!-- /.col-9 -->
    </div> <!-- /.row -->
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        editorQuote('description_<?php echo e($code); ?>');
        editor('content_<?php echo e($code); ?>');
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/page/single.blade.php ENDPATH**/ ?>