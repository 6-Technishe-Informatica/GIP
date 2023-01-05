//wait for dom content to load
document.addEventListener("DOMContentLoaded", function (event) {
    //change the active class on the tabs for discription and details

    $discription = document.getElementById('discription');
    $discriptionButton = document.getElementById('discription-button');

    $details = document.getElementById('details');
    $detailsButton = document.getElementById('details-button');

    $discriptionButton.addEventListener('click', function () {
        $discription.classList.add('active');
        $details.classList.remove('active');

        $discriptionButton.classList.add('active');
        $detailsButton.classList.remove('active');
    });

    $detailsButton.addEventListener('click', function () {
        $details.classList.add('active');
        $discription.classList.remove('active');

        $detailsButton.classList.add('active');
        $discriptionButton.classList.remove('active');
    });
});

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
} 