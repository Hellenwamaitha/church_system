@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end mb-3">
        <div class="col-auto">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createBudgetModal">
                Add New Budget Item
            </button>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Budget Items</h3>

                    <div class="col-auto ms-auto">
                        <form action="{{ route('budget.search') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                </div>
                                <input type="text" name="search" class="form-control" placeholder="Search by category">
                            </div>
                        </form>
                    </div>
                </div>



                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Budget Category</th>
                                <th>Amount Allocated</th>
                                <th>Additional Notes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($budgetItems as $budgetItem)
                            <tr>
                                <td>{{ $budgetItem->category }}</td>
                                <td>{{ $budgetItem->amount_allocated }}</td>
                                <td>{{ $budgetItem->additional_notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editbudgetModal{{ $budgetItem->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <x-budget.edit :budgetItem="$budgetItem" />

                                    <form action="{{ route('budget.destroy', $budgetItem->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




<div class="modal fade" id="createBudgetModal" tabindex="-1" role="dialog" aria-labelledby="createBudgetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBudgetModalLabel">{{ __('Add New Budget Item') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('budget.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="category">{{ __('Budget Category') }}</label>
                        <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autofocus>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="amount_allocated">{{ __('Amount Allocated') }}</label>
                        <input id="amount_allocated" type="number" class="form-control @error('amount_allocated') is-invalid @enderror" name="amount_allocated" value="{{ old('amount_allocated') }}" required>
                        @error('amount_allocated')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="additional_notes">{{ __('Additional Notes') }}</label>
                        <textarea id="additional_notes" class="form-control @error('additional_notes') is-invalid @enderror" name="additional_notes" rows="4">{{ old('additional_notes') }}</textarea>
                        @error('additional_notes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

