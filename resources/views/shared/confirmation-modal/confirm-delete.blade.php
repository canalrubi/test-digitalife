
   {!!Form::open(['route'=>[$data['path'],$data['id']], 'method'=>'DELETE']) !!}
    <div class="modal fade" id="modalConfirm{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="exampleModalLabel">{{$data['title']}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="text-uppercase fw-bold">{{$data['content']}}</h6>   
                <h3>{{$data['info']}}</h3> 
            </div>
            <div class="modal-footer d-flex float-end mb-3 mt-3">
              <button type="submit" class="btn btn-primary">{{trans('lang.delete')}}</button>
            </div>
          </div>
        </div>
      </div>
  {!!Form::close()!!}

