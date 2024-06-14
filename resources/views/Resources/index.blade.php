@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Budget Items') }}</div>

                <div class="card-body">
                    <a href="{{ route('budget.create') }}" class="btn btn-primary mb-3">{{ __('Add New Budget Item') }}</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Budget Category') }}</th>
                                <th>{{ __('Amount Allocated') }}</th>
                                <th>{{ __('Additional Notes') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <td>
                            {{-- <a href="{{ route('budget.edit', $item->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a> --}}
                            {{-- <form action="{{ route('budget.destroy', $item->id) }}" method="POST" class="d-inline"> --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
