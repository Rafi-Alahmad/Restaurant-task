@extends('index')

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form role="form" method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title">{{trans('app.settings')}}</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="restaurant_name">{{trans('app.restaurant_name')}}</label>
                            <input name="name" value="{{ old('restaurant_name')? old('restaurant_name') : Auth::guard()->user()->name }}" type="text" class="form-control" id="restaurant_name" placeholder="Enter Application name">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="motto">{{trans('app.restaurant_motto')}}</label>
                            <textarea name="motto" id="motto" rows="2" class="form-control">{{ old('motto')? old('motto') : Auth::guard()->user()->motto }}</textarea>
                            <!-- <input name="motto" value="" type="text" class="form-control" id="motto" placeholder="We are not the only ones but we are the best"> -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row mt-4 ">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="logo">{{trans('app.logo')}}</label>
                            <div class="input-group-">
                                <div class="custom-file">
                                    <input name="logo" type="file" accept="image/*" class="form-control" id="logo">
                                </div>
                            </div>
                            <p class="help-block">{{trans('app.logo_caption')}}</p>
                        </div>
                        <div class="form-group d-flex justify-content-center ">
                            <img class="img img-responsive" style="max-width: 200px;" id="img-logo" src="{{ isset(Auth::guard()->user()->logo) ? Storage::url(Auth::guard()->user()->logo) :'' }}" src="" alt="Logo">
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">{{ trans('app.save')}}</button>
                <button class="btn" type="reset">{{ trans('app.reset')}}</button>
            </div>
        </div>
        <!-- /.card -->
    </form>
    <!-- /form -->

</div>
@endsection

@push('footer')

<script>
    document.getElementById('logo').onchange = function() {
        document.getElementById('img-logo').src = window.URL.createObjectURL(this.files[0]);
    };
</script>
@endpush