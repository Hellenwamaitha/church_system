<?php $__env->startSection('content'); ?>

<style>
    .custom-button {
        width: 190px; /* Adjust the width as needed */
    }
    .table-wrapper {
        max-height: 400px; /* Adjust height as needed */
        overflow-y: auto;
    }
</style>

<div class="container mt-4">
    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col d-flex justify-content-end">
            <button type="button" class="btn btn-success custom-button" data-bs-toggle="modal" data-bs-target="#addDataModal">
                Add Data
            </button>
        </div>
        
    </div>

    <div class="row mb-4">
        <div class="col d-flex justify-content-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ImportModal">Import</button>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Offerings Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2 style="font-weight: bold;">OFFERINGS</h2>
                </div>
                <div class="card-body table-wrapper">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $offerings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($offering->date); ?></td>
                                <td><?php echo e($offering->amount); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tithes Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2 style="font-weight: bold;">TITHES</h2>

                </div>
                <div class="card-body table-wrapper">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tithes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tithe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tithe->date); ?></td>
                                <td><?php echo e($tithe->amount); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Add Data Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="offeringTithesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="offeringTithesModalLabel">Add Offering/Tithe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('offeringtithes.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Select Type</option>
                            <option value="offering">Offering</option>
                            <option value="tithe">Tithe</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ImportModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('offeringtithes.import.post')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="file" name="file" accept=".xls,.xlsx,.csv">
    <button type="submit" class="btn btn-primary">Import</button>
</form>
            </div>
        </div>
    </div>
</div>


 <script>
  $(document).ready(function() {
    // Add event listener to the modal's submit button
    $('#submitBtn').on('click', function() {
        // Validate the form fields
        if ($('#date').val() && $('#type').val() && $('#amount').val()) {
            // Submit the form
            $.ajax({
                type: 'POST',
                url: $('form').attr('action'),
                data: $('form').serialize(),
                success: function(response) {
                    console.log('Form submitted successfully!');
                    // Redirect or handle the successful submission
                },
                error: function(xhr, status, error) {
                    console.error('Error submitting the form:', error);
                    // Handle the submission error
                }
            });
        } else {
            // Display an error message or handle the validation failure
            alert('Please fill in all the required fields.');
        }
    });
});



        document.getElementById('importButton').addEventListener('click', function() {
    $('#importModal').modal('show');
});
 </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hellen/managementapp/resources/views/offeringtithes/index.blade.php ENDPATH**/ ?>