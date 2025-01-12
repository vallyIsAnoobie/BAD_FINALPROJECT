<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  </head>
  <body>
    <div class="customer-sign-up">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="overlap-group">
            <div class="group">
              <div class="div">
                <img class="img" src="img/rectangle 6416.png" />
                <div class="group-2">
                  <div class="ellipse"></div>
                  <div class="ellipse-2"></div>
                </div>
                <div class="group-3">
                  <div class="ellipse"></div>
                  <div class="ellipse-2"></div>
                </div>
                <p class="don-t-loaf-around">
                  <span class="text-wrapper">&#34;Don’t loaf around—<br /></span>
                  <span class="span">register</span>
                  <span class="text-wrapper"> today and rise with us!”</span>
                </p>

                <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <div class="group-4">
                  <label class="text-wrapper-2" for="first_name">First Name</label>
                  <input
                    class="rectangle-2"
                    type="text"
                    id="first_name"
                    name="first_name"
                    placeholder="Enter your first name"
                    required
                  />
                
                  <p id="first-name-display"></p> <!-- Display text here -->
                </div>
                <div class="group-5">
                  <label class="text-wrapper-3" for="last_name">Last Name</label>
                  <input
                    class="rectangle-3"
                    type="text"
                    id="last_name"
                    name="last_name"
                    placeholder="Enter your last name"
                    required
                  />
                 
                  <p id="last-name-display"></p> <!-- Display text here -->
                </div>
                <div class="group-6">
                  <label class="text-wrapper-4" for="custEmail">Email</label>
                  <input
                    class="rectangle-4"
                    type="email"
                    id="custEmail"
                    name="custEmail"
                    placeholder="Enter your email"
                    required
                  />
                 
                  <p id="email-display"></p> <!-- Display text here -->
                </div>
                <div class="group-7">
                  <label class="text-wrapper-5" for="password">Password</label>
                  <input
                    class="rectangle-5"
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                  />
                 
                  <p id="password-display"></p> <!-- Display text here -->
                </div>
                <div class="group-8">
                  <label class="text-wrapper-6" for="password_confirmation">Re-enter password</label>
                  <input
                    class="rectangle-6"
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Re-enter your password"
                    required
                  />
                 
                  <p id="confirm-password-display"></p> <!-- Display text here -->
                </div>
                <div class="overlap-group-wrapper">
                  <button type="submit" class="div-wrapper">
                    <div class="text-wrapper-7">Register</div>
                  </button>
                </div>
                @if ($errors->any())
                <div style="color: red; font-size: 17px; font-family:'Times New Roman', Times, serif; margin-top: 10px;left:90px; top:725px;position:relative;width:600px;">
                <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
                </form>

              </div>
            </div>
            <img class="group-9" src="img/group 631749.png" />
          </div>
          <div class="group-wrapper">
            <div class="group-10">
              <div class="overlap-group-2">
                <img class="vector" src="img/vector.png" />
                <div class="text-wrapper-8">here</div>
                <a href="{{ route('login') }}" class="text-wrapper-9">Login</a>
                </div>
            </div>
          </div>
          <div class="group-11">
            <div class="overlap-2">
              <div class="text-wrapper-10">Maison Burro</div>
              <div class="text-wrapper-11">バターケーキ</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
