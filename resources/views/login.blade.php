<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  </head>
  <body>
    <div class="customer-log-in">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="group">
          </div>
          <div class="overlap-group-wrapper">
            <div class="overlap-group">
              <div class="text-wrapper">Maison Burro</div>
              <div class="div">バターケーキ</div>
            </div>
          </div>
          <img class="rectangle" src="img/rectangle 6412.png" />
          <form method="POST" action="{{ route('login.submit') }}">
          @csrf

          <div class="group-2">

          <div class="group-3">
              <label class="text-wrapper-2" for="custEmail">Email</label>
              <input
                class="rectangle-2"
                type="email"
                id="custEmail"
                name="custEmail"
                placeholder="Enter your email"
                required
              />
            </div>
            <!-- Password input field -->
            <div class="group-4">
              <label class="text-wrapper-3" for="password">Password</label>
              <input
                class="rectangle-3"
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required
              />
            </div>
            
            @if ($errors->any())
            <div style="color: red; font-size: 16px; font-family:'Times New Roman', Times, serif; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-top: 10px; top:300px;position:relative;">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          </div>
         
          <button type="submit" class="div-wrapper">
    <div class="text-wrapper-6">Login</div>
  </button>
  

          <p class="welcome-back-your">
            <span class="span">Welcome back!</span>
            <span class="text-wrapper-4"> <br /></span>
            <span class="text-wrapper-5">Your favorite treats are waiting</span>
          </p>
       
</form>      
          <div class="ellipse"></div>
          <div class="ellipse-2"></div>
          <div class="ellipse-3"></div>
          <div class="ellipse-4"></div>
          <div class="group-5">
            <div class="overlap-3">
              <img class="vector" src="img/vector.png" />
              <div class="text-wrapper-7">here</div>
              <a href ="{{ route('register') }}" class="text-wrapper-8">SIGN UP</a>



            </div>
          </div>
          <img class="group-6" src="img/group 631749.png" />
        </div>
      </div>
    </div>
  </body>
</html>
