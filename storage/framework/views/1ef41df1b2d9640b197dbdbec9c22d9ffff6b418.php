<table class="table table-bordered mb-0">
    <?php
        $options = $product->getOptions();
        $options_unit = (new \App\Models\ShopOption)->whereIn('id', array_keys($options))->get()->pluck('unit', 'id')->toArray();
    ?>

    <tr>
        <td width="200">Tên công ty: </td>
        <td><?php echo e($product->getAuth->company); ?></td>
    </tr>
    <tr>
        <td width="200">Phương thức vận chuyển: </td>
        <td><?php echo e(!empty($category) ? $category->name : ''); ?></td>
    </tr>

    <tr>
        <td>Loại xe</td>
        <td><?php echo e($options[202]??''); ?></td>
    </tr>
    <tr>
        <td>Nhóm hàng</td>
        <td><?php echo e($options[30]??''); ?></td>
    </tr>

    <?php if(!empty($options[104])): ?>
    <tr>
        <td>Hình thức vận chuyển</td>
        <td><?php echo e($options[104]??''); ?></td>
    </tr>
    <?php endif; ?>

    <tr>
        <td>Trọng tải</td>
        <td>
            <?php if(!empty($options[206])): ?>
            <?php echo e($options[206]??''); ?><?php echo e($options[136]??''); ?>

            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <td>Thùng xe dài</td>
        <td><?php echo e($options[207]??''); ?><?php echo e($options_unit[207]??''); ?></td>
    </tr>

    <tr>
        <td>Thùng xe rộng</td>
        <td><?php echo e($options[208]??''); ?><?php echo e($options_unit[208]??''); ?></td>
    </tr>
    <tr>
        <td>Thùng xe cao</td>
        <td><?php echo e($options[209]??''); ?><?php echo e($options_unit[209]??''); ?></td>
    </tr>
    <tr>
        <td>Giá 10km đầu</td>
        <td><?php echo render_price($product->price); ?></td>
    </tr>
    <tr>
        <td>Giá từ 11km - 44km</td>
        <td><?php echo !empty($options[211]) ? render_price($options[211]) : ''; ?>/km</td>
    </tr>
    <tr>
        <td>Giá từ km 45</td>
        <td><?php echo !empty($options[212]) ? render_price($options[212]) : ''; ?>/km</td>
    </tr>
    <tr>
        <td>Thời gian chờ</td>
        <td><?php echo !empty($options[213]) ? render_price($options[213]) : ''; ?>/h</td>
    </tr>

    <tr>
        <td>Hiệu lực giá</td>
        <td><?php echo e($product->getDateAvailable()); ?></td>
    </tr>
    <tr>
        <td>Ghi chú</td>
        <td><?php echo e($options[217]??''); ?></td>
    </tr>
</table> <?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/van-chuyen/ftl-single.blade.php ENDPATH**/ ?>