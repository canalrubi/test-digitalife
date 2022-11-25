@extends('layouts.app')
 @section('content')

 @if(isset($product))
 
 {{ Form::model($product, ['url' => ['products', $product->id], 'method' => 'put']) }}
 @else
   {{ Form::open(['url' => 'products']) }}
 @endif
 <div class="container mt-4">

  <div class="row d-flex justify-content-center">
      @include('products.forms.product')
  </div>

<div class="container mt-4">

<div class="row d-flex justify-content-center">
  <div class="col-7">
    <h5 class="fw-bold text-center">{{trans('lang.optionally_add_images')}}</h5>
  </div>
  <div class="col-6">
    @include('products.forms.files')
  </div>
</div>
</div>

<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-6">
    <div class="d-flex justify-content-between mb-3">
      @if(!isset($product))
      <button type="reset" class="btn btn-secondary">{{trans('lang.clean')}}</button>
      @endif
      <button type="submit" class="btn btn-primary">{{(isset($product)) ? trans('lang.update_information') : trans('lang.save')}}</button>
    </div>
  </div>
  </div>
</div>
{!!Form::close()!!}

@endsection