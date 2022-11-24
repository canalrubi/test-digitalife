
@if(Session::has(trans('lang.delete_message')))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> {{Session::get(trans('lang.delete_message'))}}</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


@if(Session::has(trans('lang.add_message')))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{Session::get(trans('lang.add_message'))}}</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

