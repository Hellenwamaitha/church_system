@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Total Members</h5>
                <p class="card-text" id="totalMembers">Loading...</p>
            </div>    
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Active Members</h5>
                <p class="card-text" id="activeMembers">Loading...</p>
            </div>    
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Inactive Members</h5>
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
        console.log('Fetching count data...')
        axios.get('{{ route('admin.getCountData') }}')
            .then(response => {
                const data = response.data;
                document.getElementById('totalMembers').textContent = data.totalMembers;
                document.getElementById('activeMembers').textContent = data.activeMembers;
                document.getElementById('inactiveMembers').textContent = data.inactiveMembers;
            })
            .catch(error => console.error('Error fetching count data:', error));
    }

    // Poll the server every 10 seconds for updates
    setInterval(fetchCountData, 10000);

    // Initial data load
    fetchCountData();
});

</script>
@endpush
