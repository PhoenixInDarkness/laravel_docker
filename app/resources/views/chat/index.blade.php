@extends('layout')

@section('script')
    <script defer>
        function tabControl(tab) {
            let ownerBody = $('#ownerBody')[0];
            let buyerBody = $('#buyerBody')[0];

            if (tab === 'owner') {
                ownerBody.classList.remove('d-none');
                buyerBody.classList.add('d-none');
            }

            if (tab === 'buyer') {
                buyerBody.classList.remove('d-none');
                ownerBody.classList.add('d-none');
            }
        }

        function openChat(chatId) {
            console.log('open');
            axios.get('/chat/data/' + chatId)
                .then((response) => {
                    console.log(response.data);
                    renderChat(response.data);
                })
            //href="{route('chat.show-for-owner', ['slug' => $chat->ad->slug, 'user' => $chat->buyer])}"
        }

        function renderChat(messages) {
            let chatBody = $('#chatBody');
            chatBody.empty()

            messages.forEach((message) => {
                let position = message.sender === 'self' ? 'text-end' : 'text-start';
                let content = '<div class="' + position + '">' + message.message + '</div>';
                chatBody.append(content);
            })
        }
    </script>
@endsection

@section('content')
    <div class="p-6">
        <section class="text-center">
            <div class="d-flex align-items-center justify-content-start col-10 mx-auto bg-darkness p-3">
                <div class="btn btn-warning" onclick="tabControl('owner')" style="font-size: 16pt; font-weight: bold; margin-left: 2rem">Chats as owner</div>
                <div class="btn btn-primary" onclick="tabControl('buyer')" style="font-size: 16pt; font-weight: bold; margin-left: 2rem">Chats as buyer</div>
            </div>
        </section>
        <div class="card col-10 mx-auto bg-darkness text-bg-darkness border-gray rounded-0">
            <div class="d-flex flex-row col-12">
                <div class="card-body col-5 border-end" id="ownerBody">
                    <section class="mt-3 ms-3 d-flex flex-column">
                        <div class="d-flex flex-row mb-2">
                            <div class="col-3" style="font-weight: bold; font-size: 15pt">Buyer</div>
                            <div class="col-3" style="font-weight: bold; font-size: 15pt">Last message</div>
                            <div class="col-2 ms-4" style="font-weight: bold; font-size: 15pt"></div>
                        </div>
                        @foreach($ownerChats as $chat)
                            <div class="d-flex flex-row align-items-center" id="buyer_{{$chat->buyer->id}}">
                                <div class="col-3" style="font-size: 13pt">{{$chat->buyer->name}}</div>
                                <div class="col-3" style="font-size: 13pt">{{$chat->lastMessage()}}</div>
                                <div class="col-2 ms-4" style="font-size: 13pt">
                                    <button class="btn btn-primary px-3" onclick="openChat({{$chat->id}})">Open</button>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
                <div class="card-body col-6 d-none" id="buyerBody">
                    <section class="mt-5 mx-5 d-flex flex-column">
                        <div class="d-flex flex-row mb-2">
                            <div class="col-3" style="font-weight: bold; font-size: 15pt">Buyer</div>
                            <div class="col-3" style="font-weight: bold; font-size: 15pt">Last message</div>
                            <div class="col-4" style="font-weight: bold; font-size: 15pt"></div>
                        </div>
                        @foreach($buyerChats as $chat)
                            <div class="d-flex flex-row align-items-center">
                                <div class="col-3" style="font-size: 13pt">{{$chat->owner->name}}</div>
                                <div class="col-3" style="font-size: 13pt">{{$chat->lastMessage()}}</div>
                                <div class="col-4 ms-auto" style="font-size: 13pt">
                                    <a href="{{route('chat.show-for-owner', ['slug' => $chat->ad->slug, 'user' => $chat->buyer])}}" class="btn btn-primary px-3">Open</a>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
                <div class="card-body col-6">
                    <section class="mt-5 mx-5 d-flex flex-column w-75" style="max-height: 400px" id="chatBody">
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
