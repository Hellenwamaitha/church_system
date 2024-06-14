@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Budget Item') }}</div>

                <div class="card-body">
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

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
