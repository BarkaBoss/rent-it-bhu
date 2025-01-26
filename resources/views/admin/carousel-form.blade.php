@extends('admin.lte.master')

@section('main-content')
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Carousel</h3></div>
        {{--        <div class="col-sm-6">--}}
        {{--            <ol class="breadcrumb float-sm-end">--}}
        {{--                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>--}}
        {{--            </ol>--}}
        {{--        </div>--}}
    </div>
    <div class="row">
        @include('admin.lte.alert')
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Create carousel</div>
                </div>
                <form method="post" action="{{ route('admin.storeCarousel') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 form-group @error('title') has-error @enderror">
                            <label class="form-label" for="title">Title</label>
                            <input id="title" name="title" value="{{$profile->title ?? ''}}" class="form-control">
                            @error('title')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group @error('description') has-error @enderror">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" name="description" class="form-control"> {{$profile->description ?? ''}} </textarea>
                            @error('description')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group @error('image') has-error @enderror">
                            <label class="form-label" for="image">Image 1000 x 430</label>
                            <input id="image" name="image" type="file" class="form-control">
                            @error('image')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary pull-right">
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
