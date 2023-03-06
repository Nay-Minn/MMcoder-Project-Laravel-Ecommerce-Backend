@extends('layouts.master')
@section('content')

<div>
    <a href="{{route('category.create')}}" class="btn btn-sm btn-success mt-3">+ Create</a>
    <table class=" table table-striped mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)

            <tr>
                <td>
                    {{$category->name}}
                </td>
                <td>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{route('category.destroy', $category->id)}}" class=" d-inline" method="POST"
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

    {{$categories->links()}}

</div>


@endsection