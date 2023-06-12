<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

this is my first first blade php file


</br>
</br>

@if (isset($distance))
    Distance between two coridantes:{{ $distance }}
@endif



@if(isset($name)) : 
    Testing user:{{ $name }}
@endif

    
</body>
</html>