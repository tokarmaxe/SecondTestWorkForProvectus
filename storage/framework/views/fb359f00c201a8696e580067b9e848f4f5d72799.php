<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You are login. Hello <?php echo e(Auth::user()->name); ?></div>
                    <div class="panel-heading"><h1>Create Tag</h1></div>
                    <div class="panel-body">
                        <form action="<?php echo e(route('tags.store')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <label>Tag`s Name:</label><br>
                            <input type="text" name="tagname"><br>
                            <label>Task`s Id (write ids with separator "/"):</label><br>
                            <input type="text" name="task_id"><br>
                            <input type="submit" value="Add" name="sub">
                        </form>
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>