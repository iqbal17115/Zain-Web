<html>
    
<head>
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  <link rel="stylesheet" href="././css/style1.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Login</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Login</p>
    <form action="{{route('users.login.submit')}}" method="post" class="form1">
        {{@csrf_field()}}
      <input class="un " type="text" value="{{old('email')}}" name="email" align="center" placeholder="Email"><br>
      @error('email')
      <span class="text-danger" >{{$message}}</span><br>
	  @enderror
      <input class="pass" type="password" name="password" align="center" placeholder="Password"><br>
      @error('password')
      <span class="text-danger">{{$message}}</span><br>
      @enderror
      <input type="submit" class="submit" value="Login">
      
      {{-- <p class="forgot" align="center"><a href="{{route('register')}}">Need an account?</p> --}}
            
    </form>       
    </div>
     
</body>

</html>