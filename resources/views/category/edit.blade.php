@extends('layouts.master')
@section('content')

<div>
    <a href="{{route('category.index')}}" class="btn btn-sm btn-dark mt-3">Back</a>
    <form class="mt-5" action="{{route('category.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Enter Category</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <input type="submit" class="btn btn-secondary mt-2" value="Update">
    </form>
</div>


@endsection