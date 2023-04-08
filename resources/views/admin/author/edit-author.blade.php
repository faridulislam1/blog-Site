@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Author Edit Form</h6>
                        <hr/>
                        <form class="row g-3" action="{{ route('update.author') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$author->id}}">
                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="author_name" value="{{$author->author_name }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" value="{{$author ->image }}" class="form-control">
                                <img src="{{ asset ($author->image)}}" class="img-fluid" style="width:80px;height:50px;" alt="">
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
