<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MaItFirm Forgot password</title>
    <style>
        p {
            text-align: center;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <p><a href="{{ route('update.password',$token) }}">Click here</a> for update password.</p>
    </div>
</body>
</html>