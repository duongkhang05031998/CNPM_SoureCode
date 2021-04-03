<!DOCTYPE html>
<html>
<head runat="server">
	<meta charset="utf-8">
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
     
    <title>@yield('title')</title>



    <script src="public/assets/dest/js/jquery.js"></script>
  <script src="public/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="public/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
  <script src="public/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
  <script src="public/assets/dest/vendors/animo/Animo.js"></script>
  <script src="public/assets/dest/vendors/dug/dug.js"></script>
  <script src="public/assets/dest/js/scripts.min.js"></script>
  
</head>
<body>

@include('giaodien.top')


<div>
	 @section('content')
      @show
</div>

@include('giaodien.footer')

  
  

  

 