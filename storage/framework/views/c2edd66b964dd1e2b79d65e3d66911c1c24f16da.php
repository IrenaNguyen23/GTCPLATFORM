<?php $__env->startSection('seo'); ?>
    <title><?php echo e($title); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h6 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Dashboard /</span> <?php echo e($title); ?></h6>

<div class="card">
    <div class="card-body" id="pjax-container">
        <div class="row g-4">
            <div class="col-lg-5">
                <a class="btn btn-danger grid-trash" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete</a>
                <!-- <a class="btn btn-primary" href="<?php echo e($url_create); ?>"><i class="fas fa-plus"></i> Add New</a> -->
            </div>
            <div class="col-lg-7">
                <form method="GET" action="" id="frm-filter-post" class="form-inline">
                    <div class="row g-2">

                        <div class="col-sm-10 col-8">
                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Từ khoá">
                        </div>
                        <div class="col-sm-2 col-4 d-grid">
                            <button type="submit" class="btn btn-primary text-nowrap">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_index">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="selectall" onclick="select_all()"></th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Tài khoản</th>
                                <th class="text-center">Loại tài khoản</th>
                                <th class="text-center">Trạng thái tài khoản</th>
                                <th class="text-center">Thumbnail</th>
                                <th class="text-center">Duyệt tin</th>
                                <th class="text-center">Date</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $author = $item->getAuth;
                                    $options = $item->getOptions();
                                ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="<?php echo e($item->id); ?>" class="grid-row-checkbox" data-id="<?php echo e($item->id); ?>">
                                </td>
                                <td>
                                    <div class="mb-1">
                                        <a href="<?php echo e(route('admin_product.edit', $item->id)); ?>" title="">
                                            <?php if($item->name == ''): ?>
                                                <?php $__currentLoopData = $item->getCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span><?php echo e($item_['name']); ?> / </span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <b><?php echo e($item->getAddressFull()?current($item->getAddressFull()):''); ?></b>
                                                <b><?php echo e($item->getAddressEnd()?' - ' .current($item->getAddressEnd()):''); ?></b>
                                            <?php else: ?>
                                                <b><?php echo e($item->name); ?></b>
                                            <?php endif; ?>
                                        </a>    
                                    </div>
                                    <?php if(!empty($options[104])): ?>
                                    <div class="mb-1">
                                        Phương thức vận chuyển: <b><?php echo e($options[104]??''); ?></b>
                                    </div>
                                    <?php endif; ?>
                                    <div>
                                        <a class="text-dark" href="<?php echo e($item->getUrl()); ?>" target="_blank"><?php echo e($item->getUrl()); ?></a>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                        $categories = $item->categories;
                                    ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($index > 0): ?>, <?php endif; ?>
                                        <a href="<?php echo e(route('admin_product.category_edit', $category->id)); ?>" target="_blank"><?php echo e($categoriesTitle[$category->id]); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php if($author): ?>
                                        <b><?php echo e($author->username); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td class="text-nowrap">
                                    <?php if($author): ?>
                                        <b><?php echo e($author->getPackage->name??'Tài khoản thường'); ?></b>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($author): ?>
                                        <div>
                                            <?php if(is_null($author->email_verified_at)): ?>
                                                <span class="badge bg-danger">Chưa xác thực</span>
                                            <?php else: ?>
                                                <?php if($author->status == 1): ?>
                                                <span class="badge bg-success">Hoạt động</span>
                                                <?php else: ?>
                                                <span class="badge bg-danger">Ngưng hoạt động</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($item->image): ?>
                                    <img src="<?php echo e(asset($item->image)); ?>" width="80">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input process-duyettin" data-id="<?php echo e($item->id); ?>" type="checkbox" id="duyettin_<?php echo e($item->id); ?>" value="1" <?php echo e($item->status == 1 ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="duyettin_<?php echo e($item->id); ?>">Duyệt tin</label>
                                    </div>
                                </td>   
                                <td>
                                    <?php echo e($item->created_at); ?>

                                    <?php if($item->status==1): ?>
                                    <span class="badge bg-label-primary">Public</span>
                                    <?php elseif($item->status==2): ?>
                                    <span class="badge bg-label-warning">Pendding</span>
                                    <?php elseif($item->status==3): ?>
                                    <span class="badge bg-label-danger">Reject</span>
                                    <?php else: ?>
                                    <span class="badge bg-label-dark">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div>
                                        <a class="btn btn-info btn-sm" href="<?php echo e(route('admin_product.edit', $item->id)); ?>" title="">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <span onclick="deleteItem('<?php echo e($item->id); ?>');" title="<?php echo e(sc_language_render('action.delete')); ?>" class="btn btn-flat btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </div>  
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    <?php echo $posts->links(); ?>

                </div>
            </div>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(sc_file('assets/plugins/jquery.pjax.js')); ?>"></script>

    <?php echo $__env->make('admin.component.script_remove_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        jQuery(document).ready(function($) {
            $('.process-duyettin').on('change', function(){
                var id = $(this).data('id'),
                    value = 0;

                if($(this).is(":checked"))
                    value = 1;
                axios({
                    method: 'post',
                    url: '<?php echo e(route("admin_product.duyet-tin")); ?>',
                    data: {id:id, value:value}
                }).then(res => {
                  alertMsg('success', res.data.message);
                }).catch(e => console.log(e));

            });
        });
    </script>   
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/product/index.blade.php ENDPATH**/ ?>