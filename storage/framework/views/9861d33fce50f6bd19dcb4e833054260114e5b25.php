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
                            $file = fopen(storage_path('app\public\websiteUpload\\'.$filename), "r");
                        ?>
                        <?php while(!feof($file)) {
                            $line = fgets($file);
                        ?>
                        <tbody>
                            <tr>     
                                <th scope="row"> <?php echo e($i+=1); ?> </th>
                                <td> <?php echo e($line); ?></td>
                                <td>
                                    <?php
                                        $status = exec("ping -n 1 $line");
                                        if (strpos($status, 'unreachable') !== false) {
                                            echo "Offline";
                                        } else {
                                            echo "Online";
                                        }
                                    ?>
                                </td>
                                <td> <?php echo e(Request::ip()); ?> </td>
                                <td>
                                    <?php echo e(Request::getPort()); ?>

                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\VertrigoServ\www\chall6\resources\views/website/viewFile.blade.php ENDPATH**/ ?>