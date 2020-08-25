@extends('layouts.app')
@section('content')
            <h3 class="float-left">Unit</h3>

            <a href="/unit" class="btn btn-danger float-right">Cancel</a>
            <div class="clearfix"></div>

            @if($errors->any())
              <div class="alert alert-danger" role="alert">
                Please fix error(s) below.
              </div>
            @endif


            <form action="/rent/store" method="post">
                @csrf

              <div class="form-group">
                <label for="size">Price</label>
                <input value="{{ old('price') }}" type="text" name="price" class="form-control @if($errors->has('price')) is-invalid  @endif" id="price" placeholder="Enter Price">
                @if($errors->has('price'))
                  <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                  </div>
                @endif
              </div>

              <div class="form-group">
                <label for="size">Unit</label>
                <select name="unit" class="form-control @if($errors->has('unit')) is-invalid  @endif">
                  <option value="">----</option>
                  @foreach($units as $unit)
                  <option @if(old('unit') == $unit->id ) selected  @endif value="{{ $unit->id }}">{{ $unit->name_with_size }} - ${{ $unit->price }}</option>
                  @endforeach
                </select>
                @if($errors->has('unit'))
                  <div class="invalid-feedback">
                    {{ $errors->first('unit') }}
                  </div>
                @endif
              </div>
              <div class="form-group">
                <label for="size">User</label>
                <select name="user" class="form-control @if($errors->has('user')) is-invalid  @endif">
                  <option value="">----</option>
                  @foreach($users as $user)
                  <option @if(old('user') == $user->id ) selected  @endif value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
                @if($errors->has('user'))
                  <div class="invalid-feedback">
                    {{ $errors->first('user') }}
                  </div>
                @endif
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection