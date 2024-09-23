<?php
	$options = $customer->getOptions();
?>
<?php if($customer->role == 4): ?>
	<div class="customer-item customer-logistic">
		<h3><?php echo e($customer->company); ?></h3>
		<div class="item-content">
			<div class="avatar">
				<?php if($customer->avatar): ?>
				<img src="<?php echo e(asset($customer->avatar)); ?>" alt="<?php echo e($customer->fullname); ?>" class="card-img-top">
				<?php else: ?>
				<img src="<?php echo e(asset('assets/images/no-image.jpg')); ?>" alt="<?php echo e($customer->fullname); ?>" class="card-img-top">
				<?php endif; ?>
			</div>
			<div class="info px-3">
				<ul>
					<li><span>Địa chỉ:</span> <?php echo e($customer->address); ?></li>
					<li><span>Điện thoại:</span> <span class="show-phone-text"><?php echo e($customer->getPhone(1)); ?></span> <span class="show-phone" data-id="<?php echo e($customer->id); ?>"  onclick="">Hiện số</span></li>
					<li><span>Dịch vụ chính:</span> <?php echo e($options[66]??''); ?></li>
					<li><span>Các tuyến chính:</span> <?php echo e($options[104]??''); ?> </li>
				</ul>
			</div>
		</div>
		<div class="item-share d-flex mt-2">
			<div class="share-box  text-center">
                <a class="" href="javascript:;"><i class="fas fa-share-alt"></i> Chia sẻ</a>
                <ul class="list-unstyled share-box-social">
                	<li>
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>" data-event="social share" data-info="Facebook" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="http://twitter.com/share?url=<?php echo e(url()->current()); ?>&text=How%20to%20Tag%20a%20Link%20on%20Your%20Facebook%20Page"  data-event="social share" data-info="Twitter" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
			<a href="tel:<?php echo e($customer->getPhone()); ?>"><i class="fas fa-phone"></i> Liên hệ</a>
			<a href="<?php echo e($customer->getUrlBaoGia()); ?>" target="_blank" class="active">Yêu cầu báo giá</a>
		</div>
	</div>
<?php else: ?>
<div class="card author-item">
	<div class="author-img">
		<div class="img">
			<?php if($author->avatar): ?>
			<img src="<?php echo e(asset($author->avatar)); ?>" alt="<?php echo e($author->fullname); ?>" class="card-img-top">
			<?php else: ?>
			<img src="<?php echo e(asset('assets/images/no-image.jpg')); ?>" alt="<?php echo e($author->fullname); ?>" class="card-img-top">
			<?php endif; ?>
		</div>
	</div>
	<div class="details">
		<div class="detail-top">
			<h5 class="card-title title"><?php echo e($author->fullname); ?></h5>
			<p class="card-text info">“ <?php echo e($author->slogan); ?> “</p>
		</div>
		<div class="info-achieve">
			<a href="<?php echo e(route('author.detail', $author->id)); ?>">Xem thêm</a>
		</div>
	</div>
</div>
<?php endif; ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/author/author-item.blade.php ENDPATH**/ ?>