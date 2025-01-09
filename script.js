  function flipCard(card) {
    card.classList.toggle('flipped');
  }

  /*map details show*/
  const hoverImage = document.getElementById('hoverImage');
        const infoBox = document.getElementById('infoBox');

        document.querySelectorAll('.dot').forEach(dot => {
            // Show information when the dot is clicked
            dot.addEventListener('click', function () {
                const info = this.getAttribute('data-info');
                infoBox.innerText = info;
            });

            // Show the hover image when the mouse moves over the dot
            dot.addEventListener('mouseover', function (event) {
                const imageUrl = this.getAttribute('data-image');
                hoverImage.style.backgroundImage = `url(${imageUrl})`;
                hoverImage.style.display = 'block';
                hoverImage.style.top = `${event.clientY - 60}px`; // Adjust Y offset
                hoverImage.style.left = `${event.clientX + 20}px`; // Adjust X offset
            });

            // Move the hover image along with the mouse
            dot.addEventListener('mousemove', function (event) {
                hoverImage.style.top = `${event.clientY - 60}px`;
                hoverImage.style.left = `${event.clientX + 20}px`;
            });

            // Hide the hover image when the mouse leaves the dot
            dot.addEventListener('mouseout', function () {
                hoverImage.style.display = 'none';
            });
        });


// Fetch event data from the server
async function fetchEventData() {
    try {
        const response = await fetch('home_page_countdown.php');
        const events = await response.json();
        displayEvents(events);
    } catch (error) {
        console.error("Error fetching event data:", error);
    }
}

// Display events and their countdowns
function displayEvents(events) {
    const container = document.getElementById('eventContainer');

    events.forEach(event => {
        // Create event HTML structure
        const eventDiv = document.createElement('div');
        eventDiv.className = 'event';

        const eventTitle = document.createElement('h2');
        eventTitle.textContent = event.event_name;

        const timeDisplay = document.createElement('div');
        timeDisplay.className = 'time-display';

        const monthsBox = createTimeBox('months', 'Months');
        const daysBox = createTimeBox('days', 'Days');
        const hoursBox = createTimeBox('hours', 'Hours');

        timeDisplay.appendChild(monthsBox);
        timeDisplay.appendChild(daysBox);
        timeDisplay.appendChild(hoursBox);

        eventDiv.appendChild(eventTitle);
        eventDiv.appendChild(timeDisplay);

        container.appendChild(eventDiv);

        // Start the countdown for this event
        startCountdown(event.event_date, monthsBox, daysBox, hoursBox);
    });
}

// Create a single time box
function createTimeBox(idSuffix, label) {
    const box = document.createElement('div');
    box.className = 'time-box';

    const value = document.createElement('div');
    value.className = 'time-value';
    value.id = idSuffix;
    value.textContent = '-';

    const labelDiv = document.createElement('div');
    labelDiv.className = 'time-label';
    labelDiv.textContent = label;

    box.appendChild(value);
    box.appendChild(labelDiv);

    return box;
}

// Start the countdown for a specific event
function startCountdown(eventDate, monthsElement, daysElement, hoursElement) {
    function updateCountdown() {
        const targetDate = new Date(eventDate);
        const currentDate = new Date();
        const timeDifference = targetDate - currentDate;

        if (timeDifference > 0) {
            const months = Math.floor(timeDifference / (1000 * 60 * 60 * 24 * 30));
            const days = Math.floor((timeDifference % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

            monthsElement.querySelector('.time-value').textContent = months;
            daysElement.querySelector('.time-value').textContent = days;
            hoursElement.querySelector('.time-value').textContent = hours;
        } else {
            monthsElement.querySelector('.time-value').textContent = 0;
            daysElement.querySelector('.time-value').textContent = 0;
            hoursElement.querySelector('.time-value').textContent = 0;
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
}

// Fetch and display event data on page load
fetchEventData();




/*---------------------------------------------------------------------------*/
// Fetch the latest blog data from PHP script
fetch('fetch_blog_data.php') // Replace with the correct path to your PHP script
.then(response => response.json())
.then(data => {
    const blogContainer = document.getElementById('blog-container');

    // Loop through each blog entry and create HTML elements
    data.forEach(blog => {
        const blogCard = document.createElement('div');
        blogCard.classList.add('blog-card');

        // Add the image
        const img = document.createElement('img');
        img.src = blog.imagePath;
        img.alt = blog.title;
        blogCard.appendChild(img);

        // Add the button on the image
        const button = document.createElement('button');
        button.innerText = 'Read More';
        button.onclick = () => {
            alert(`Navigating to: ${blog.title}`);
            // Replace this alert with navigation if needed
            // Example: window.location.href = 'blog-details.php?id=' + blog.id;
        };

        blogCard.appendChild(button);
        blogContainer.appendChild(blogCard);
    });
})
.catch(error => {
    console.error('Error fetching blog data:', error);
});