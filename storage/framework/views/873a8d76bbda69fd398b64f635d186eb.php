

<?php $__env->startSection('content'); ?>
<h1>Edit Book - <?php echo e($book->name); ?></h1>

<form action="<?php echo e(route('books.update', $book)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label for="name">Book Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo e($book->name); ?>" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e($book->category_id == $category->id ? 'selected' : ''); ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author_name">Author</label>
        <input type="text" name="author_name" id="author_name" class="form-control" value="<?php echo e($book->author_name); ?>" required>
    </div>

    <div class="form-group">
        <label for="published_date">Published Date</label>
        <input type="date" name="published_date" id="published_date" class="form-control" value="<?php echo e($book->published_date); ?>" required>
    </div>

    <div class="form-group">
        <label for="image">Book Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
        <?php if($book->image): ?>
            <img src="<?php echo e(Storage::url($book->image)); ?>" alt="Book Image" style="width:100px;height:100px;">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Documents\Book-Management-System\BookManagementSystem\resources\views/books/edit.blade.php ENDPATH**/ ?>