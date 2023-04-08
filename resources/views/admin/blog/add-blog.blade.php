@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Blog Form</h6>
                        {{ session('message') }}
                        <hr/>
                        <form action="{{ route('new.blog') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Category Name</label>

                                <select name="category_id" class="form-control">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Author Name</label>

                                <select name="author_id" class="form-control">
                                    <option value="">Select a author</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Blog Title</label>
                                <input type="text" name="blog_title" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
