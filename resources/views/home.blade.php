<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jacques+Francois&family=Marck+Script&display=swap" rel="stylesheet">
  </head>
  <body>
  <audio id="audio" autoplay muted>
        <source src="/audio/Joe Hisaishi - One Summer's Day.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

  <div class="share">
  <i class="fas fa-paw"></i>
    </div>
    <div class="one">
    <i class="fa-solid fa-volume-high"></i></div>
    <div class="two">
  <!-- Wrapping the image inside an anchor tag to link to the URL -->
  <a href="https://cdn.botpress.cloud/webchat/v2.2/shareable.html?configUrl=https://files.bpcontent.cloud/2025/01/09/17/20250109175852-GAEID8DK.json" target="_blank">
    <img class="chat" src="img/cat.png" alt="Chat Image"/>
  </a>
</div>


    <div class="homepage-rill">
    
      <div class="div">
      
        <div class="overlap">
          <img class="group" src="img/group 631912 1.png" />
          <div class="rectangle"></div>
          <div class="overlap-wrapper">
            <div class="overlap-group">
              <div class="overlap-group-wrapper">
                <div class="overlap-group-2">
                  <img class="img" src="img/image.png" />
                  <img class="rectangle-2" src="img/rectangle 2.png" />
                  <img class="star" src="img/star 3.png" />
                  <img class="star-2" src="img/star 4.png" />
                  <img class="star-3" src="img/star 5.png" />
                  <img class="star-4" src="img/star 6.png" />
                  <div class="text-wrapper">Let Them Eat Burro!</div>
                  <div class="text-wrapper-2">PART II</div>
                  <p class="maison-burro-x-sally">maison burro X Sally &amp; Piper</p>
                </div>
              </div>
              <img class="group-2" src="img/group 6.png" />
              <img class="group-3" src="img/group 7.png" />
              <div class="group-4">
                <div class="vector-wrapper"><img class="vector" src="img/vector 2.png" /></div>
              </div>
              <div class="group-5">
                <div class="img-wrapper"><img class="vector-2" src="img/vector 3.png" /></div>
              </div>
            </div>
          </div>
          <div class="div-wrapper">
            <div class="overlap-2">
              <div class="text-wrapper-3">Maison Burro</div>
              <div class="text-wrapper-4">バターケーキ</div>
            </div>
          </div>
          <div class="group-6">
            <div class="overlap-3">
              <img class="line" src="img/line 7.png" />
              <div class="group-7">
                <div class="overlap-group-3">
                  <div class="ellipse"></div>
                  <div class="ellipse-2"></div>
                  <div class="ellipse-3"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-8">
            <div class="overlap-4">
              <div class="group-9">
                <div class="overlap-5">
                  <p class="p">Get Ready to Satisfy Your Cravings</p>
                  <div class="overlap-6">
                    <img class="vector-3" src="img/vector 2564.png" />
                    <div class="text-wrapper-5">Preorders Opening Soon!</div>
                  </div>
                  <div class="overlap-7">
                    <div class="group-10">
                      <div class="overlap-8">
                      <span id="days" class="text-wrapper-6"></span>
                      <div class="text-wrapper-7">days</div>
                      </div>
                      <div class="overlap-9">
                      <div id="hours" class="text-wrapper-6"></div>
                      <div class="text-wrapper-7">hours</div>
                      </div>
                      <div class="text-wrapper-8">UMM...</div>
                      <div class="overlap-10">
                      <div id="minutes" class="text-wrapper-6"></div>
                      <div class="text-wrapper-7">minutes</div>
                      </div>
                      <div class="overlap-group-4">
                      <div id="seconds" class="text-wrapper-6"></div>
                      <div class="text-wrapper-7">seconds</div>
                      </div>
                    </div>
                    <div class="rectangle-3"></div>
                    <div class="rectangle-4"></div>
                  </div>
                </div>
              </div>
              <div class="group-11">
                <div class="overlap-11">
                  <div class="ellipse-4"></div>
                  <div class="ellipse-5"></div>
                </div>
              </div>
              <img class="group-12" src="img/group 631837 1.png" />
              <img class="group-13" src="img/group 631834 1.png" />
              <img class="mask-group" src="img/clip.png" />
            </div>
          </div>
          <img class="group-14" src="img/group 631924.png" />
          <div class="group-wrapper">
            <div class="group-15">
              <div class="page">
              <a href ="{{ route('home') }}" class="text-wrapper-9">Home</a></div>
              <div class="page-2">
                <div class="overlap-group-5">
                <a href ="{{ route('menu') }}" class="home">Menu</a>
                </div>
              </div>
              <div class="home-wrapper">
              <a href ="{{ route('order') }}" class="home-2">Orders</a></div>

              <div class="page-3">
              <a href ="{{ route('merchandise') }}" class="home-3">Merchandise</a>  
             </div>
            </div>
          </div>
          <div class="group-16">
            <img class="group-17" src="img/group 631796 1.png" />
            <div class="group-18">
          

<div class="group-19">
    @if(!empty($firstName))
        <div class="text-wrapper-10">{{ $firstName }}</div>
    @else
  Login
    @endif
</div>
      </div>
          </div>
          <div class="group-20">
            <img class="group-21" src="img/group 631785 1.png" />
            <div class="group-22">
            <a href ="{{ route('shoppingcart') }}" class="text-wrapper-11">cart</a>
</div>
          </div>
        </div>
        <div class="group-23">
          <img class="group-24" src="img/group 631905 1.png" />
          <div class="group-25">
            <div class="overlap-group-6">
            <button class="btn"onclick="window.location.href='{{ route('menu') }}';">
            ORDER NOW
  <span class="triangle"></span>
</button>


              
            </div>
            <div class="overlap-12">
              <div class="text-wrapper-13">Maison Burro</div>
              <div class="text-wrapper-14">Bakery</div>
            </div>
            <p class="maison-burro-bakery">
              Maison Burro Bakery is an online haven for lovers of Japanese-inspired sweets. We specialize in crafting
              delicate and flavorful desserts that blend traditional Japanese flavors with modern twists. From
              matcha-infused pastries to fluffy Japanese cheesecakes, every treat is thoughtfully made to delight your
              senses. Perfect for gifts, special occasions, or indulgent moments, Maison Burro Bakery delivers a taste
              of Japan straight to your doorstep.
            </p>
          </div>
        </div>
        <div class="group-26">
          <img class="group-27" src="img/group 631904 1.png" />
          <div class="group-28">
            <div class="text-wrapper-15">Maison Burro</div>
            <div class="text-wrapper-16">Lifestyle</div>
            <p class="maison-burro">
              Maison Burro Lifestyle brings our love for Japanese-inspired artistry to life through exclusive
              collaborations. Partnering with renowned brands, we create unique and stylish products such as bags,
              shoes, t-shirts, water bottles, and more. Each collection is designed to reflect the essence of Maison
              Burro—blending elegance, creativity, and a touch of Japanese culture. Whether you&#39;re a fan of our
              sweets or a lover of sophisticated design, our lifestyle creations add a delightful flair to your everyday
              life.
            </p>
            <div class="overlap-group-7">

              <button class="btn2"onclick="window.location.href='{{ route('menu') }}';">
                SHOP NOW
                <span class="triangle2"></span>
              </button>
            </div>
          </div>
        </div>
        <div class="group-29">
              <!-- Embed YouTube iframe without controls and title -->
              <iframe
              class="iframe"
              id="ytplayer"
              type="text/html"
              width="100%"
              height="100%"
              frameborder="0"
              src="https://www.youtube.com/embed/So54RdbkJVw?rel=0&controls=0&autohide=1&showinfo=0&modestbranding=1"
              allow="autoplay"
              style="pointer-events: none;" <!-- Disable interaction until play button is clicked -->

            ></iframe>
            <button class="play-button">▶</button>
              <!-- Text content to hide when video plays -->
              <div class="group-31">
                <div class="sally-piper">Sally &amp; Piper</div>
                <div class="text-wrapper-18">x</div>
                <div class="text-wrapper-19">maison burro</div>
              </div>
          </div>
    
        </div>
        <footer class="footer">
         
          <div class="overlap-13">
            <img class="sidelogo" src="img/group 631786.png" />
           
            <div class="group-33">
              <div class="text-wrapper-21">Pre-order</div>
              <div class="text-wrapper-22">Menu</div>
              <div class="text-wrapper-23">Merchandise</div>
              <div class="text-wrapper-24">Shopping Cart</div>
            </div>
            <div class="group-34">
              <div class="text-wrapper-25">Delivery</div>
              <div class="text-wrapper-26">Special event</div>
              <div class="text-wrapper-27">Feedbacks</div>
              <div class="text-wrapper-28">Online popup</div>
            </div>
            <div class="group-35">
              <div class="group-36">
                <div class="overlap-group-9"><div class="text-wrapper-29">Contact Us</div></div>
              </div>
              <div class="text-wrapper-30">+62 877-7000-8204</div>
              <div class="text-wrapper-31">maisonburro@gmail.com</div>

              <div class="follow">FOLLOW US!</div>
                <img class="socialz" src="img/Group 631931.png"/>
              

              <div class="group-37">
                <div class="image-wrapper"><img class="image-3" src="img/image 66.png" /></div>
              </div>
              <div class="group-38">
                <div class="icon-wrapper"><img class="icon" src="img/icon.png" /></div>
              </div>
            </div>
            <img class="maison-burro-logo" src="img/maison burro logo white 1.png" />
          </div>
        </footer>
        <div class="group-39">
          <div class="overlap-14">
            <img class="group-40" src="img/group 631909 1.png" /> <img class="group-41" src="img/group 631908 1.png" />
          </div>
        </div>
      </div>
    </div>

    <script>
      const playButton = document.querySelector('.play-button');
      const textElements = document.querySelectorAll('.sally-piper, .text-wrapper-18, .text-wrapper-19');
      const iframe = document.getElementById('ytplayer');
      
      playButton.addEventListener('click', () => {
        // Hide text and play button
        textElements.forEach(element => {
          element.style.visibility = 'hidden';
          element.style.opacity = '0';
        });
        playButton.style.display = 'none';
    
        // Allow video interaction and trigger playback
        iframe.style.pointerEvents = 'auto';
    
        // Start the video
        const iframeSrc = iframe.src;
        iframe.src = iframeSrc + "&autoplay=1";
      });



    </script>
    
    <script src="{{ asset('js/home.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
