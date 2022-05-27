<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?php echo e(route('posts.create')); ?>"  class="btn btn-primary">Add Post</a>
    </div>
    <div class="card">
        <div class="card-header">Posts</div>

        <div class="card-body">
            <?php if($posts->count()>0): ?>
            <table class="table table-bordered">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Auther</th>
                    <th>Category</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset('storage/'.$post->image)); ?>" alt="Post Image" width="128"></td>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->excerpt); ?></td>
                            <td><?php echo e($post->author->name); ?></td>
                            <td><?php echo e($post->category->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="displayModalForm(<?php echo e($post); ?>)"
                                   data-toggle="modal"
                                   data-target="#deleteModal">Trash</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <h5>Nothing TO show</h5>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <?php echo e($posts->links()); ?>

        </div>
    </div>
    <!--DELETE MODAL-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="deleteForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="modal-body">
                        <p>Are you sure want to delete Post??</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Trash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END DELETE MODAL-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-level-scripts'); ?>
    <script type="text/javascript">
        function displayModalForm($post) {
            var url = '/trash/' + $post.id;
            $("#deleteForm").attr('action', url);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\svk\Desktop\Mini Project\blog-management_project\blog-management\resources\views/posts/index.blade.php ENDPATH**/ ?>