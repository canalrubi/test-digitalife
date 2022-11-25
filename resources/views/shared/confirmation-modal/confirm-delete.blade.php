
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
                @if(isset($data['type']))
                <div class="row d-flex justify-content-center">
                  <img src={{$data['file']}} alt="{{trans('lang.image')}}" width="200" height="300">
                </div>
                @else 
                <h3>{{$data['info']}}</h3> 
                @endif
            </div>
            <div class="modal-footer d-flex float-end mb-3 mt-3">
              <button type="submit" class="btn btn-primary">{{trans('lang.delete')}}</button>
            </div>
          </div>
        </div>
      </div>
  {!!Form::close()!!}

