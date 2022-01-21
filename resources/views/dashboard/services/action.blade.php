<div class="demo-inline-spacing justify-content-around ">

    <button type="button" class="btn btn-sm btn-info action-row" onclick="showUpdateServiceModal('{{$id}}','{{$title}}','{{$subtitle}}','{{$description}}','{{$price}}','{{$type}}','{{Storage::url($image)}}')" title="{{trans('app.edit')}}" style="margin: 0px; color: #fff;" id="edit_{{ $id }}">
        <i class="far fa-edit "></i>
    </button>    

    <button type="button" onclick="confirm(`{{trans('app.delete_record_confirmation')}}`) ? deleteService('{{$id}}') : false;" class="btn btn-sm btn-danger action-row" title="{{trans('app.delete')}}" style="margin: 0px;" id="close_{{ $id }}">
        <i class="far fa-trash-alt "></i>
    </button>

</div>
<form division="form" id="delete-service-{{ $id }}" action="{{ route('services.delete') }}" method="POST">
    @csrf
    <input type="hidden" name="service_id" value="{{ $id }}">
</form>