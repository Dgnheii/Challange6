<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px;">
                    Website List
                    </br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New</button>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Website</th>
                            <th scope="col">Status</th>
                            <th scope="col">IP</th>
                            <th scope="col">Port</th>
                            </tr>
                        </thead>
                        <?php
                            $i = 0;
                            foreach ($websites as $a) {
                        ?>
                        <tbody>
                            <tr>
                                <th scope="row"> <?php echo e($i+=1); ?> </th>
                                <td> <?php echo e($a->website); ?></td>
                                <td><?php echo e($a->status); ?></td>
                                <td><?php echo e($a->ip); ?></td>
                                <td><?php echo e($a->port); ?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload New File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('uploadFile')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <input type="file" name="file" class="form-control">
              <br>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Import Website List</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\VertrigoServ\www\blog\resources\views/website/viewFile.blade.php ENDPATH**/ ?>