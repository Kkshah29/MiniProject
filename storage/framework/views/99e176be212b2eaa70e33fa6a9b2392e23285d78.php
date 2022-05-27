<div class="row">
    <div class="col-md-12">
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session()->get('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session()->get('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    </div>
</div><?php /**PATH C:\Users\svk\Desktop\Mini Project\blog-management_project\blog-management\resources\views/layouts/_message.blade.php ENDPATH**/ ?>