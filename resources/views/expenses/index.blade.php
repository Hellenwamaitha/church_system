@extends('layouts.app')

@section('content')
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
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
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
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->category }}</td>
                <td>{{ $expense->document_path }}</td> <!-- Display the document path -->
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

