@extends('layouts.master')
@section('content')

<div>
    <a href="{{route('watch.create')}}" class="btn btn-sm btn-success mt-3">+ Create</a>
    <table class=" table table-striped mt-5">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Material</th>
                <th>Description</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($watches as $watch)

            <tr>
                <td>
                    <img src="{{asset('images/'.$watch->image)}}" alt="product image" class=" img-thumbnail"
                        width="100px">

                </td>
                <td>
                    {{$watch->name}}
                </td>
                <td>
                    {{$watch->price}}
                </td>
                <td>
                    {{$watch->material}}
                </td>
                <td>
                    {{$watch->description}}
                </td>
                <td>
                    <a href="{{route('watch.edit', $watch->id)}}" class="btn btn-sm btn-info ">Edit</a>
                    <form action="{{route('watch.destroy', $watch->id)}}" class=" d-inline" method="POST"
                        onsubmit="return confirm('sure dude?')">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Delete" class="btn btn-sm btn-danger ">

                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{$watches->links()}}

</div>


@endsection