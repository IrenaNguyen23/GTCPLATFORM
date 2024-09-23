<div class="content-detail">
    <h2><?php echo e($product->getAuth->company); ?></h2>
    <div class="bottom-info mb-3">
        <div class="item icon-clock">
            <i class="fa-regular fa-clock"></i>
            <?php echo e(date('H:i d/m/Y', strtotime($product->created_at))); ?>

        </div>
        
        <div class="item icon-location">
            <?php if(count($product->getAddressFull())): ?>
            <div><i class="fa-solid fa-location-dot"></i> <?php echo e(implode(', ', $product->getAddressFull())); ?></div>
            <?php endif; ?>
        </div>
    </div>


    <div class="product-detail_description">
        <h5>Mô tả chi tiết</h5>
        <div>
            <?php if(!empty($category_main) && \View::exists($templatePath .".product.". $category_main->slug .".". $category->slug ."-single")): ?>
                <?php echo $__env->make($templatePath .".product.". $category_main->slug .".". $category->slug ."-single", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>

            <table class="table table-bordered mb-0">
                <?php
                    $options = $product->getOptions();
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
                    <td>Loại container</td>
                    <td><?php echo e($options[13]??''); ?></td>
                </tr>

                <?php if(!empty($options[104])): ?>
                <tr>
                    <td>Hình thức vận chuyển</td>
                    <td><?php echo e($options[104]??''); ?></td>
                </tr>
                <?php endif; ?>

                <tr>
                    <td>Nơi đi</td>
                    <td><?php echo e(implode(', ', $product->getAddressFull())); ?></td>
                </tr>

                <tr>
                    <td>Nơi đến</td>
                    <td><?php echo e($product->address_end); ?></td>
                </tr>

                <tr>
                    <td>Lịch khởi hành</td>
                    <td><?php echo e($options[35]??''); ?></td>
                </tr>

                <tr>
                    <td>Thời gian vận chuyển</td>
                    <td><?php echo e($options[36]??''); ?></td>
                </tr>

                <tr>
                    <td>Cước vận chuyển</td>
                    <td>
                        <b><?php echo render_price($product->price??0); ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Phụ phí</td>
                    <td><?php echo render_price($product->cost); ?></td>
                </tr>

                <tr>
                    <td>Tổng cước</td>
                    <td>
                        <?php echo render_price($product->price+$product->cost); ?>


                        
                    </td>
                </tr>
                
                <tr>
                    <td>Hiệu lực giá</td>
                    <td><?php echo e($product->getDateAvailable()); ?></td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td><?php echo e($options[217]??''); ?></td>
                </tr>
            </table>  
            <?php endif; ?>  
        </div>
    </div>

</div>
<?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/van-chuyen/single-content.blade.php ENDPATH**/ ?>