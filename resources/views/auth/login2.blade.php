<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{asset('styles/login-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  
    <div class="container">
        <div class="sidebar">
          {{-- <img class="sidebar-logo" src="icons/person.png"ed alt="Logo"> --}}
        </div>
        <div class="content">
          <img class="login-logo" src="icons/loginLogo.png" alt="Login Logo">
          <p class="login-box-msg">Sign in to start your session</p>
          <div class="message">
            @if (session('success'))
              <div style="background-color: green; padding: 10px;">
                  {{ session('success') }}
              </div>
            @endif
            @if (session('failure'))
              <div style="background-color: red; padding: 10px;">
                  {{ session('failure') }}
              </div>
            @endif
            @if($errors->any())
              <div >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
          </div>
          
    
         
          <form action="{{ url('login') }}" method="POST" class="content">
              @csrf
              <div class="input-field">
                <img  class="email-icon" src="icons/add-friend.png" alt="Email Icon">
                <input value="{{old('email')}}" required name="email" type="text" placeholder="Email">
                {{-- @error('email')
                    <p>{{$message}}</p>
                @enderror --}}
              </div>

              <div class="input-field">
                <img class="password-icon" src="icons/padlock.png" alt="Password Icon">
                <input value="{{old('password')}}" required name="password" id="password" type="password" placeholder="Password">
                {{-- @error('password')
                    <p>{{$message}}</p>
                @enderror --}}
                <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                  <i class="fas fa-eye"></i>
                </button>
              </div>

              <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
                
              
              <button class="login-btn" type="submit">Sign In</button>
              
          </form>          
          <p>
            <a href="{{ url('forgot-password') }}">I forgot my password</a>
          </p>
        </div>
    </div>
</body>

<script>
  function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleButton = document.getElementById("togglePassword");

      if (passwordInput.type === "password") {
          passwordInput.type = "text";
          toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Eye-slash icon when showing password
      } else {
          passwordInput.type = "password";
          toggleButton.innerHTML = '<i class="fas fa-eye"></i>'; // Eye icon when hiding password
      }
  }
</script>
</html>


  
