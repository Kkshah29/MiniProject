<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <img src="<?php echo e(asset('assets/img/logo/logo-default.png')); ?>" alt="logo">
                Pen-It
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo e(route('welcome')); ?>" class="color-light">Home </a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                    <li>
                        <a href="<?php echo e(route('login')); ?>" class="color-light">LOGIN </a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav><?php /**PATH C:\Users\svk\Desktop\Mini Project\blog-management_project\blog-management\resources\views/layouts/blog/_navigation.blade.php ENDPATH**/ ?>