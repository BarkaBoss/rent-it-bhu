@extends('admin.lte.master')

@section('main-content')
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Item</h3></div>
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
                    <div class="card-title">Add item</div>
                </div>
                <form method="post" action="{{ route('admin.storeItem') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 form-group @error('name') has-error @enderror">
                            <label class="form-label" for="name">Item Name</label>
                            <input id="name" name="name" class="form-control">
                            @error('name')
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
                        <div class="mb-3 form-group @error('price') has-error @enderror">
                            <label class="form-label" for="price">Price</label>
                            <input id="price" type="number" name="price" class="form-control">
                            @error('price')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group @error('quantity') has-error @enderror">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input id="quantity" type="number" name="quantity" class="form-control">
                            @error('quantity')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group @error('availability') has-error @enderror">
                            <label class="form-label" for="availability">Availability</label>
                            <input id="availability" name="availability" class="form-control">
                            @error('availability')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group @error('images') has-error @enderror">
                            <label class="form-label" for="images">Image 1000 x 430</label>
                            <input id="images" name="images[]" type="file" multiple class="form-control">
                            @error('images')
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
                    <div class="card-title">Items</div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img width="100" src="{{ asset($item->images->first()?->url) ?? 'None'}}" alt="{{ $item->name }}"></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Edit</a>
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
@endsection
