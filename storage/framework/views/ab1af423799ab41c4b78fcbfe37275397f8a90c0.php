<?php
    if(!empty($product))
    {
        extract($product->toArray());
        $description = $product->descriptions ? $product->descriptions->keyBy('lang')->toArray(): [];
        $gallery = (isset($gallery) || $gallery != "") ? unserialize($gallery) : '';
    }
?>

<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('admin.layouts.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h6 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Dashboard /</span> <?php echo e($title); ?></h6>
<div class="card">
    <div class="card-body" id="pjax-container">

        <div class="row">
            <div class="col-lg-9">
                <?php

                    $category_parents = $modelCategory->getParentList($category->parent);
                    
                    if($category_parents)
                    {
                        $category_parents = array_reverse($category_parents);
                        $category_first = current($category_parents);
                    }
                    else
                    {
                        $category_first = $category;   
                    }
                    $content = $content??'';

                    
                    $post_type = request('post_type')??$product->post_type??'';

                    $catalogues = $product->getCatalogue()->where('type', 'catelogue')->get();
                    $certificates = $product->getCatalogue()->where('type', 'certificate')->get();

                    if(!empty($product))
                    {
                        $address = implodeAddress($product->getAddressFull()??'');
                        $address_end = $product->address_end;
                        
                        $product_options = $product->getOptions($json_decode_text=false);
                        if($product->date_available)
                        $date_available = date('d/m/Y', strtotime($product->date_available));
                    }
                ?>

                <div class="form-group optionItem">
                    <div class="input-boder active" data-bs-toggle="modal" data-bs-target="#changeCategory">
                        <label>Danh mục tin đăng:</label>
                        <div class="category-breadcrumb">
                            <ul class="category_session" >
                                <?php if($category_parents && count($category_parents)): ?>
                                    <?php $__currentLoopData = $category_parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($item->name??''); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <li><?php echo e($category->name); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php if($category_first): ?>
                    <?php
                        $templatePath_1 = $templatePath .'.dangtin.category.' . $category_first->slug . '.' . $category->slug;
                        $templatePath_2 = $templatePath .'.dangtin.category.' . $category_first->slug;

                    ?>

                    <?php if(\View::exists($templatePath_1)): ?>
                        <?php echo $__env->make($templatePath_1, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(\View::exists($templatePath_2)): ?>

                        <?php echo $__env->make($templatePath_2, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
        
            </div> <!-- /.col-9 -->
            <div class="col-lg-3">
                <?php
                    $status = $status ?? 1;
                    $created_at = $created_at??date('Y-m-d H:i');
                    $created_at = date('Y-m-d H:i', strtotime($created_at));
                ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e($url_post); ?>" method="POST" id="form_post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($id??0); ?>">
                            <h5 class="card-title">Publish</h5>

                            <div class="form-group mb-3">
                                <label>Ngày đăng:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    <input type='text' class="form-control" name="created_at" id='created_at' value="<?php echo e($created_at); ?>" />
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end text-end mb-3">
                                <div class="form-check me-3">
                                    <input type="radio" id="radioDraft" name="status" class="form-check-input" value="0" <?php echo e($status == 0 ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="radioDraft"> Ẩn tin </label>
                                </div>
                                <div class="form-check me-3">
                                    <input type="radio" id="radioPublic" name="status" class="form-check-input" value="1" <?php echo e($status == 1 ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="radioPublic"> Hiện tin </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="radio_reject" name="status" class="form-check-input" value="3" <?php echo e($status == 3 ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="radio_reject"> Từ chối </label>
                                </div>
                            </div>

                            <?php if($comments->count()): ?>
                            <div class="mb-3 bg-light">
                                <ul class="timeline">
                                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point-wrapper"><span class="timeline-point timeline-point-primary"></span></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header mb-1">
                                                <h6 class="mb-0"><?php echo e($item->getAdmin->name??''); ?></h6>
                                                <small class="text-muted"><?php echo e($item->created_at); ?></small>
                                            </div>
                                            <div>
                                                <?php echo $item->content; ?>

                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <h5 class="mb-2">Lý do:</h5>
                                <textarea name="note" class="form-control w-100" rows="3"></textarea>
                                
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" value="reject" class="btn btn-danger">Từ chối duyệt</button>
                            </div>

                            <hr>
                            <?php if(!empty($languages)): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group">
                                    <label for="seo_title_<?php echo e($code); ?>">Seo Title  (<?php echo e($code); ?>)</label>
                                    <input type="text" id="seo_title_<?php echo e($code); ?>" name="description[<?php echo e($code); ?>][seo_title]" class="form-control" value="<?php echo $description[$code]['seo_title'] ?? ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="seo_keyword_<?php echo e($code); ?>">Seo Keyword  (<?php echo e($code); ?>)</label>
                                    <input type="text" id="seo_keyword_<?php echo e($code); ?>" name="description[<?php echo e($code); ?>][seo_keyword]" class="form-control" value="<?php echo $description[$code]['seo_keyword'] ?? ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="seo_description_<?php echo e($code); ?>">Seo Description  (<?php echo e($code); ?>)</label>
                                    <textarea id="seo_description_<?php echo e($code); ?>" name="description[<?php echo e($code); ?>][seo_description]" class="form-control"><?php echo $description[$code]['seo_description'] ?? ''; ?></textarea>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <hr>



                            <div class="form-group text-end">
                                <button type="submit" name="submit" value="save" class="btn btn-info">Lưu</button>
                                <button type="submit" name="submit" value="apply" class="btn btn-success">Lưu và sửa</button>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div><!-- /.card -->


                <?php echo $__env->make('admin.partials.image', ['title'=>'Hình ảnh', 'id'=>'img', 'name'=>'image', 'image'=>$image??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.galleries', ['gallery_images'=> $gallery ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.partials.image', ['title'=>'Hình ảnh Banner', 'id'=>'cover-img', 'name'=>'cover', 'image'=>$cover??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div> <!-- /.col-9 -->
        </div> <!-- /.row -->

        <div class="list-content-loading">
            <div class="half-circle-spinner">
                 <div class="circle circle-1"></div>
                 <div class="circle circle-2"></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset($templateFile .'/css/dangtin.css?ver='. time())); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo e(asset($templateFile .'/js/dangtin.js?ver='. time())); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $('.form-content ').removeClass('d-none');
    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        // editorQuote('description_<?php echo e($code); ?>');
        // editor('content_<?php echo e($code); ?>');
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    $(':button[type=submit]').click(function(){
        var button_value = $(this).val();
        if(button_value == 'reject')
        {
            if (!$.trim($('textarea[name="note"]').val())) {
                alert('Nhập lý do từ chối duyệt tin');
                $('textarea[name="note"]').focus();
                return false;   
            }
        }
        $('.list-content-loading').show();
        $('form#form_post').submit();
    });

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/product/single.blade.php ENDPATH**/ ?>