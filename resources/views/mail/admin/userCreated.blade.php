<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <p>
به پرتال وب فوتو خوش آمدید
        </p>
        <p>
            نام کاربری شما:
            {{ $user->email }}
        </p>
        <p>
            رمز عبور شما:
            {{ $password }}
        </p>
    </div>
</body>
</html>