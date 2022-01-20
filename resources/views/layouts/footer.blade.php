<script src="{{url('/')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/') }}/jQuery/jquery-3.6.0.min.js"></script>

<script src="{{url('/')}}/toastr/build/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "9000",
        "extendedTimeOut": "5000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "toastClass": 'toastr'
    };

    function json2array(json) {
        if (typeof json == 'string') {
            return (json);
        }

        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function(key) {
            if (json != null && typeof json == 'object') {
                result.push(json2array(json[key]));
            } else
                result.push(json[key]);
        });
        return result;
    }

    function showErrors(data) {
        if (Array.isArray(data)) {
            data.forEach(element => {
                showErrors(element)
            });
        } else {
            toastr.error(data);
        }
    }


    function showSuccess(data) {
        if (Array.isArray(data)) {
            data.forEach(element => {
                showSuccess(element)
            });
        } else if (data != '') {
            toastr.success(data);
        }
    }
</script>

@include('layouts.message')
@stack('footer')