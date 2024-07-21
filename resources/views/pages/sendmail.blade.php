<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Hi, {{ $user->username }}!</h1>
    <p>Please click the following link to verify your email:</p>
    <a href="{{$url}}">Verify Email</a>
    <p><span>Thank you !</span></p>

</body>
</html>
