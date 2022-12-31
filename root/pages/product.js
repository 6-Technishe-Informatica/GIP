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
    });

    $detailsButton.addEventListener('click', function () {
        $details.classList.add('active');
        $discription.classList.remove('active');
    });
});