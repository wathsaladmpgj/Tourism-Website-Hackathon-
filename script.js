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