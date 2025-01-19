  // Set the target date and time for the countdown
  const targetDate = new Date('January 20, 2025 00:00:00').getTime();

  // Update the countdown every second
  const countdown = setInterval(function() {
    const now = new Date().getTime();
    const timeLeft = targetDate - now;

    if (timeLeft > 0) {
      // Calculate time left in days, hours, minutes, and seconds
      const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

      // Update the countdown display
      document.getElementById('days').innerText = days;
      document.getElementById('hours').innerText = hours;
      document.getElementById('minutes').innerText = minutes;
      document.getElementById('seconds').innerText = seconds;
    } else {
      clearInterval(countdown);
      document.querySelector('.text-wrapper-8').innerText = "Countdown finished!";
    }
  }, 1000);


//   // Get references to the button and footer
const button = document.querySelector('.share');
const button1 = document.querySelector('.one');
const button2= document.querySelector('.two');
const footer = document.querySelector('.footer');  

// Function to hide the button when it reaches the footer
function checkButtonVisibility() {
  const footerRect = footer.getBoundingClientRect();
  
  // Check if the bottom of the footer is visible in the viewport
  if (footerRect.top <= window.innerHeight) {
    button.style.display = 'none';  // Hide the button
    button1.style.display = 'none';  // Hide the button
    button2.style.display = 'none';  // Hide the button
  } else {
    button.style.display = 'block';  // Show the button
    button1.style.display = 'block';  // Hide the button
    button2.style.display = 'block';  // Hide the button
  }
}

// Listen for scroll events
window.addEventListener('scroll', checkButtonVisibility);

// Initial check when the page loads
checkButtonVisibility();
$(function() {
  var flag = 0;

  $('.share').on('click', function() {
      // Check if the flag is 0 or 1
      console.log('Button clicked, flag value: ' + flag);

      if (flag === 0) {
          // Animate elements with class 'one' and 'two'
          $(this).siblings('.one').animate({
              top: '688px',
              left: '93%',
          }, 200);

          $(this).siblings('.two').delay(200).animate({
              top: '580px',
              left: '93%'
          }, 200);

          // Fade in icons
          $('.one i,.chat').delay(500).fadeIn(200);

          // Change flag to 1
          flag = 1;
      } else {
          // Reset positions of 'one', 'two', and 'three'
          $('.one, .two, .three').animate({
              top: '813px',
              left: '93%'
          }, 200);

          // Fade out icons
          $('.one i,.chat').delay(500).fadeOut(200);

          // Change flag to 0
          flag = 0;
      }

      // Share functionality can be implemented here (optional)
      // For now, we log a message for debugging purposes
      console.log('Share button clicked!');
  });
});

document.addEventListener("DOMContentLoaded", function() {
  var audio = document.getElementById('audio');
  var unmuteButton = document.querySelector('.one');

  // Check if both audio element and button exist
  if (audio && unmuteButton) {
      // Function to toggle mute/unmute
      function toggleMute() {
          if (audio.muted) {
              // Unmute the audio and update the button style
              audio.muted = false;
              unmuteButton.classList.remove('muted');
          } else {
              // Mute the audio and update the button style
              audio.muted = true;
              unmuteButton.classList.add('muted');
          }
      }

      // Add event listener to the unmute button
      unmuteButton.addEventListener('click', toggleMute);
  }
});