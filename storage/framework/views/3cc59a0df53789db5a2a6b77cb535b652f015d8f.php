<?php
    $user_vote = $user->getVoteCount();

    if(auth()->check())
      $disabled = auth()->user()->checkVote($user->id)?'disabled':'';
    else
      $disabled = 'disabled';
?>
<div class="d-flex align-items-center ">
  <ul class="ratings <?php echo e($disabled??''); ?>" data-id="<?php echo e($user->id); ?>">
  <li class="star <?php echo e($user_vote == 5 ? 'selected' : ''); ?>" title="5" ></li>
  <li class="star <?php echo e($user_vote >= 4 ? 'selected' : ''); ?>" title="4"></li>
  <li class="star <?php echo e($user_vote >= 3 ? 'selected' : ''); ?>" title="3"></li>
  <li class="star <?php echo e($user_vote >= 2 ? 'selected' : ''); ?>" title="2"></li>
  <li class="star <?php echo e($user_vote >= 1 ? 'selected' : ''); ?>" title="1"></li>
</ul>
<span style="white-space: nowrap; font-size: 13px">(<?php echo e($user->getVote()->count()); ?> vote)</span>
</div><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/author/author-vote.blade.php ENDPATH**/ ?>