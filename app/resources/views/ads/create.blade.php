@extends('layouts.app')

@section('content')
    <div class="text-center align-middle col-md-12">
        <div class="m-auto col-12 col-md-8 text-bg-darkness bg-darkness py-5 px-4">
            <h2 class="pb-3">Creating an ad in a category {{ $category->name }}</h2>
            <form method="POST" action="{{ route('store_ad') }}"  enctype="multipart/form-data" id="upload-form">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="form-group col-md-12 pb-3">
                    <label class="pb-1 fs-18" for="title">Title *</label>
                    <input name="title" id="title" type="text" class="form-control" placeholder="Enter title" required>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @foreach($properties as $property)
                    <div class="form-group col-md-12 pb-3">
                        <label class="pb-1 fs-18" for="{{$property->id}}">{{$property->name}}</label>
                        <input name="{{$property->id}}" id="{{$property->id}}" type="text" class="form-control" placeholder="Enter {{$property->name}}">
                    </div>
                @endforeach
                <div class="form-group col-md-12 pb-3">
                    <label class="pb-1 fs-18" for="price">Price *</label>
                    <input name="price" id="price" type="number" class="form-control" placeholder="Enter Price" required>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12 pb-3">
                    <label class="pb-1 fs-18" for="city">City *</label>
                    <input name="city" id="city" type="text" class="form-control" placeholder="Enter city name" required>
                    @error('city')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex flex-column pb-3">
                    <label class="pb-1 fs-18" for="photo-upload">Upload photos *</label>
                    <div class="item-upload col-md-12">
                        <input id="photo-upload" type="file" name="photos[0]" multiple class="form-control col-md-12" required>
                    </div>
                    @error('photos')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div id="photo-upload__preview" class="upload-preview mt-3 col-md-12 d-flex row"></div>
                </div>
                <div class="form-group col-md-12 pb-3">
                    <label class="pb-1 fs-18" for="description">Description *</label>
                    <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
                </div>
                <div class="d-flex flex-row-reverse">
                    <div class="input-group-append w-25">
                        <button class="btn btn-warning w-100 flex-row-reverse" type="submit">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection

<style>
    .item-photo__preview {
        width: 100%;
        height: 160px;
        -o-object-fit: cover;
        object-fit: cover;
        vertical-align: middle;
        box-sizing: border-box;
    }

    .photo-box {
        position: relative;
    }

    .add-photo-btn {
        position: absolute;
        top: 0;
        right: 0;
    }
</style>

