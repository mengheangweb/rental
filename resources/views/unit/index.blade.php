@extends('layouts.app')
@section('content')
    <h3 class="float-left">Unit</h3>
    <a href="/unit/create" class="btn btn-danger float-right">Add New</a>
    <div class="clearfix"></div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Category</th>
                <th>Equipment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($units as $unit)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $unit->name }}</td>
                    <td>{{ $unit->size }}</td>
                    <td>$ {{ $unit->price }}</td>
                    <td> {{ $unit->category ? $unit->category->name : '' }}</td>
                    <td>
                        <ul>
                            @foreach ($unit->equipments as $equipment)
                                <li>{{ $equipment->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="/unit/edit/{{ $unit->id }}" class="btn float-left mr-3 btn-info">Edit</a>
                        <form class="float-left" method="post" action="/unit/delete/{{ $unit->id }}">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure?') " class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="float-right">
        {{ $units->links() }}
    </div>
@endsection

