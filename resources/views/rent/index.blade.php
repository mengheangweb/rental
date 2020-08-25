@extends('layouts.app')
@section('content')
    <h3 class="float-left">Rents</h3>
    <a href="/rent/create" class="btn btn-danger float-right">Add New</a>
    <div class="clearfix"></div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Unit</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($rents as $rent)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $rent->user->name }}</td>
                    <td>{{ $rent->unit->name_with_size }}</td>
                    <td>{{ $rent->unit->category? $rent->unit->category->name : "--" }}</td>
                    <td>{{ $rent->priceInUSD }}</td>
                    <td>
                        <a href="/rent/edit/{{ $rent->id }}" class="btn float-left mr-3 btn-info">Edit</a>
                        <form class="float-left" method="post" action="/rent/delete/{{ $rent->id }}">
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
        {{ $rents->links() }}
    </div>
    
@endsection

