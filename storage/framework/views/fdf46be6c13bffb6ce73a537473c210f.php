

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2>Welcome, <?php echo e(Auth::user()->name); ?></h2>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Your Services
                </div>
                <div class="card-body">
                    <p>Access your healthcare services here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Allicia\OneDrive\Documents\SI Sem 6\MedFast\resources\views/dashboard.blade.php ENDPATH**/ ?>