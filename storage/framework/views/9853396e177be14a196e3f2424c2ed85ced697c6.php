

<?php $__env->startSection('page-content'); ?>

  <div class="container" style="padding: 0px;">
      <div class="row">
        <div class="col-md-12" style="padding: 5px;">
            <img class="card-img-top" src="<?php echo e(asset('storage/products/banner001.jpg')); ?>" alt="Image">
            <div class="card text-center" style="font-size: 18px; padding: 10px 0px 10px 0px;">
            Click on the items below to see details.</div>
        </div>
      </div>
      <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-3" style="padding: 5px; padding-top: 10px;">
              <a href="<?php echo e(route('products.show', $product->id)); ?>" style="text-decoration: none;">
                  <div class="card" style="border: 1px solid #0077bb;">
                      <img class="card-img-top" src="<?php echo e(asset($product->image)); ?>" alt="Image">
                      <div class="text-center text-secondary" style="padding: 15px; padding-bottom: 25px;">
                          <h5 class="text-primary"><?php echo e($product->name); ?></h5>
                          <h6><?php echo e($product->price); ?> Taka</h6>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                              Exercitationem, eos voluptas, delectus neque....</p>
                          <button class="btn btn-secondary">View Details</button>
                      </div>
                  </div>
              </a>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\web_ecommerce\resources\views/admin/homepage.blade.php ENDPATH**/ ?>