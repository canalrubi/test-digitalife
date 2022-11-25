
        @if(isset($product))
        {{ Form::model($product, ['url' => ['products', $product->id], 'method' => 'put']) }}
        @else
          {{ Form::open(['url' => 'products']) }}
        @endif
      <div class="container">
        <div class="row">
          <div class="col-12">
            @include('shared.alerts.errors')
          </div>
        </div>
        <div class="row d-flex justify-content-center mt-4">
          <div class="col-6 d-flex justify-content-between">
            <h5 class="fw-bold" id="exampleModalLabel">
              {{(isset($product)) ? trans('lang.edit_product')." # ".$product->id : trans('lang.add_product') }}
              @if(isset($product))
              <div class="small fw-normal mt-1">
                {{ trans('lang.registered_on')." ".date('d-M-y', strtotime($product->created_at)) }}
              </div>
              <div>
              <a data-bs-toggle="modal" data-bs-target="#modalConfirm{{$product->id}}" href="#" class="pe-auto">{{trans('lang.delete')}}</a>
              </div>
              @endif
            </h5>
            <h5>
              <a href="{{url('products')}}" class="text-dark">{{trans('lang.return_to_the_list')}}</a>
            </h5>
          </div>
        </div>

        <div class="row d-flex justify-content-center mt-4">
          <div class="col-6 border p-3">
            <div class="row mb-4">
              <div class="col-12">
                <label for="product-name" class="form-label">{{trans('lang.product_name')}}</label>
                {!!Form::text('name',null,['class'=>'form-control','id'=>'product-name', 'autofocus' => true])!!}
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-6">
                <label for="price" class="form-label">{{trans('lang.price')}}</label>
                 {!!Form::text('price',null,['class'=>'form-control','id'=>'price'])!!}
              </div>
              <div class="col-6">
                <label for="quantity" class="form-label">{{trans('lang.amount')}}</label>
                {!!Form::number('qty',null,['class'=>'form-control','id'=>'price'])!!}
              </div>
            </div>
           
          </div>
        </div>
          
      </div>


{!!Form::close()!!}
@if(isset($product))               
  <?php $data = [
    'title'   => trans('lang.delete_product'),
    'content' => trans('lang.confirm_deletion'),
    'id'      => $product->id,
    'info'    => $product->name,
    'path'    => 'products.destroy'
]  
?>
@include('shared.confirmation-modal.confirm-delete',[$data])
@endif
