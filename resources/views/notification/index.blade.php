@extends('layouts.app')
@section('content')
    <h3 class="float-left">Notifications</h3>
    <a href="/notify/create" class="btn btn-danger float-right">Add New</a>
    <div class="clearfix"></div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>#</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($notifications as $notify)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>
                        @if($notify->type == 'App\Notifications\Receipt')
                            You have a new renting # {{ $notify->data['receipt_id'] }} - ${{ $notify->data['amount'] }}
                        @endif
                    </td>
                    <td>
                        <a href="/notify/read/{{ $notify->id }}" class="btn float-left mr-3 btn-info">Read</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- <div class="float-right">
        {{ $notifys->links() }}
    </div> --}}
    
@endsection

