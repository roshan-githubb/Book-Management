

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1>Books</h1>

    <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary mb-3">Add New Book</a>
    <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary mb-3">Go to Categories</a>

    
    <form method="GET" action="<?php echo e(route('books.index')); ?>" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control">
                    <option value="">All Categories</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(request()->category == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-4 mb-2">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control" value="<?php echo e(request()->author); ?>">
            </div>

            <div class="col-md-4 mb-2">
                <label for="published_date">Published Date</label>
                <input type="date" id="published_date" name="published_date" class="form-control" value="<?php echo e(request()->published_date); ?>">
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

   
    <div class="row">
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                  
                    <a href="<?php echo e(route('books.show', $book->id)); ?>">
                    <img src="<?php echo e(asset('storage/' . $book->image)); ?>" class="card-img-top" alt="<?php echo e($book->name); ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            
                            <a href="<?php echo e(route('books.show', $book->id)); ?>"><?php echo e($book->name); ?></a>
                        </h5>
                        <p class="card-text">Author: <?php echo e($book->author_name); ?></p>
                        <p class="card-text">Category: <?php echo e($book->category->name); ?></p>
                        <p class="card-text">Published: <?php echo e($book->published_date); ?></p>
                        <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-secondary">Edit</a>

                        <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

   
    <?php echo e($books->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Documents\Book-Management-System\BookManagementSystem\resources\views/books/index.blade.php ENDPATH**/ ?>