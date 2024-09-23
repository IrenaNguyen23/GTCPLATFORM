

<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        //$data = $category->getContentExcelFile();
    ?>
    <div class="container text-center">
        <?php echo htmlspecialchars_decode($category->content); ?>

    </div>

    <?php if ($__env->exists($templatePath .'.news.tabs')) echo $__env->make($templatePath .'.news.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">

        <?php if(auth()->check()): ?>
            <?php if($category->image): ?>
            <div id="container">
                <div id="overlay"></div>
                

                <div class="html-content position-relative">
                    <?php echo $html??''; ?>

                </div>

                <?php if(count($files)>1): ?>
                <div>
                    <nav class="mt-3">
                        <ul class="pagination justify-content-center">
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="page-item"><a class="page-link page-link-ajax <?php echo e(request('page') == $page + 1 ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['page' => $page+1])); ?>"><?php echo e($page+1); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div>
            <?php else: ?>
                <p>Rất tiếc, thông tin bạn tìm kiếm chưa có sẵn.</p>
            <?php endif; ?>
        <?php else: ?>
            <!-- <p>Chúng tôi rất lấy làm tiếc vì tài khoản của bạn hiện tại không đủ điều kiện để xem thông tin này. Vui lòng <a href="<?php echo e(sc_route('account_upgrade')); ?>" target="_blank">nâng cấp tài khoản</a> lên mức cao hơn để xem thông tìn này.</p> -->
            <p>Chúng tôi rất lấy làm tiếc vì hiện tại bạn chưa đủ điều kiện để xem thông tin này. Vui lòng <a href="<?php echo e(sc_route('login')); ?>">đăng nhập</a> hoặc <a href="<?php echo e(sc_route('account_upgrade')); ?>" target="_blank">nâng cấp tài khoản</a> lên mức cao hơn để xem thông tin này.</p>
        <?php endif; ?>

        
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
    <style>
        .table_arrow {
            position: absolute;
            top: 14%;
            left: -30px;
            font-size: 30px;
            cursor: pointer;
        }
        .table_arrow:hover{
            color: #f00;
        }
        .table_arrow.table_arrow_right {
            left: unset;
            right: -30px;
        }
        @media(max-width: 767px)
        {
            .table_arrow {
                display: none;
            }
        }
    </style>    
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        jQuery(document).ready(function($) {
            $(document).on('click', '.page-link-ajax', function(){
                $('.page-link-ajax').removeClass('active');
                $(this).addClass('active');
                var this_href = $(this).prop('href');
                axios({
                    method: 'get',
                    url: $(this).prop('href'),
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                }).then(res => {
                    if(res.data.html != '')
                    {
                        $('.html-content').html(res.data.html);
                        window.history.pushState('', '', this_href);
                        buttonTable();
                        if($('.tablefilter').length)
                        {
                            $('.tablefilter').DataTable({
                             'aoColumnDefs': [{
                                 'bSortable': false,
                                 'aTargets': ['action', 'nosort']
                             }],
                             "order": [], 
                             "aaSorting": [], 
                             'searching': false, 
                             'lengthChange': false, 
                             "paging": false, 
                             "info": false, 
                             "decimal": ",", 
                             "thousands": ".",
                            });
                        }
                    }
                })
                .catch(function (error) {
                    if (error.response) {
                      if(error.response.status == 419)
                        location.reload();
                    } 
                });
                return false;
            })
            buttonTable();
            function buttonTable() {
                var table_xnk = $('.table-xnk');
                if(table_xnk.length)
                {
                  var table = table_xnk.find('.table');
                  if(table.width() > 1200)
                  {
                    // console.log(table_xnk.width());
                    table_xnk.parent().append('<span class="table_arrow table_arrow_left"><i class="bi bi-chevron-left"></i></span><span class="table_arrow table_arrow_right"><i class="bi bi-chevron-right"></i></span>');
                  }
                }
            }
            var scroll_right = '+=300px',
                scroll_left = '-=300px',
                table = $('.table-xnk').find('.table');
            $(document).on('click', ".table_arrow_right", function() {
                event.preventDefault();
                var elem = $(this).parent().find(".table-responsive");
                
                if(scroll_right != '')
                {
                  $(this).parent().find(".table-responsive").animate({
                    scrollLeft: scroll_right
                  },"slow");
                }
                if(elem.scrollLeft() + elem.width() >= table.width()) {
                     scroll_right = '';
                }
                else
                {
                  scroll_right = '+=300px';
                }
              });

              $(document).on('click', ".table_arrow_left", function() {
                event.preventDefault();

                var elem = $(this).parent().find(".table-responsive");
                
                if(elem.scrollLeft() > 0) {
                  $(this).parent().find(".table-responsive").animate({
                    scrollLeft: scroll_left
                  },"slow");
                }

            });

            
        });
    </script>   
<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/theme/news/du-lieu-xuat-nhap-khau.blade.php ENDPATH**/ ?>