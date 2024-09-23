<?php 
    $i=0;
    $description_show = $description_show??false;

    if(!empty($post_url))
        $post_url_ = str_replace(url('/'), '', $post_url);
?>
<?php if(!empty($languages)): ?>
    <div class="tab-content">
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tab-pane fade <?php echo e($i == 0 ? 'show active' : ''); ?>" id="<?php echo e($code); ?>" role="tabpanel" aria-labelledby="<?php echo e($code); ?>-tab">
            <div class="form-group">
                <label for="name_<?php echo e($code); ?>">Tiêu đề (<?php echo e($code); ?>)</label>
                <input type="text" class="form-control title_slugify" id="name_<?php echo e($code); ?>" name="description[<?php echo e($code); ?>][name]" placeholder="Tiêu đề" value="<?php echo e($description[$code]['name'] ?? ''); ?>">
            </div>

            <?php if($i==0): ?>
            <div class="form-group">
                <label for="slug">Slug thể loại tin</label>
                <input type="text" class="form-control slug_slugify" id="slug" name="slug" placeholder="Slug" value="<?php echo e($slug ?? ''); ?>">
            </div>
            <?php endif; ?>
            <?php if(!empty($post_url)): ?>
                <?php
                    $post_url_lang = $post_url_;
                    if(!$lang->set_default)
                    {
                        $post_url_lang = '/' . $code . $post_url_;
                    }
                    
                ?>
                <p class="p-3 bg-light">URL:
                    <a href="<?php echo e($post_url_lang); ?>" class="text-danger" target="_blank"><b><?php echo e($post_url_lang); ?></b></a>
                </p>
            <?php endif; ?>
            

            <?php if($description_show): ?>
            <div class="form-group">
                <label for="description_<?php echo e($code); ?>">Trích dẫn  (<?php echo e($code); ?>)</label>
                <textarea id="description_<?php echo e($code); ?>" name="description[<?php echo e($code); ?>][description]"><?php echo $description[$code]['description'] ?? ''; ?></textarea>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="content_<?php echo e($code); ?>">Nội dung  (<?php echo e($code); ?>)</label>
                <textarea id="content_<?php echo e($code); ?>" name="description[<?php echo e($code); ?>][content]"><?php echo $description[$code]['content'] ?? ''; ?></textarea>
            </div>

            <hr>

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
            
        </div>
        <?php
        $i++;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/partials/tab-content.blade.php ENDPATH**/ ?>