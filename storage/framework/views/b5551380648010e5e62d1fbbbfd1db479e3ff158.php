

<?php $__env->startSection('page-content'); ?>

  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <h3 class="p-1">Edit Category | <a href="<?php echo e(route('categories.index')); ?>">Category List</a></h3>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <?php if(session('success')): ?>
                  <div class="bg-success text-light p-2"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                  <div class="bg-danger text-light p-2"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="post">
                  <?php echo method_field('PUT'); ?>
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="<?php echo e($category->name); ?>" class="form-control">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\web_ecommerce\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>