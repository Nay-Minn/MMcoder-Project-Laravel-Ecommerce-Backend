@extends('layouts.master')
@section('content')

<div>
    <a href="{{route('category.index')}}" class="btn btn-sm btn-dark mt-3">Back</a>
    <form class="mt-5" action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Enter Category</label>
            <input type="text" class="form-control" name="name">
        </div>
        <input type="submit" class="btn btn-secondary mt-2" value="Create">
    </form>
</div>


@endsection