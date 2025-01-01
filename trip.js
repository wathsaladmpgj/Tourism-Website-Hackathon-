let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');

// config param
let countItem = items.length;
let itemActive = 0;
// event next click
next.onclick = function(){
    itemActive = itemActive + 1;
    if(itemActive >= countItem){
        itemActive = 0;
    }
    showSlider();
}
//event prev click
prev.onclick = function(){
    itemActive = itemActive - 1;
    if(itemActive < 0){
        itemActive = countItem - 1;
    }
    showSlider();
}
// auto run slider
let refreshInterval = setInterval(() => {
    next.click();
}, 5000)
function showSlider(){
    // remove item active old
    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove('active');
    thumbnailActiveOld.classList.remove('active');

    // active new item
    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');
    setPositionThumbnail();

    // clear auto time run slider
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 5000)
}
function setPositionThumbnail () {
    let thumbnailActive = document.querySelector('.thumbnail .item.active');
    let rect = thumbnailActive.getBoundingClientRect();
    if (rect.left < 0 || rect.right > window.innerWidth) {
        thumbnailActive.scrollIntoView({ behavior: 'smooth', inline: 'nearest' });
    }
}

// click thumbnail
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        itemActive = index;
        showSlider();
    })
})


/*User Input Code*/
const typeSelect = document.getElementById('type');
        const peopleCount = document.getElementById('peopleCount');
        const adultCount = document.getElementById('adultCount');
        const childCount = document.getElementById('childCount');
        const vehicleSelect = document.getElementById('vehicle');
        const plainName = "<?php echo addslashes($plainName); ?>";

        const vehicles = {
            individual: ['bic', 'Car', 'Van', 'Tuktuk'],
            couple: ['Car', 'Van', 'Tuktuk'],
            familySmall: ['Car', 'Van', 'Tuktuk'],
            familyLarge: ['Van'],
            group: ['Van']
        };

        function updateVehicles(options) {
            vehicleSelect.innerHTML = '<option value="">Select a vehicle</option>';
            options.forEach(option => {
                const el = document.createElement('option');
                el.value = option.toLowerCase();
                el.textContent = option.charAt(0).toUpperCase() + option.slice(1).toLowerCase();
                vehicleSelect.appendChild(el);
            });
        }

        function calculateTotalPeople() {
            const adults = parseInt(adultCount.value) || 0;
            const children = parseInt(childCount.value) || 0;
            return adults + children;
        }

        // Initialize form based on plain name
        if (plainName === 'honeymoon tour') {
            adultCount.value = 2;
            childCount.value = 0;
            updateVehicles(vehicles.couple);
            peopleCount.classList.add('hidden');
        }

        typeSelect.addEventListener('change', () => {
            const type = typeSelect.value;
            peopleCount.classList.toggle('hidden', type !== 'family' && type !== 'group');
            
            if (type === 'individual') {
                adultCount.value = 1;
                childCount.value = 0;
                updateVehicles(vehicles.individual);
            } else if (type === 'couple') {
                adultCount.value = 2;
                childCount.value = 0;
                updateVehicles(vehicles.couple);
            } else if (type === 'family') {
                updateVehicles(vehicles.familySmall);
            } else if (type === 'group') {
                updateVehicles(vehicles.group);
            }
        });

        [adultCount, childCount].forEach(input => {
            input.addEventListener('change', () => {
                const type = typeSelect.value;
                const totalPeople = calculateTotalPeople();

                if (type === 'family') {
                    updateVehicles(totalPeople > 3 ? vehicles.familyLarge : vehicles.familySmall);
                } else if (type === 'group') {
                    updateVehicles(vehicles.group);
                }
            });
        });

        // Trigger initial type change to set up proper vehicle options
        if (typeSelect.value) {
            typeSelect.dispatchEvent(new Event('change'));
        }

        /*timline for location----------*/
        document.addEventListener('DOMContentLoaded', function() {
            const arrows = document.querySelectorAll('.timeline-arrow');
            
            arrows.forEach(arrow => {
                arrow.addEventListener('click', function() {
                    const index = this.dataset.index;
                    const details = document.getElementById(`details-${index}`);
                    const currentlyActive = document.querySelector('.timeline-details.active');
                    const currentArrow = document.querySelector('.timeline-arrow.active');
                    
                    // Close currently open details if clicking a different arrow
                    if (currentlyActive && currentlyActive !== details) {
                        currentlyActive.classList.remove('active');
                        currentArrow.classList.remove('active');
                    }
                    
                    // Toggle current details
                    this.classList.toggle('active');
                    details.classList.toggle('active');
                    
                    // Scroll details into view if opening
                    if (details.classList.contains('active')) {
                        details.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                });
            });
        });