<?php $__env->startSection('seo'); ?>
<?php echo $__env->make('admin.layouts.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h6 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Dashboard /</span> <?php echo e($title); ?></h6>

<div class="card">
    <div class="card-body" id="pjax-container">
        <ul class="nav mb-3">
            <li class="nav-item">
                <a class="btn btn-danger grid-trash" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="<?php echo e($url_create); ?>" style="margin-left: 6px;"><i class="fas fa-plus"></i> Add New</a>
            </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-bordered" id="table_index">
                <thead>
                    <tr>
                        <th class="text-center"><input type="checkbox" id="selectall" onclick="select_all()"></th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Thumbnail</th>
                        <th class="text-center">Date</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" id="<?php echo e($item->id); ?>" class="grid-row-checkbox" data-id="<?php echo e($item->id); ?>">
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin_page.edit', $item->id)); ?>" title=""><b><?php echo e($item->name); ?></b></a>
                            <div>URL: <a target='_blank' href="#"><?php echo e(route('post.single', $item->slug)); ?></a></div>
                        </td>
                        <td class="text-center">
                            <?php if($item->image): ?>
                            <img src="<?php echo e(asset($item->image)); ?>" width="80">
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($item->created_at); ?>

                        </td>
                        <td>
                            <div>
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
        <div class="fr">
            <?php echo $posts->links(); ?>

        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(sc_file('assets/plugins/jquery.pjax.js')); ?>"></script>

    <?php echo $__env->make('admin.component.script_remove_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/page/index.blade.php ENDPATH**/ ?>