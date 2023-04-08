@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded table-responsive">
                        <h6 class="mb-0 text-uppercase">Blog Table</h6>
                        <hr/>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Blog Tile</th>
                                <th>slug</th>
                                <th>Category name</th>
                                <th>author name</th>
                                <th>description</th>
                                <th>image</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $i++ }}</td>

                                    <td>{{ $blog->blog_title }}</td>
                                    <td>{{ $blog->slug }}</td>
                                    <td>{{ $blog->category->category_name }}</td>
                                    <td>{{ $blog->author->author_name }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td>
                                        <img src="{{ asset($blog->image) }}" style="width:80px;height:80px" alt="">
                                    </td>
                                    <td class="btn-group">
                                        <a href="{{ route('edit.blog',['id'=>$blog['id']]) }}" class="btn btn-success btn-sm mx-1">Edit</a>
                                        <form action="{{ route('delete.blog',['id'=>$blog['id']]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $blog->id }} }}">
                                            <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure Delete this !!')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


