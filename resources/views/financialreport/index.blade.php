@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Cards for displaying totals -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Offerings</h5>
                    <p class="card-text">${{ number_format($totalOfferings, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Tithes</h5>
                    <p class="card-text">${{ number_format($totalTithes, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Income</h5>
                    <p class="card-text">${{ number_format($totalIncome, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table to display data -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Total Offerings</th>
                <th>Total Tithes</th>
                <th>Total Income</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>${{ number_format($totalOfferings, 2) }}</td>
                <td>${{ number_format($totalTithes, 2) }}</td>
                <td>${{ number_format($totalIncome, 2) }}</td>
                <td>
                    <!-- Print Button -->
                    <button onclick="window.print()" class="btn btn-primary">
                        Print
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    <div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">Add Financial Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addReportForm" method="POST" action="{{ route('financialreport.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="total_offerings" class="form-label">Total Offerings</label>
                            <input type="number" class="form-control" id="total_offerings" name="total_offerings" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_tithes" class="form-label">Total Tithes</label>
                            <input type="number" class="form-control" id="total_tithes" name="total_tithes" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_income" class="form-label">Total Income</label>
                            <input type="number" class="form-control" id="total_income" name="total_income" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Report</button>
                    </form>
                </div>
            </div>
        </div>


<script>
    @media print {
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .card, .table {
        page-break-inside: avoid;
    }

    .print-button {
        display: none;
    }
}

</script>
@endsection


