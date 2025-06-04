// Set the date we're counting down to
const weddingDate = new Date("2025-10-19T13:00:00").getTime(); // Replace with your wedding date in valid format

// Update the countdown every 1 second
const countdownFunction = setInterval(() => {
    const now = Date.now(); // Use Date.now() for better performance
    const distance = weddingDate - now;

    // Time calculations for days, hours, minutes and seconds
    const timeUnits = {
        days: Math.floor(distance / (1000 * 60 * 60 * 24)),
        hours: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
        minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
        seconds: Math.floor((distance % (1000 * 60)) / 1000)
    };

    // Display the result in the respective elements
    for (const [unit, value] of Object.entries(timeUnits)) {
        document.getElementById(unit).innerHTML = value;
    }

    // If the countdown is over, display a message
    if (distance < 0) {
        clearInterval(countdownFunction);
        document.querySelector(".countdown").innerHTML = "<h3 class='its-time'>That's a wrap!</h3>";
    }
}, 1000);