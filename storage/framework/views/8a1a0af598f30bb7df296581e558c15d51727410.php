

<?php $__env->startSection('page-content'); ?>

  <div class="container-fluid pt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <h3 class="p-1">List of All Products | <a href="<?php echo e(route('products.create')); ?>">Create new Product</a></h3>
          <br>
          <?php if(session('success')): ?>
            <div class="bg-success text-light p-2"><?php echo e(session('success')); ?></div>
          <?php endif; ?>
          <?php if(session('error')): ?>
            <div class="bg-danger text-light p-2"><?php echo e(session('error')); ?></div>
          <?php endif; ?>
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
            <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>#<?php echo e($product->id); ?></td>
                <td><img src="<?php echo e(asset($product->image)); ?>" width="120" alt=""></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->slug); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->category_name); ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="<?php echo e(route('products.edit', $product->id)); ?>">Edit</a>
                  <a class="btn btn-success btn-sm" href="<?php echo e(route('products.show', $product->id)); ?>">Details</a>
                  <form action="<?php echo e(route('products.destroy', $product->id)); ?>" class="d-inline" method="post">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\web_ecommerce\resources\views/admin/products/index.blade.php ENDPATH**/ ?>