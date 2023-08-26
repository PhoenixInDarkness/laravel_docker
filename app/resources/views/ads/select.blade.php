@extends('layouts.app')

@section('content')
    <div class="flex h-screen m-auto pt-10 mt-5 text-center align-middle h-20 bg-darkness">
        <div class="m-auto text-bg-darkness bg-darkness">
            <h2 class="pb-3">Select list ad category</h2>
            <form method="GET" action="{{ route('add_ad') }}">
                @csrf
                <div class="input-group">
                    <select name="category_id" id="category_id"  class="custom-select w-75 bg-select text-bg-darkness border-radius-left">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append w-25 ">
                        <button class="btn btn-warning left-radius-none w-100" type="submit">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
