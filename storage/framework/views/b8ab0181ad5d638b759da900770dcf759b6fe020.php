<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('assets/img/apple-touch-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('assets/img/apple-touch-icon-114x114.png')); ?>">

    <!-- Load Core CSS
    =====================================-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/core/bootstrap-3.3.7.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/core/animate.min.css')); ?>">

    <!-- Load Main CSS
    =====================================-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main/setting.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main/hover.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('assets/css/color/pasific.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/icon/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/icon/et-line-font.css')); ?>">

    <?php echo $__env->yieldContent('page-level-styles'); ?>
    <!-- Load JS
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    WARNING: Respond.js doesn't work if you view the page via file://
    =====================================-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    

</head>
<body id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">



<!-- Page Loader
===================================== -->
<div id="pageloader" class="bg-grad-animation-1">
    <div class="loader-item">
        <img src="<?php echo e(asset('assets/img/other/oval.svg')); ?>" alt="page loader">
    </div>
</div>

<a href="#page-top" class="go-to-top">
    <i class="fa fa-long-arrow-up"></i>
</a>


<?php echo $__env->make('layouts.blog._navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->yieldContent('header'); ?>

<!-- Blog Area
===================================== -->
<div id="blog" class="pt20 pb50">
    <div class="container">

        <div class="row">
            <div class="col-md-9 mt25">
                <?php echo $__env->yieldContent('main-content'); ?>
            </div>

            <!-- Blog Sidebar
            ===================================== -->
            <?php echo $__env->make('layouts.blog._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>
</div>


<!-- Newsletter Area
=====================================-->
<div id="newsletter" class="bg-dark2 pt50 pb50">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <h4 class="color-light">
                    Newsletter
                </h4>
            </div>

            <div class="col-md-10">
                <form name="newsletter">
                    <div class="input-newsletter-container">
                        <input type="text" name="email" class="input-newsletter" placeholder="enter your email address">
                    </div>
                    <a href="#" class="button button-sm button-pasific hover-ripple-out">Subscribe<i
                            class="fa fa-envelope"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Footer Area
=====================================-->
<footer id="footer" class="footer-one center-block bg-light pt50 pb30 ">
    <div class="container">
        <div class="row">

            <div class="col-md-2 col-xs-12 mb25">
                <div class="navbar-brand-footer center-block">Pen-It</div>
                <div class="copyright center-block">&copy; 2020. All rights reserved.</div>
            </div>

            <div class="col-md-8 col-xs-12 text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class=" bb-solid-1">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Post</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-12 mt25">
                        <ul>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Knowledgebase</a></li>
                            <li><a href="#">Term of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-xs-12">
                <div class="social-container">
                    <ul class="footer-social text-center">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</footer>


<!-- JQuery Core
=====================================-->
<script src="<?php echo e(asset('assets/js/core/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/core/bootstrap-3.3.7.min.js')); ?>"></script>

<!-- Magnific Popup
=====================================-->
<script src="<?php echo e(asset('assets/js/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/magnific-popup/magnific-popup-zoom-gallery.js')); ?>"></script>

<!-- JQuery Main
=====================================-->
<script src="<?php echo e(asset('assets/js/main/jquery.appear.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/main/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/main/parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/main/jquery.sticky.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/main/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/main/main.js')); ?>"></script>

<?php echo $__env->yieldContent('page-level-scripts'); ?>

</body>
</html><?php /**PATH C:\Users\svk\Desktop\Mini Project\blog-management_project\blog-management\resources\views/layouts/blog/layout.blade.php ENDPATH**/ ?>