//wait for dom content to load
document.addEventListener("DOMContentLoaded", function (event) {
    //check if body id is product
    if (document.body.id == 'product') {

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
    }

    //check if body id is contact
    if (document.body.id == 'contact') {
        const form = document.getElementById("form");
        form.addEventListener("submit", function (e) {
            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var message = document.getElementById("text");

            if (name.value == "") {
                e.preventDefault();
                var nextElement = name.nextElementSibling;
                nextElement.innerHTML = "Gelieve dit veld in te vullen.";
                nextElement.classList.add('show');
            } else if (!name.value.match(/^[a-zA-Z\s\-]+$/)) {
                e.preventDefault();
                var nextElement = name.nextElementSibling;
                nextElement.innerHTML = "Vul een geldige naam in.";
                nextElement.classList.add('show');

            } else {
                var nextElement = name.nextElementSibling;
                nextElement.classList.remove('show')
            }
            if (email.value.indexOf("@") == -1 || email.length < 6) {
                text = "Gelieve een geldig email adres in te vullen.";
                var nextElement = email.nextElementSibling;
                nextElement.innerHTML = text;
                nextElement.classList.add('show');
                e.preventDefault();
            }
            if (message.value.length <= 20) {
                text = "Gelieve een bericht in te vullen van minstens 20 karakters.";
                var nextElement = message.nextElementSibling;
                nextElement.innerHTML = text;
                nextElement.classList.add('show');
                e.preventDefault();
            }
        })
    }
});

//check if body id is product
if (document.body.id == 'product') {
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
}