<!-- resources/views/components/budget/edit.blade.php -->
@props(['budgetItem'])

<div class="modal fade" id="editbudgetModal{{ $budgetItem->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $budgetItem->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $budgetItem->id }}">{{ __('Edit Budget Item') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>
            <form id="editForm{{ $budgetItem->id }}" action="{{ route('budget.update', $budgetItem->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-category{{ $budgetItem->id }}">{{ __('Budget Category') }}</label>
                        <input type="text" name="category" id="edit-category{{ $budgetItem->id }}" class="form-control" value="{{ $budgetItem->category }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-amount_allocated{{ $budgetItem->id }}">{{ __('Amount Allocated') }}</label>
                        <input type="number" name="amount_allocated" id="edit-amount_allocated{{ $budgetItem->id }}" class="form-control" value="{{ $budgetItem->amount_allocated }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-additional_notes{{ $budgetItem->id }}">{{ __('Additional Notes') }}</label>
                        <textarea name="additional_notes" id="edit-additional_notes{{ $budgetItem->id }}" class="form-control">{{ $budgetItem->additional_notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
