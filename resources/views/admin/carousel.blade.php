@extends('admin.lte.master')

@section('main-content')
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Profile</h3></div>
        {{--        <div class="col-sm-6">--}}
        {{--            <ol class="breadcrumb float-sm-end">--}}
        {{--                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>--}}
        {{--            </ol>--}}
        {{--        </div>--}}
    </div>
    <div class="row">
        @include('admin.lte.alert')

        <div class="col-md-8 col-md-offset-2">
            <div class="box box-solid">
                <form method="post" action="{{ route('admin.storeItem') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title">Name</label>
                            <input id="title" name="title" value="{{$profile->title ?? ''}}" class="form-control">
                            @error('title')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('description') has-error @enderror">
                            <label for="description">Address</label>
                            <textarea id="description" name="description" class="form-control"> {{$profile->description ?? ''}} </textarea>
                            @error('description')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('image') has-error @enderror">
                            <label for="image">Image 1000 x 430</label>
                            <input id="image" name="image" type="file" class="form-control">
                            @error('image')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">
                            <span class="fa fa-save"></span>
                            Save
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
