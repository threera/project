<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
    <?php 

    
    $name = "admin"; 

    $nav = array("home", "about", "contact");
    

 
    ?>
   

    @if($name == "admin")
        <h1>welcome {{$name}}</h1>
    @endif

    @foreach ($nav as $menu)
        <a href="{{route('about')}}">{{$menu}}</a>
    @endforeach
    <br/>
    @foreach ($nav as $menu)
        <a href={{url($menu)}}>{{$menu}}</a>
    @endforeach

    <br/>
    @foreach ($nav as $menu)
        <a href={{$menu}}>{{$menu}}</a>
    @endforeach


</body>
</html>