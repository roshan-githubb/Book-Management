

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1><?php echo e($book->name); ?></h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?php echo e($book->name); ?></h3>
            <p><strong>Category:</strong> <?php echo e($book->category->name); ?></p>
            <p><strong>Author:</strong> <?php echo e($book->author_name); ?></p>
            <p><strong>Published Date:</strong> <?php echo e($book->published_date->format('F j, Y')); ?></p>

            <?php if($book->image): ?>
                <div>
                    <img src="<?php echo e(Storage::url('images/'.$book->image)); ?>" alt="Book Image" class="img-fluid" style="max-height: 400px;">
                </div>
            <?php else: ?>
                <p>No image available</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="mt-4">
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary">Back to Book List</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Documents\Book-Management-System\BookManagementSystem\resources\views/books/show.blade.php ENDPATH**/ ?>