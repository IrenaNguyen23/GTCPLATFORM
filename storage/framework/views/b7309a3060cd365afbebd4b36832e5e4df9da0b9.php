<div class="row g-4 ">
    <div class="col-lg-12">
        <?php echo $__env->make($templatePath .'.dangtin.includes.option', ['id' => 104, 'value' => $product_options[104]??'', 'option_title' => 'Phương thức vận chuyển'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-6">
        <div class="input-boder active">
            <label>Nơi đi <span>*</span></label>
            <input type="text" name="location_origin" value="<?php echo e($address??''); ?>" class="form-control" placeholder="Huyện/cảng/ga, tỉnh, quốc gia" required>
            
        </div>
    </div>

    <div class="col-lg-6">
        <div class="input-boder active">
            <label>Nơi đến <span>*</span></label>

            <input type="text" name="address_end" value="<?php echo e($address_end??''); ?>" class="form-control" placeholder="Huyện/cảng/ga, tỉnh, quốc gia" required>

            
        </div>
    </div>

    

    <div class="col-lg-6">
        <?php echo $__env->make($templatePath .'.dangtin.includes.option', ['id' => 35, 'value' => $product_options[35]??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-lg-6">
        <?php echo $__env->make($templatePath .'.dangtin.includes.option', ['id' => 36, 'value' => $product_options[36]??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-3">
        <div class="optionItem">
            <div class="input-boder">
                <label>Giá cước <span>*</span></label>
                <input type="text" class="form-control input-value number_format" name="price" value="<?php echo e($price_format??''); ?>" data-msg-required="Nhập giá cước" required>
                <span class="unit">đ</span>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="optionItem">
            <div class="input-boder">
                <label>Phụ phí <span>*</span></label>
                <input type="text" class="form-control input-value number_format" name="cost" value="<?php echo e($cost_format??''); ?>" data-msg-required="Nhập phụ phí" required>
                <span class="unit">đ</span>
            </div>
        </div>
    </div>
    
    
    <div class="col-lg-3">
        
        <div class="optionItem">
            <div class="input-boder">
                <label>Tổng cước</label>
                <input type="text" class="form-control input-value number_format tongcuoc" value="<?php echo e($tongcuoc??''); ?>" readonly>
                <span class="unit">đ</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <?php echo $__env->make($templatePath .'.dangtin.includes.option', ['id' => 159, 'value' => $product_options[159]??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <div class="col-lg-12">
        <div class="optionItem">
            <div class="input-boder">
                <label>Hiệu lực giá <span>*</span></label>
                <input type="text" class="form-control  input-value datepicker" placeholder="dd/mm/yyyy" name="date_available" autocomplete="off" value="<?php echo e($date_available??''); ?>" data-msg-required="Chọn hiệu lực giá" required>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <?php echo $__env->make($templatePath .'.dangtin.includes.option', ['id' => 217, 'value' => $product_options[217]??''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/dangtin/category/van-chuyen/lcl-sell.blade.php ENDPATH**/ ?>