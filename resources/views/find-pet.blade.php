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

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($pet))
            <div class="mt-5">
                <h2>Pet Details</h2>
                <p><strong>Name:</strong> {{ $pet['name'] }}</p>
                <p><strong>Status:</strong> {{ $pet['status'] }}</p>
                <p><strong>Category:</strong> {{ $pet['category']['name'] ?? 'N/A' }}</p>
                <div class="container d-flex flex-row">
                    <form id="deletePetForm" method="POST" action="{{ route('pets.delete', $pet['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Pet</button>
                    </form>
                    <a href="{{ route('pets.edit', $pet['id']) }}" class="btn btn-primary ms-2">Update Pet</a>
                </div>
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
