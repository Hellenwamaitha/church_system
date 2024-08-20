@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                     <h5 class="card-title">Total Members</h5>
                     <p class="card-text" id="totalMembers">Loading...</p>
                </div>    
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                     <h5 class="card-title">Active Members</h5>
                     <p class="card-text" id="activeMembers">Loading...</p>
                </div>    
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                     <h5 class="card-title">Inactive Members</h5>
                     <p class="card-text" id="inactiveMembers">Loading...</p>
                </div>    
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to fetch and update count data
        function fetchCountData() {
        fetch('{{ route('admin.getCountData') }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-members').querySelector('p').textContent = data.totalMembers;
                document.getElementById('active-members').querySelector('p').textContent = data.activeMembers;
                document.getElementById('inactive-members').querySelector('p').textContent = data.inactiveMembers;
                
            })
            .catch(error => console.error('Error fetching count data:', error));
    }

        // Poll the server every 10 seconds for updates
        setInterval(fetchMemberCounts, 10000);

        // Initial data load
        fetchMemberCounts();
    });
</script>
@endpush


