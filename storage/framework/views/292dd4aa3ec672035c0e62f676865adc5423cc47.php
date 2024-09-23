<?php if(!empty($id)): ?>
	<?php
		$option = \App\Models\ShopOption::find($id);
		if($option)
		{
			$options = $option->posts;
			$value = $value??'';

			$required = $multiple = '';
			if($option->required)
				$required = 'required';
			if($option->type_data == 'multiple')
				$multiple = 'multiple';

			$option_name = $option_title??$option->name;
		}
	?>

	<?php if($option): ?>
		<?php if($option->type == 'select'): ?>
			<?php
				// loc option thuoc category json
				if(!empty($category))
				{
					$options_ = [];
					$options_ = array_map(function($k) use($category) {
						$unit_decode = json_decode($k['unit'])??[];
						if(is_array($unit_decode) && in_array($category->id, $unit_decode))
							return $k;
					}, $options->toArray());
					$options_ = array_filter($options_);
				}
				else
					$options_ = $options->toArray();
			?>
			<div class="optionItem">
	         <div class="input-boder active">
	            <label><?php echo e($option_name); ?> <?php echo $option->required?'<span>*</span>':''; ?></label>
	            <select class="form-select <?php echo e($multiple?'select2' :''); ?>" name="option[<?php echo e($option->id); ?>]<?php echo e($multiple?'[]' :''); ?>" <?php echo e($multiple); ?> 
	            	<?php echo e($required); ?>

	            	data-msg-required="<?php echo e($required!=''?'Chọn '. $option_name : ''); ?>"
	            	>
	            	<?php if(!$required): ?>
	            	<option value="">----- Chọn <?php echo e($option_name); ?> -----</option>
	            	<?php endif; ?>
	            	<?php if(count($options_)): ?>
	            		<?php $__currentLoopData = $options_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            			<?php if($item): ?>
	            			<option value="<?php echo e($item['name']); ?>" <?php echo e($value == $item['name'] ? 'selected' : ''); ?>><?php echo e($item['name']); ?></option>
	            			<?php endif; ?>
	            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            <?php else: ?>
		               <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			               <?php if(is_array($value)): ?>
			               	<option value="<?php echo e($item->name); ?>" <?php echo e(in_array($item->name, $value) ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
			               <?php else: ?>
			               	<option value="<?php echo e($item->name); ?>" <?php echo e($value == $item->name ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
			               <?php endif; ?>
		               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	               <?php endif; ?>
	            </select>
	         </div>
	      </div>
	   <?php elseif($option->type == 'input'): ?>
	   <?php
	   	$number_format = '';
	   	if($option->type_data == 'number')
	   		$number_format = 'number_format';
	   ?>
	   <div class="optionItem">
         <div class="input-boder ">
            <label><?php echo e($option_name); ?> <?php echo $option->required?'<span>*</span>':''; ?></label>
            <input type="text" class="form-control input-value <?php echo e($number_format); ?>" 
            	name="option[<?php echo e($option->id); ?>]" 
            	value="<?php echo e($number_format != '' && $value?number_format((int)$value):$value); ?>" 
            	<?php echo e($required); ?>

            	data-msg-required="<?php echo e($required!=''?'Nhập '. $option_name : ''); ?>"
            	>
            <?php if($option->unit): ?>
            <span class="unit"><?php echo e($option->unit); ?></span>
            <?php endif; ?>
         </div>
      </div>
	   <?php elseif($option->type == 'date'): ?>
	   <div class="optionItem">
         <div class="input-boder active">
            <label><?php echo e($option_name); ?> <?php echo $option->required?'<span>*</span>':''; ?></label>
            <input type="text" class="form-control input-value datepicker" name="option[<?php echo e($option->id); ?>]" value="<?php echo e($value); ?>" placeholder="dd/mm/yyyy" 
            <?php echo e($required); ?>

            data-msg-required="<?php echo e($required!=''?'Nhập '. $option_name : ''); ?>"
            >
         </div>
      </div>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/dangtin/includes/option.blade.php ENDPATH**/ ?>