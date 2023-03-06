@extends('layouts.master')
@section('content')

<div>
    <a href="{{route('watch.index')}}" class="btn btn-sm btn-dark mt-3">Back</a>
    <form class="mt-5" action="{{route('watch.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Choose Category</label>
            <select name="category_id" class=" form-select">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Name</label>
            <input type="text" name="name" class=" form-control">
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Price </label>
            <input type="number" name="price" class=" form-control">
        </div>
        <div class="form-group mt-2">
            <label for="name">Choose Image </label>
            <input type="file" name="image" class=" form-control">
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Material</label>
            <input type="text" name="material" class=" form-control">
        </div>
        <div class="form-group mt-2">
            <label for="name">Enter Description </label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-secondary mt-2" value="Create">
    </form>
</div>


@endsection