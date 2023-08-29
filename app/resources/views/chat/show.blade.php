@extends('layout')

@section('script')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        let pusher = new Pusher('f396035cf85402385fb6', {
            cluster: 'eu'
        });

        let channel = pusher.subscribe('{{$chat->channel}}');
        channel.bind('new-message', function (data) {
            console.log(data);
            renderNewMessage(data);
        });
    </script>

    <script defer>
        function handleInputKeyup(event)
        {
            if (event !== undefined && event.code === 'Enter') {
                sendMessage();
            }
        }

        function sendMessage() {
            let input = document.getElementById('messageInput');
            let message = input.value;

            if (message !== '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('chat.send')}}',
                    type: 'POST',
                    data: {message: message, sender_id: {{Auth::id()}}, chat_id: {{$chat->id}}, from: '{{$role}}'},
                    success: function () {
                        // renderSentMessage(message)
                        input.value = '';
                    },
                    error: function (error) {
                        console.log('error');
                        console.log('error')
                    }
                });
            }
        }

        // function renderSentMessage(message) {
        //     $('#chatBody').append(`<div class="text-end" style="font-size: 14pt">${message}</div>`);
        // }

        function renderNewMessage(data) {
            let messageClass = data.from === 'owner' ? 'text-start' : 'text-end';
            let message = data.message;
            $('#chatBody').append(`<div class="${messageClass}" style="font-size: 14pt">${message}</div>`);
        }
    </script>
@endsection

@section('content')
    <div class="p-6">
        <section class="text-center">
            <div class="d-flex align-items-center justify-content-start col-10 mx-auto bg-darkness p-3">
                <div style="font-size: 16pt; font-weight: bold; margin-left: 2rem">{{$ad->title}}</div>
            </div>
        </section>
        <div class="card col-10 mx-auto bg-darkness text-bg-darkness border-gray rounded-0">
            <div class="card-body">
                <section class="mt-5 mx-5 d-flex flex-column" id="chatBody">
                    <div class="mb-4 d-flex flex-row justify-content-between">
                        <div style="font-size: 16pt; text-decoration: underline">Owner: {{$owner->name}}</div>
                        <div style="font-size: 16pt; text-decoration: underline">Buyer: {{$buyer->name}}</div>
                    </div>
                    @foreach($messages as $message)
                        <div class="@if($message->sender === $buyer->id) text-end @else text-start @endif"
                             style="font-size: 14pt">
                            <div>{{$message->message}}</div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
        <div class="mx-auto col-10 my-4 pb-4">
            <div class="d-flex justify-content-center">
                <input class="col-11 p-3 rounded" type="text"
                       id="messageInput"
                       placeholder="Start typing message"
                       onkeyup="handleInputKeyup(event)"
                       autofocus>
                <button class="ms-3 btn btn-primary w-25 px-0" onclick="sendMessage()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" width="30" height="30">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endsection
