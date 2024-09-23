<script type="text/javascript">

var selectedRows = function () {
    var selected = [];
    $('.grid-row-checkbox:checked').each(function(){
        selected.push($(this).data('id'));
    });

    return selected;
}

$('.grid-trash').on('click', function() {
  var ids = selectedRows().join();
  deleteItem(ids);
});

function deleteItem(ids){
  Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true,
  }).fire({
    title: '<?php echo e(sc_language_render('action.delete_confirm')); ?>',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: '<?php echo e(sc_language_render('action.confirm_yes')); ?>',
    confirmButtonColor: "#DD6B55",
    cancelButtonText: '<?php echo e(sc_language_render('action.confirm_no')); ?>',
    reverseButtons: true,

    preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
                method: 'post',
                url: '<?php echo e($urlDeleteItem ?? ''); ?>',
                data: {
                  ids:ids,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function (data) {
                    if(data.error == 1){
                      alertMsg('error', data.msg, '<?php echo e(sc_language_render('action.warning')); ?>');
                      $.pjax.reload('#pjax-container');
                      return;
                    }else{
                      alertMsg('success', data.msg);
                      $.pjax.reload('#pjax-container');
                      resolve(data);
                    }

                }
            });
        });
    }

  }).then((result) => {
    if (result.value) {
      alertMsg('success', '<?php echo e(sc_language_render('action.delete_confirm_deleted_msg')); ?>', '<?php echo e(sc_language_render('action.delete_confirm_deleted')); ?>');
    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      // swalWithBootstrapButtons.fire(
      //   'Cancelled',
      //   'Your imaginary file is safe :)',
      //   'error'
      // )
    }
  })
}
</script><?php /**PATH /home/deviceaz/gtcplatform.exproweb.com/resources/views/admin/component/script_remove_list.blade.php ENDPATH**/ ?>