<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <!-- Make sure the correct CSS path is used -->
    <link rel="stylesheet" href="{{ asset('css/Register.css') }}" />
  </head>
  <body>
    <div class="REGISTER-PAGE">
      <div class="overlap-wrapper">
        <div class="overlap">
          <!-- Cover background image -->
          <div class="cover-backgrounds">
          </div>

          <!-- Group content, including text and images -->
          <div class="group">
            <div class="overlap-group">
              <div class="text-wrapper">Maison Burro</div>
              <div class="div">バターケーキ</div>
            </div>
          </div>

          <div class="overlap-group-wrapper">
            <div class="overlap-2">
              <img class="line" src="{{ asset('img/line.svg') }}" alt="Line" />
              <div class="div-wrapper">
                <div class="overlap-3">
                  <img class="bouquet-wrapper" src="{{ asset('img/under.svg') }}" alt="Bouquet" />
                  <div class="flowers">
                    <div class="overlap-group-2">
                      <img class="daisy-stems" src="{{ asset('img/daisy-stems.svg') }}" alt="Daisy Stems" />
                      <img class="daisy" src="{{ asset('img/daisy-3.svg') }}" alt="Daisy" />
                      <!-- Add other flower images here -->
                    </div>
                  </div>
                  <div class="flowers-2">
                    <div class="overlap-4">
                      <img class="tulip-stems" src="{{ asset('img/tulip-stems.svg') }}" alt="Tulip Stems" />
                      <img class="tulip" src="{{ asset('img/tulip-2.svg') }}" alt="Tulip" />
                      <!-- Add other tulip images here -->
                    </div>
                  </div>
                  <img class="bouquet-wrapper-over" src="{{ asset('img/over.svg') }}" alt="Bouquet Over" />
                  <img class="bouquet-ties" src="{{ asset('img/bouquet-ties.svg') }}" alt="Bouquet Ties" />
                </div>
              </div>
              <img class="icons" src="{{ asset('img/icons.svg') }}" alt="Icons" />
              <img class="fuzzy-friends" src="{{ asset('img/fuzzy-friends-curious-bunny.png') }}" alt="Fuzzy Friends" />
            </div>
          </div>

          <div class="group-2">
            <div class="overlap-5">
              <img class="rectangle" src="{{ asset('img/rectangle-6412.svg') }}" alt="Rectangle 6412" />
              <img class="rectangle-2" src="{{ asset('img/rectangle-6416.svg') }}" alt="Rectangle 6416" />
              <div class="group-3">
                <div class="ellipse"></div>
                <div class="ellipse-2"></div>
              </div>
              <div class="group-4">
                <div class="ellipse"></div>
                <div class="ellipse-2"></div>
              </div>
              <p class="don-t-loaf-around">
                <span class="span">“Don’t loaf around—<br /></span>
                <span class="text-wrapper-2">register</span>
                <span class="span"> today and rise with us!”</span>
              </p>
              <div class="group-5">
                <div class="text-wrapper-3">First Name</div>
                <div class="rectangle-3"></div>
              </div>
              <div class="group-6">
                <div class="text-wrapper-4">Last Name</div>
                <div class="rectangle-3"></div>
              </div>
              <div class="group-7">
                <div class="text-wrapper-3">Email</div>
                <div class="rectangle-4"></div>
              </div>
              <div class="group-8">
                <div class="text-wrapper-3">Password</div>
                <div class="rectangle-5"></div>
              </div>
              <div class="group-9">
                <div class="text-wrapper-3">Re-enter password</div>
                <div class="rectangle-6"></div>
              </div>
              <div class="group-10">
                <div class="overlap-group-3">
                  <div class="text-wrapper-5">Register</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Group for login link -->
          <div class="group-wrapper">
            <div class="group-11">
              <div class="overlap-group-4">
                <img class="vector-2" src="{{ asset('img/vector.svg') }}" alt="Vector" />
                <div class="text-wrapper-6">here</div>
                <div class="text-wrapper-7">Login</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
