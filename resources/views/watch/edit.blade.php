@extends('layouts.master')
@section('content')

<div>
    <a href="{{route('watch.index')}}" class="btn btn-sm btn-dark mt-3">Back</a>
    <form class="mt-5" action="{{route('watch.update', $watch->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Choose Category</label>
            <select name="category_id" class=" form-select">
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if ($category->id == $watch->category_id)
                    selected
                    @endif>
                    {{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Name</label>
            <input type="text" name="name" class=" form-control" value="{{$watch->name}}">
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Price </label>
            <input type="number" name="price" class=" form-control" value="{{$watch->price}}">
        </div>
        <div class="form-group mt-2">
            <label for="name">Choose Image </label>
            <input type="file" name="image" class=" form-control">
            <img src="{{asset('/images/'.$watch->image)}}" alt="product image" class=" img-thumbnail mt-2"
                width="150px">
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Material</label>
            <input type="text" name="material" class=" form-control" value="{{$watch->material}}">
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Description </label>
            <textarea name="description" class="form-control">{{$watch->description}}</textarea>
        </div>
        <input type="submit" class="btn btn-secondary mt-2" value="Update">
    </form>
</div>


@endsection