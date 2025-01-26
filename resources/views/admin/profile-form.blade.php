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
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Update about</div>
                </div>
                <form method="post" action="{{ route('admin.storeItem') }}" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="mb-3 form-group @error('name') has-error @enderror">
                        <label for="name">Name</label>
                        <input id="name" name="name" value="{{$profile->name ?? ''}}" class="form-control">
                        @error('name')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('phone') has-error @enderror">
                        <label for="phone">Phone Number</label>
                        <input id="phone" name="phone" value="{{$profile->phone ?? ''}}" class="form-control">
                        @error('phone')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('email') has-error @enderror">
                        <label for="email">Email</label>
                        <input id="email" name="email" value="{{$profile->email ?? ''}}" class="form-control">
                        @error('email')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('instagram_url') has-error @enderror">
                        <label for="instagram_url">Instagram</label>
                        <input id="instagram_url" name="instagram_url" value="{{$profile->instagram_url ?? ''}}" class="form-control">
                        @error('instagram_url')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('facebook_url') has-error @enderror">
                        <label for="facebook_url">Facebook</label>
                        <input id="facebook_url" name="facebook_url" value="{{$profile->facebook_url ?? ''}}" class="form-control">
                        @error('facebook_url')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('twitter_url') has-error @enderror">
                        <label for="twitter_url">X</label>
                        <input id="twitter_url" name="twitter_url" value="{{$profile->twitter_url ?? ''}}" class="form-control">
                        @error('twitter_url')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('tiktok_url') has-error @enderror">
                        <label for="tiktok_url">TikTok</label>
                        <input id="tiktok_url" name="tiktok_url" value="{{$profile->tiktok_url ?? ''}}" class="form-control">
                        @error('tiktok_url')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('youtube_url') has-error @enderror">
                        <label for="youtube_url">Youtube</label>
                        <input id="youtube_url" name="youtube_url" value="{{$profile->youtube_url ?? ''}}" class="form-control">
                        @error('youtube_url')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('about') has-error @enderror">
                        <label for="about">About</label>
                        <textarea id="about" name="about" class="form-control"> {{$profile->about ?? ''}} </textarea>
                        @error('about')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('address') has-error @enderror">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control"> {{$profile->address ?? ''}} </textarea>
                        @error('address')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-group @error('logo') has-error @enderror">
                        <label for="logo">Image</label>
                        <input id="logo" name="logo" type="file" class="form-control">
                        @error('logo')
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
