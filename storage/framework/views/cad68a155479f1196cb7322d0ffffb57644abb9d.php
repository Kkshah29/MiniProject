
<?php if($paginator->hasPages()): ?>
<div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">

    <?php if($paginator->onFirstPage()): ?>
    <div class="col-md-6">
        <a href="javascript:;" class="button button-sm button-gray pull-left">
            Old Entries
        </a>
    </div>
    <?php else: ?>
        <div class="col-md-6">
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="button button-sm button-pasific pull-left hover-skew-backward">
                Old Entries
            </a>
        </div>
    <?php endif; ?>

    
    <?php if($paginator->hasMorePages()): ?>
        <div class="col-md-6">
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
        </div>
    <?php else: ?>
        <div class="col-md-6">
            <a href="javascript:;" class="button button-sm button-gray pull-right">New Entries</a>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?><?php /**PATH C:\Users\svk\Desktop\Mini Project\blog-management_project\blog-management\resources\views/vendor/pagination/simple-bootstrap-4.blade.php ENDPATH**/ ?>