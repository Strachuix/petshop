@extends('default')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4 text-center"> 
                    <div class="card-body">
                        <h5 class="card-title">See all pets</h5>
                        <p class="card-text">See all avaliable pets in our shop</p> 
                        <a href="/pets" class="btn btn-primary">Let's see!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4 text-center"> 
                    <div class="card-body">
                        <h5 class="card-title">Find pet</h5>
                        <p class="card-text">Find a pet by id</p> 
                        <a href="/pets/find" class="btn btn-primary">Find</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mb-4 text-center"> 
                    <div class="card-body">
                        <h5 class="card-title">Add new pet</h5>
                        <p class="card-text">Add new pet to our list</p> 
                        <a href="/pets/add" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
