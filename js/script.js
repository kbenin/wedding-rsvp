// ### WEDDING COUNTDOWN ###
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

// ### FAQs - ACCORDION ###
document.querySelectorAll('.accordion-header').forEach(header => {
    // Add open/close icon span if not present
    if (!header.querySelector('.accordion-icon')) {
        const icon = document.createElement('span');
        icon.className = 'accordion-icon';
        icon.innerHTML = '+'; // Closed by default
        header.appendChild(icon);
    }

    header.addEventListener('click', () => {
        const currentlyActiveHeader = document.querySelector('.accordion-header.active');
        if (currentlyActiveHeader && currentlyActiveHeader !== header) {
            currentlyActiveHeader.classList.remove('active');
            currentlyActiveHeader.nextElementSibling.style.maxHeight = '0';
            currentlyActiveHeader.nextElementSibling.style.padding = '0 15px';
            // Set icon to closed
            const icon = currentlyActiveHeader.querySelector('.accordion-icon');
            if (icon) icon.innerHTML = '+';
        }
        header.classList.toggle('active');
        const body = header.nextElementSibling;
        const icon = header.querySelector('.accordion-icon');
        if (header.classList.contains('active')) {
            body.style.maxHeight = body.scrollHeight + 'px';
            body.style.padding = '0 15px 30px 15px';
            if (icon) icon.innerHTML = '−'; // Open
        } else {
            body.style.maxHeight = '0';
            body.style.padding = '0 15px';
            if (icon) icon.innerHTML = '+';
        }
    });
});