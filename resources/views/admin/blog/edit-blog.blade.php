@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Edit Blog Form</h6>
                        <hr/>
                        <form class="row g-3" action="{{ route('update.blog') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$blog->id}}">


                            <div class="col-12">
                                <label class="form-label">Category id</label>
                                <input type="text" name="category_id" value="{{$blog->category_id }}" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Author id</label>
                                <input type="text" name="author_id" value="{{$blog->author_id }}" class="form-control">
                            </div>


                            <div class="col-12">
                                <label class="form-label">Blog Title</label>
                                <input type="text" name="blog_title" value="{{$blog->blog_title }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{$blog->slug }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <input type="text" name="description" value="{{$blog ->description }}" class="form-control" >
                                <label for="inputPassword">description</label>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" value="{{$blog->date }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset ($blog->image)}}" class="img-fluid" style="width:80px;height:50px;border-radius:50%;" alt="">
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

