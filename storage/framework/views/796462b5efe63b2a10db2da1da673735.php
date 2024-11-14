

<?php $__env->startSection('content'); ?>
<h1>Categories</h1>
<a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">Add New Category</a>


<div class="category-grid">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="category-card">
            
            <h3><?php echo e($category->name); ?></h3>
            <p>Description: <?php echo e($category->description); ?></p>
            
            <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" onsubmit="return confirm('Are you sure?')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Documents\Book-Management-System\BookManagementSystem\resources\views/categories/index.blade.php ENDPATH**/ ?>