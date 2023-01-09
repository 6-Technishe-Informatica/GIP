//wait for dom content to load
document.addEventListener("DOMContentLoaded", function (event) {
    //check if body id is product
    if (document.body.id == 'product') {

        //change the active class on the tabs for discription and details to hide or show them
        
        $discription = document.getElementById('discription'); //get the discription div
        $discriptionButton = document.getElementById('discription-button'); //get the discription button

        $details = document.getElementById('details');  //get the details div
        $detailsButton = document.getElementById('details-button'); //get the details button

        //add event listeners to the buttons
        $discriptionButton.addEventListener('click', function () {
            $discription.classList.add('active'); //add the active class to the discription div
            $details.classList.remove('active'); //remove the active class from the details div

            $discriptionButton.classList.add('active'); //add the active class to the discription button
            $detailsButton.classList.remove('active'); //remove the active class from the details button
        });

        $detailsButton.addEventListener('click', function () {
            $details.classList.add('active'); //add the active class to the details div
            $discription.classList.remove('active'); //remove the active class from the discription div

            $detailsButton.classList.add('active'); //add the active class to the details button
            $discriptionButton.classList.remove('active'); //remove the active class from the discription button
        });


        // code for image slider on product page

        let slideIndex = 1;
        showSlides(slideIndex); //show the first slide

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
            let slides = document.getElementsByClassName("mySlides"); //get all the slides
            let dots = document.getElementsByClassName("dot"); //get all the dots
            if (n > slides.length) { slideIndex = 1 } //if the slide index is higher than the amount of slides, set the slide index to 1
            if (n < 1) { slideIndex = slides.length } //if the slide index is lower than 1, set the slide index to the amount of slides
            for (i = 0; i < slides.length; i++) { //loop through all the slides
                slides[i].style.display = "none"; //hide all the slides
            }
            for (i = 0; i < dots.length; i++) { //loop through all the dots
                dots[i].className = dots[i].className.replace(" active", ""); //remove the active class from all the dots
            }
            slides[slideIndex - 1].style.display = "block"; //show the current slide
            dots[slideIndex - 1].className += " active"; //add the active class to the current dot
        }
    }

    //check if body id is contact
    if (document.body.id == 'contact') {
        const form = document.getElementById("form"); //get the form
        form.addEventListener("submit", function (e) { //add an event listener to the form
            var name = document.getElementById("name"); //get the name input
            var email = document.getElementById("email"); //get the email input
            var message = document.getElementById("text"); //get the message input

            if (name.value == "") { //check if the name input is empty
                e.preventDefault(); //prevent the form from submitting
                var nextElement = name.nextElementSibling; //get the next element
                nextElement.innerHTML = "Gelieve dit veld in te vullen."; //set the inner html of the next element
                nextElement.classList.add('show'); //add the show class to the next element
            } else if (!name.value.match(/^[a-zA-Z\s\-]+$/)) { //check if the name input contains only letters
                e.preventDefault(); //prevent the form from submitting
                var nextElement = name.nextElementSibling; //get the next element
                nextElement.innerHTML = "Vul een geldige naam in."; //set the inner html of the next element
                nextElement.classList.add('show'); //add the show class to the next element

            } else { //if the name input is not empty and contains only letters
                var nextElement = name.nextElementSibling; //get the next element
                nextElement.classList.remove('show') //remove the show class from the next element
            }
            if (email.value.indexOf("@") == -1 || email.length < 6) { //check if the email input contains an @ and is longer than 6 characters
                text = "Gelieve een geldig email adres in te vullen."; //set the text
                var nextElement = email.nextElementSibling; //get the next element
                nextElement.innerHTML = text; //set the inner html of the next element
                nextElement.classList.add('show'); //add the show class to the next element
                e.preventDefault(); //prevent the form from submitting
            }
            if (message.value.length <= 20) {
                text = "Gelieve een bericht in te vullen van minstens 20 karakters."; //set the text
                var nextElement = message.nextElementSibling; //get the next element
                nextElement.innerHTML = text; //set the inner html of the next element
                nextElement.classList.add('show'); //add the show class to the next element
                e.preventDefault(); //prevent the form from submitting
            }
        })
    }
});