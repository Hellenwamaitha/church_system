<?php $__env->startSection('content'); ?>
<div class="container">


    <div class="row">
        <div class="col-6">
            <h2><strong>Expenses</strong></h2>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addExpenseModal" style="background-color: green; color: white;">
                Add Expense
            </button>
        </div>
    </div>


    <div class="input-group input-group-sm" style="width: 250px;">
        <input type="text" name="table_search" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>


    <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('expenses.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="document" class="form-label">Upload Document</label>
                            <input type="file" name="document" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Expense</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--  table to display expenses -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Category</th>
                <th>Document Path</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($expense->date); ?></td>
                <td><?php echo e($expense->amount); ?></td>
                <td><?php echo e($expense->description); ?></td>
                <td><?php echo e($expense->category); ?></td>
                <td><?php echo e($expense->document_path); ?></td> <!-- Display the document path -->
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hellen/managementapp/resources/views/expenses/index.blade.php ENDPATH**/ ?>