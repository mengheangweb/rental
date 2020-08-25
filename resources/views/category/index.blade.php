@extends('layouts.app')
@section('content')
    <h3 class="float-left">{{__('unit.title')}}</h3>
    <a href="/unit/create" class="btn btn-danger float-right">{{__('general.add_new')}}</a>
    <div class="clearfix"></div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>{{__('unit.name')}}</th>
                <th>{{__('unit.size')}}</th>
                <th>{{__('unit.price')}}</th>
                <th>Category</th>
                <th>Equipment</th>
                <th>No.Renting</th>
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
                    <td>{{ $unit->rent->count() }}</td>
                    <td>
                        <a href="/unit/edit/{{ $unit->id }}" class="btn float-left mr-3 btn-info">{{__('general.edit')}}</a>
                        <form class="float-left" method="post" action="/unit/delete/{{ $unit->id }}">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure?') " class="btn btn-danger" type="submit">{{__('general.delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="float-right">
        {{ $units->links() }}
    </div>

    <h5>Deleted Record</h5>
    <ul>
        @foreach($units_deleted as $deleted)
        <li>{{ $deleted->name }} <a href="/unit/restores/{{ $deleted->id }}">Restore</a></li>
        @endforeach
    </ul>
@endsection

<script>
    // Echo.channel('unit')
    // .listen('UnitCreated', (e) => {
    //     alert('it works');
    //     console.log(e.order.name);
    // });
</script>

