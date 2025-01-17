@extends('default')

@section('content')
<div class="container">
    <h1>Find Pet by ID</h1>
    <form id="findPetForm" method="GET">
        <div class="mb-3">
            <label for="petId" class="form-label">Pet ID</label>
            <input type="number" class="form-control" id="petId" name="id" required>
        </div>
        <button type="submit" class="btn btn-primary">Find Pet</button>
    </form>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(isset($pet))
        <div class="mt-5">
            <h2>Pet Details</h2>
            <p><strong>Name:</strong> {{ $pet['name'] }}</p>
            <p><strong>Status:</strong> {{ $pet['status'] }}</p>
            <p><strong>Category:</strong> {{ $pet['category']['name'] ?? 'N/A' }}</p>
        </div>
    @endif
</div>

<script>
document.getElementById('findPetForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var petId = document.getElementById('petId').value;
    var form = this;
    form.action = "{{ url('/pets/') }}/" + petId;
    form.submit();
});
</script>
@endsection
