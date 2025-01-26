@if(session()->has('alert-message'))
    <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
{{--        <h5><i class="icon fa fa-info"></i> Alert!</h5>--}}
        <p>{{ session()->get('alert-message') }}</p>
    </div>
@endif
