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
