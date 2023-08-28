@extends('layout')

@section('content')
    <div class="p-6">
        <section class="text-center">
            <div class="d-flex align-items-center justify-content-start col-6 mx-auto bg-darkness p-3">
                <div style="font-size: 16pt; font-weight: bold; margin-left: 2rem">Current chats for "{{$ad->title}}"</div>
            </div>
        </section>
        <div class="card col-6 mx-auto bg-darkness text-bg-darkness border-gray rounded-0">
            <div class="card-body">
                <section class="mt-5 mx-5 d-flex flex-column">
                    <div class="d-flex flex-row mb-2">
                        <div class="col-3" style="font-weight: bold; font-size: 15pt">Buyer</div>
                        <div class="col-3" style="font-weight: bold; font-size: 15pt">Last message</div>
                        <div class="col-4" style="font-weight: bold; font-size: 15pt"></div>
                    </div>
                    @foreach($chats as $chat)
                        <div class="d-flex flex-row align-items-center">
                            <div class="col-3" style="font-size: 13pt">{{$chat->buyer->name}}</div>
                            <div class="col-3" style="font-size: 13pt">{{$chat->lastMessage()}}</div>
                            <div class="col-4 ms-auto" style="font-size: 13pt">
                                <a href="{{route('chat.show-for-owner', ['slug' => $ad->slug, 'user' => $chat->buyer])}}" class="btn btn-primary px-3">Chat</a>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
@endsection
