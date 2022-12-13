<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo e($name); ?></h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">IP</th>
                                <th scope="col">Port</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo e($status); ?></th>
                                <td><?php echo e($status); ?></td>
                                <td><?php echo e($status); ?></td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\VertrigoServ\www\blog\resources\views/item/itemView.blade.php ENDPATH**/ ?>