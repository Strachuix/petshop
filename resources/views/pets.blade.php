@extends('default')

@section('content')
<div class="container">
    <h1>Available Pets</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(isset($pets) && $pets->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
            <tr class="cursor-pointer" onclick="window.location.href='{{ route('pets.detail', ['id' => $pet['id']]) }}'">
                <td>{{ $pet['id'] }}</td>
                <td>{{ $pet['name'] ?? '-' }}</td>
                <td>{{ $pet['category']['name'] ?? '-' }}</td>
                <td>{{ $pet['status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pets->links('vendor.pagination.bootstrap-4') }}

    @else
    <p>No pets available.</p>
    @endif
</div>
@endsection
