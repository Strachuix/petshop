@extends('default')

@section('content')
<div class="container">
    <h1>{{ isset($pet) ? 'Update Pet' : 'Add New Pet' }}</h1>
    <form id="petForm" method="POST" action="{{ isset($pet) ? route('pets.update', $pet['id']) : route('pets.update', null) }}">
        @csrf
        @if(isset($pet))
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $pet['id'] ?? '' }}">
        <div class="mb-3">
            <label for="petName" class="form-label">Pet Name</label>
            <input type="text" class="form-control" id="petName" name="name" value="{{ $pet['name'] ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="petStatus" class="form-label">Pet Status</label>
            <select class="form-control" id="status" name="status" value="{{ $pet['status'] ?? '' }}" required>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="petCategory" class="form-label">Pet Category</label>
            <input type="text" class="form-control" id="petCategory" name="category" value="{{ $pet['category']['name'] ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($pet) ? 'Update Pet' : 'Add Pet' }}</button>
    </form>

    @if($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
