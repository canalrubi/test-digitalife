@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
        <div class="col-12">
          @include('shared.alerts.alerts')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="text-center text-uppercase mt-4 mb-5">{{trans('lang.product_list')}} 
            <a href={{url("products/new")}} class="pe-auto">{{trans('lang.add')}}</a>
            </h3>
        <div class="bg-white px-5 py-3">
            <div class="col-12 d-flex mb-3 mt-4">
                <div class="col fw-bold text-uppercase">#</div>
                <div class="col fw-bold text-uppercase">{{trans('lang.product_name')}}</div>
                <div class="col fw-bold text-uppercase">{{trans('lang.price')}}</div>
                <div class="col fw-bold text-uppercase">{{trans('lang.amount')}}</div>
                <div class="col fw-bold text-uppercase"></div>
            </div>
            @foreach ($products as $item)
                <div class="col-12 d-flex table bg-white">
                    <div class="col">{{$item->id}}</div>
                    <div class="col">{{$item->name}}</div>
                    <div class="col">$ {{number_format($item->price, 2)}}</div>
                    <div class="col">{{$item->qty}}</div>
                    <div class="col d-flex justify-content-between">
                        <a href="{{url("products/".$item->id)}}">Ver / Editar</a>
                    </div>
                </div>

            @endforeach
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight"> {!! $products->links() !!}</div>
            </div>
        </div>
    </div>
 </div>

@endsection