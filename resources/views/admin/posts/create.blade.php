@extends('layouts.admin')
@section('content')
    <h1>Create Post</h1>
    <form method="post" enctype="multipart/form-data" action="{{ url("admin/posts") }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photo_id">Photo:</label>
            <input type="file" class="form-control" accept="image/*" name="photo_id" id="photo_id">
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" id="body" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @include('includes.errors')
@endsection