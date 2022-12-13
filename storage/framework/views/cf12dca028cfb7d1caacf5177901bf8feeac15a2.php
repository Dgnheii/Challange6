<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px;">
                    Edit
                </div>

                <div class="card-body">
                        
                    <form method="POST" action="<?php echo e(route('updateWebsite')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="Website">Website</label>
                            <input type="text" name="website" class="form-control" value="<?php echo e($website->website); ?>">
                        </div>
                        <div class="form-group">
                            <label for="Website">Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo e($website->status); ?>">
                        </div>
                        <div class="form-group">
                            <label for="Website">IP</label>
                            <input type="text" name="ip" class="form-control" value="<?php echo e($website->ip); ?>">
                        </div>
                        <div class="form-group">
                            <label for="Website">Port</label>
                            <input type="text" name="port" class="form-control" value="<?php echo e($website->port); ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\VertrigoServ\www\blog\resources\views/website/editWeb.blade.php ENDPATH**/ ?>