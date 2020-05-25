<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <pre>
        You have got a message from {{ $details['name'] }} 
        The sender email: {{ $details['email'] }}
        The sender message : {{ $details['body'] }}
    </pre>

</body>
</html>