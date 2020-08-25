@extends('layouts.app')
@section('content')
            <h3 class="float-left">Category</h3>

            <a href="/category" class="btn btn-danger float-right">Cancel</a>
            <div class="clearfix"></div>

            @if($errors->any())
              <div class="alert alert-danger" role="alert">
                Please fix error(s) below.
              </div>
            @endif


            <form action="/category/store" method="post">
                @csrf

              <div class="form-group ">
                <label for="name">Name</label>
                <input value="{{ old('name') }}" type="text" name="name" class="form-control @if($errors->has('name')) is-invalid  @endif " id="name" placeholder="Enter Name">
                @if($errors->has('name'))
                  <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection