<?php $__env->startSection('title', 'Pen-It | Heaven for bloggers!'); ?>

<?php $__env->startSection('header'); ?>
<header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="<?php echo e(asset('assets/img/bg/img-bg-17.jpg')); ?>" data-positiony="1000">
    <div class="intro-body text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt50">
                    <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                        Pen-It
                        <small class="color-light alpha7">Heaven for Bloggers!</small>
                    </h1>
                </div>
            </div>
        </div>

    </div>
</header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                <h4 class="blog-title"><a href="<?php echo e(route('blog.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h4>
                <div class="blog-three-attrib">
                    <span class="icon-calendar"></span> <?php echo e($post->published_at->diffForHumans()); ?> |
                    <span class=" icon-pencil"></span> <a href="#"><?php echo e($post->author->name); ?></a>
                </div>
                <img src="<?php echo e(asset('storage/'.$post->image)); ?>" class="img-responsive" alt="image blog">
                <p class="mt25">
                    <?php echo e($post->excerpt); ?>

                </p>
                <a href="<?php echo e(route('blog.show', $post->id)); ?>" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Sorry there are no posts available currently for this!</p>
        <?php endif; ?>
    </div>

    <?php echo e($posts->appends(['search'=>request('search')])->links()); ?>

                <!-- Blog Paging
                ===================================== -->
                <!-- <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
                    <div class="col-md-6">
                        <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward">
                            Old Entries
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
                    </div>
                </div> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\svk\Desktop\Mini Project\blog-management_project\blog-management\resources\views/blog/index.blade.php ENDPATH**/ ?>