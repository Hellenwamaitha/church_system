@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Membership Status Distribution</h3>
        </div>
        <div class="card-body">
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // var statusLabels = @json($statusData->pluck('membership_status'));
        var statusCounts = @json($statusData->pluck('count'));

        var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusCounts,
                    backgroundColor: ['rgba(54, 162, 235)', 'rgba(255, 99, 132'],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return statusLabels[tooltipItem.index] + ': ' + statusCounts[tooltipItem.index];
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush


