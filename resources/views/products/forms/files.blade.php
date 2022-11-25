    <table class="table table-bordered" id="dynamicAddRemove">
        <tr>
            <th>{{trans('lang.image_url')}}</th>
            <th>{{trans('lang.action')}}</th>
        </tr>
        <tr>
            <td><input type="text" name="addMoreFile[0][urlFile]" class="form-control" />
            </td>
            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
        </tr>
    </table>


@if(isset($product))

<div class="row d-flex">
    @foreach ($product->images as $image)
       <div class="col-4">
           <img src="{{$image->original_url}}" 
          alt="{{trans('lang.image')}}"
          width="200" height="150">
          <a data-bs-toggle="modal" data-bs-target="#modalConfirm{{$image->id}}" href="#" class="pe-auto fw-bold">{{trans('lang.delete')}}</a>
   </div>               
@endforeach
</div>
@foreach ($product->images as $image)
<?php $data = [
    'title'   => trans('lang.delete_image'),
    'content' => trans('lang.confirm_deletion_img'),
    'id'      => $image->id,
    'file'    => $image->original_url,
    'type'    => 'img',
    'path'    => 'files.destroy'
     ]  
    ?>
@include('shared.confirmation-modal.confirm-delete',[$data])
@endforeach
@endif

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreFile[' + i +
            '][urlFile]" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
