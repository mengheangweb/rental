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


            <form action="/unit/store" method="post">
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

              <div class="form-group">
                <label for="size">Size</label>
                <input value="{{ old('size') }}" type="text" name="size" class="form-control @if($errors->has('size')) is-invalid  @endif " id="size" placeholder="Enter Size">
                @if($errors->has('size'))
                  <div class="invalid-feedback">
                    {{ $errors->first('size') }}
                  </div>
                @endif
              </div>

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
                <label for="size">Category</label>
                <select name="category" class="form-control @if($errors->has('category')) is-invalid  @endif">
                  <option value="">----</option>
                  @foreach($categories as $category)
                    <option @if(old('category') == $category->id ) selected  @endif value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @if($errors->has('category'))
                  <div class="invalid-feedback">
                    {{ $errors->first('category') }}
                  </div>
                @endif
              </div>

              <div class="form-group">
                <label for="size">Equipment</label>
                <select multiple name="equipment[]" class="form-control @if($errors->has('equipment')) is-invalid  @endif">
                  @foreach($equipments as $equipment)
                    <option @if(old('equipment') == $equipment->id ) selected  @endif value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                  @endforeach
                </select>
                @if($errors->has('equipment'))
                  <div class="invalid-feedback">
                    {{ $errors->first('equipment') }}
                  </div>
                @endif
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection