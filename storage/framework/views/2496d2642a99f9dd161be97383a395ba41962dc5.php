<?php
	$menus = Menu::getByName('Category-tabs');
?>
<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($menu['link'] == $category->slug): ?>
		<div class="nav-scroll">
		    <ul class="nav nav-pills nav-product-tabs" id="pills-tab" role="tablist">
		        <?php $__currentLoopData = $menu['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <?php
					    $menu_active = '';
					    if (url()->current() == url($item['link']??'#'))
					       $menu_active = ' active';
					?>
			        <li class="nav-item">
			            <a class="nav-link <?php echo e($menu_active); ?>" href="<?php echo e(url($item['link']??'#')); ?>"><span><?php echo e($item['label']); ?></span></a>
			        </li>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </ul>
		</div>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/product/category-tabs.blade.php ENDPATH**/ ?>