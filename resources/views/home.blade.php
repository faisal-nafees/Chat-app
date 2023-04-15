<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="container w-25 mx-auto mt-5">
        <h1>Chat App</h1>

        <form action="/username">
            <div>
                <input type="text" id="username" class="form-control" placeholder="Enter Username">
            </div>
            <button class="btn btn-primary" type="button" onclick="submitForm()">Submit</button>
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    function submitForm() {
        var username = $('#username').val();
        localStorage.setItem('username', username);
        $('form').submit();

    }
</script>

</html>
