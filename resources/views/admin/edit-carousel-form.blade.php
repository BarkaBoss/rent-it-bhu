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
                    <div class="card-title">Edit carousel</div>
                </div>
                <form method="post" action="{{ route('admin.postEditCarousel') }}" enctype="multipart/form-data">
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
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Carousels</div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td><strong> # </strong></td>
                                <td><strong> Title </strong></td>
                                <td><strong> Carousel images </strong></td>
                                <td><strong> Actions </strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carousels as $carousel)
                                <tr>
                                    <td>{{ $carousel->id }}</td>
                                    <td>{{ $carousel->title }}</td>
                                    <td><img width="100" src="{{ asset('carousel/'.$carousel->image) }}" alt="{{ $carousel->title }}"></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button" class="dropdown-item btn btn-primary" data-title="{{ $carousel->title }}" data-description="{{ $carousel->description }}" data-myId="{{ $profile->id }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit carousel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    {{--                    {{ method_field('patch') }}--}}
                    <div class="modal-body">
                        <div class="mb-3 form-group @error('title') has-error @enderror">
                            <label class="form-label" for="title">Title</label>
                            <input id="title" name="title" class="form-control">
                            @error('title')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group @error('description') has-error @enderror">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" name="description" class="form-control"> </textarea>
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
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
