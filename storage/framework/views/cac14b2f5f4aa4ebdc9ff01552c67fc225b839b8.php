<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Item</h4>
                </div>
                <p class="text-success"><?php echo e(Session::get('message')); ?></p>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('updateItem')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Website</label>
                          <input type="text" name="website" class="form-control" value="<?php echo e($singleItem->website); ?>" placeholder="Enter website">
                          <input type="hidden" name="id" class="form-control" value="<?php echo e($singleItem->id); ?>" placeholder="Enter website">
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create new item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\VertrigoServ\www\blog\resources\views/item/itemEdit.blade.php ENDPATH**/ ?>