@extends('index')

@section('content')
<div class="container-fluid">
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h5 class="card-title my-auto">{{ trans("app.services") }}</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_service">
                            {{trans('app.new_service')}}
                        </button>
                        <!-- <a href="{ route('admin.levels.create') }}" class="btn btn-outline-primary waves-effect">{{ trans("general.create_level") }}</a> -->
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table([
                    "class" => "responsive table",
                    "style" => ""
                        ])
                    }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Button trigger modal -->


<!-- Create service Modal -->
<div class="modal fade" id="add_service" tabindex="-1" aria-labelledby="add_serviceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_serviceLabel">Add Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="addNewService(this); return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{trans('app.title')}}</label>
                                <input required type="text" name="title" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subtitle" class="form-label">{{trans('app.subtitle')}}</label>
                                <input required type="text" name="subtitle" class="form-control" id="subtitle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">{{trans('app.price')}}</label>
                                        <input required type="number" name="price" step="0.01" class="form-control" id="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" name="type" required id="type" aria-label="Default select example">
                                        <option value="" selected>{{trans('app.select_type')}}</option>
                                        <option value="drink">{{trans('app.drink')}}</option>
                                        <option value="meal">{{trans('app.meal')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">{{trans('app.description')}}</label>
                                <textarea rows="3" name="description" class="form-control" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="image" class="form-label">{{trans('app.image')}}</label>
                                <input class="form-control" name="image" type="file" accept="image/*" id="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dismissModalButton" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('app.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('app.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button type="button" style="display: none;" id="update_service_btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_service">
</button>
<!-- Update service Modal -->
<div class="modal fade" id="update_service" tabindex="-1" aria-labelledby="update_serviceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_serviceLabel">Update Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="updateService(this); return false;">
                <input type="hidden" name="id" id="update-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="update-title" class="form-label">{{trans('app.title')}}</label>
                                <input type="text" required name="title" class="form-control" id="update-title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="update-subtitle" class="form-label">{{trans('app.subtitle')}}</label>
                                <input type="text" required name="subtitle" class="form-control" id="update-subtitle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="update-price" class="form-label">{{trans('app.price')}}</label>
                                        <input type="number" required name="price" step="0.01" class="form-control" id="update-price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" required name="type" id="update-type" aria-label="Default select example">
                                        <option value="" selected>{{trans('app.select_type')}}</option>
                                        <option value="drink">{{trans('app.drink')}}</option>
                                        <option value="meal">{{trans('app.meal')}}</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="update-description" class="form-label">{{trans('app.description')}}</label>
                                <textarea rows="3" name="description" class="form-control" id="update-description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="update-image" class="form-label">{{trans('app.image')}}</label>
                                <input class="form-control" name="image" type="file" accept="image/*" id="update-image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group d-flex justify-content-center ">
                                <img class="img img-responsive" style="max-width: 200px;" id="update-service-image" src="" alt="service picture">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dismissUpdateModalButton" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('app.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('app.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('footer')

<script src="{{ url('/') }}/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ url('/') }}/DataTables/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/DataTables/Responsive-2.2.9/js/responsive.bootstrap5.js"></script>
<!-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> -->

{!! $dataTable->scripts() !!}


<script>

    function addNewService(formElement) {

        formData = $(formElement).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        var form = new FormData();
        form.append("title", formData.title);
        form.append("subtitle", formData.subtitle);
        form.append("price", formData.price);
        form.append("type", formData.type);
        form.append("description", formData.description);
        if ($("#image")[0].files[0]) {
            form.append("image", $("#image")[0].files[0]);
        }

        var jqxhr = $.ajax({
                url: "{{ route('services.create') }}",
                method: "POST",
                timeout: 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    "Accept": "Accept:application/json",
                },
                data: form
            })
            .done(function(response) {
                $('#dismissModalButton').click();
                $("#services-table").DataTable().ajax.reload();
                toastr.success(JSON.parse(response).msg);
            })
            .fail(function(response) {
                showErrors(json2array(JSON.parse(response.responseText)));
            });


    }

    function updateService(formElement) {

        formData = $(formElement).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        var form = new FormData();
        form.append("id", formData.id);
        form.append("title", formData.title);
        form.append("subtitle", formData.subtitle);
        form.append("price", formData.price);
        form.append("type", formData.type);
        form.append("description", formData.description);
        if ($("#update-image")[0].files[0]) {
            form.append("image", $("#update-image")[0].files[0]);
        }

        var jqxhr = $.ajax({
                url: "{{ route('services.update') }}",
                method: "POST",
                timeout: 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    "Accept": "Accept:application/json",
                },
                data: form
            })
            .done(function(response) {
                $('#dismissModalButton').click();
                $("#services-table").DataTable().ajax.reload();
                toastr.success(JSON.parse(response).msg);
            })
            .fail(function(response) {
                showErrors(json2array(JSON.parse(response.responseText)));
            });


    }
    
    function deleteService(id) {
        var jqxhr = $.ajax({
                url: "{{ route('services.delete') }}",
                method: "POST",
                timeout: 0,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    "Accept": "Accept:application/json",
                },
                data: {
                    id: id
                }
            })
            .done(function(response) {
                $('#dismissModalButton').click();
                $("#services-table").DataTable().ajax.reload();
                console.log(response);
                toastr.success((response).msg);
            })
            .fail(function(response) {
                showErrors(json2array((response.responseText)));
            });
    }

    function showUpdateServiceModal(id, title, subtitle, description, price, type, image) {
        $("#update-id").val(id);
        $("#update-title").val(title);
        $("#update-subtitle").val(subtitle);
        $("#update-price").val(price);
        $("#update-description").val(description);
        $("#update-type").val(type);
        $("#update-service-image").attr("src", image);
        $("#update_service_btn").click();
    }

    // show selected image in update form
    document.getElementById('update-image').onchange = function() {
        document.getElementById('update-service-image').src = window.URL.createObjectURL(this.files[0]);
    };
</script>
@endpush



@push('header')
<!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> -->
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/DataTables/Responsive-2.2.9/css/responsive.bootstrap5.min.css">
@endpush