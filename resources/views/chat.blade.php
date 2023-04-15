<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Chat-App</title>
    <style>
        .chat-box {
            overflow-y: auto;
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="container w-25 mx-auto mt-5">
        <h1>Chat App</h1>
        <div class="card p-4 chat-box">
            <div id="chats">
                @if ($messages)
                    @foreach ($messages as $message)
                        <div class="card d-inline-block ps-4 pe-5 mb-2">
                            <strong>{{ $message->username }}</strong>
                            <p class="mb-0">{{ $message->message }}</p>
                        </div><br>
                    @endforeach

                @endif
            </div>
        </div>

        <form action="">
            @csrf
            <div id="" class="d-flex">
                <input type="text" id="message" class="form-control" placeholder="Enter Message">
                <button class="btn btn-success" type="button" onclick="sendMessage()">Send</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script defer type="module">

        window.Echo.channel('chat-app').listen('.chat', function(data) {
            $.ajax({
                url: "/get-messages",
                type: 'get',
                
                success: function(data) {
                    $("#chats").empty();
                    $("#chats").append(data);
                },
                error: function(error) {
                    console.log(error);
                }
            })
        })


        
        
    </script>
    <script>
        function sendMessage() {
            var message = $("#message").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: "/send-message",
                type: 'post',
                data: {
                    username: localStorage.getItem('username'),
                    message: message
                },
                success: function(data) {
                    $("#message").val("");
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
    </script>


</body>

</html>
