document.addEventListener("DOMContentLoaded", function () {
    const ads = document.querySelectorAll("#google-ad-container .ad-item");
    let currentAdIndex = 0;

    function rotateAds() {
        // Hide current ad
        ads[currentAdIndex].classList.remove("active");
        ads[currentAdIndex].classList.add("leaving");

        // Move to the next ad (loop back to the first if at the end)
        currentAdIndex = (currentAdIndex + 1) % ads.length;

        // Show the next ad
        setTimeout(() => {
            ads.forEach(ad => ad.classList.remove("leaving")); // Reset previous state
            ads[currentAdIndex].classList.add("active");
        }, 500); // Matches CSS transition duration
    }

    // Rotate ads every 5 seconds
    setInterval(rotateAds, 5000);
});
