@extends('default')
@section('title', 'Login')
@section('content')
    <div class="container">
        <form action="{{ route('loginPost') }}" method="POST" class="ms-auto me-auto mt-auto">
            @csrf
            <div class="mb-3">
                <label for="loginInput" class="form-label">Login</label>
                <input type="text" class="form-control" id="loginInput" name="login" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
