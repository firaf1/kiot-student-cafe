<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

</head>
<body>
    <h2> MM </h2>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        Echo.channel('home').listen('NewMessage', (e)=>{
            console.log('eeee')
            console.log(e);
        })
 
    </script>
</body>
</html>