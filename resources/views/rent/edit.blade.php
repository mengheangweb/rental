@extends('layouts.app')
@section('content')
      <h3 class="float-left">Unit/
      <small>Edit</small></h3>

      <a href="/" class="btn btn-danger float-right">Cancel</a>
      <div class="clearfix"></div>

      @if($errors->any())
        <div class="alert alert-danger" role="alert">
          Please fix error(s) below.
        </div>
      @endif


      <form action="/unit/update/{{ $unit->id }}" method="post">
          @csrf
          @method('patch')
        <div class="form-group ">
          <label for="name">Name</label>
          <input value="{{ old('name', $unit->name) }}" type="text" name="name" class="form-control @if($errors->has('name')) is-invalid  @endif " id="name" placeholder="Enter Name">
          @if($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="size">Size</label>
          <input value="{{ old('size', $unit->size) }}" type="text" name="size" class="form-control @if($errors->has('size')) is-invalid  @endif "" id="size" placeholder="Enter Size">
          @if($errors->has('size'))
            <div class="invalid-feedback">
              {{ $errors->first('size') }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="size">Price</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend3">$</span>
            </div>
            <input value="{{ old('price', $unit->price) }}" type="text" name="price" class="form-control @if($errors->has('price')) is-invalid  @endif" id="price" placeholder="Enter Price">
            @if($errors->has('price'))
              <div class="invalid-feedback">
                {{ $errors->first('price') }}
              </div>
            @endif
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection