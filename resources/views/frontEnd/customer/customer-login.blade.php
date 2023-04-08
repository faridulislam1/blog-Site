@extends('frontEnd.master')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Customer login form</h6>
                        {{ session('message') }}
                        <hr/>

                        <form method="post" action="{{ route('customer.login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <input type="text" class="form-control" name="user_name" placeholder="Enter Name">
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
