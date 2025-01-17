@extends('default')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('registrationPost') }}" class="ms-auto me-auto mt-auto">
            @csrf
            <div class="mb-3">
                <label for="loginInput" class="form-label">Login</label>
                <input type="text" class="form-control" id="loginInput" name="login" required>
            </div>
            <div class="mb-3">
                <label for="firstNameInput" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstNameInput" name="firstName" required>
            </div>
            <div class="mb-3">
                <label for="lastNameInput" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastNameInput" name="lastName" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email" required>
            </div>
            <<div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
@endsection