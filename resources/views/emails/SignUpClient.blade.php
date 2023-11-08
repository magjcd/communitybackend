<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    
    <div style="width: 50%; height: auto; border-radius: 5px; margin-right: auto; margin-left: auto; background: #fff; border: 1px solid #f2f2f2;">
        <h5 class="text-center" style="text-align:center; background: rgb(165, 42, 42); color: #fff; line-height: 30px">Welcome at Bible</h5>
        <p>Dear {{ $name }}</p>
        <p>We welcome you at Bible, your credentials at Bible are as below</p>
        <p>{{ $email }}</p>
        <p>{{ $password }}</p>
    
        <br /><br /><br />
        <p>Team Bible</p>
    </div>
</body>
</html>