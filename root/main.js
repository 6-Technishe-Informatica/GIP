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

    //check if body id is admin
    if (document.body.id == 'admin') {

        const btnCPU = document.getElementById("Cpu");
        const btnGPU = document.getElementById("Gpu");
        const btnRAM = document.getElementById("Ram");
        const btnPSU = document.getElementById("PowerSupply");
        const btnMOBO = document.getElementById("Motherboard");
        const btnSTORAGE = document.getElementById("Storage");
        const btnCASE = document.getElementById("Case");
        const btnMonitor = document.getElementById("Monitor");
        const btnKeyboard = document.getElementById("Keyboard");
        const btnMouse = document.getElementById("Mouse");
        const btnHeadset = document.getElementById("Headset");

        const spec = document.getElementById("spec");

        //check if button is clicked

        btnCPU.addEventListener('click', function () {
            spec.innerHTML = '<label for="cpuCores">CPU cores</label>';
            spec.innerHTML += '<input type="number" name="cpuCores" id="cpuCores" placeholder="Cpu cores">';

            spec.innerHTML += '<label for="cpuSpeed"> CPU speed</label>';
            spec.innerHTML += '<input type="number" name="cpuSpeed" id="cpuSpeed" placeholder="Cpu speed" step="any">';

            spec.innerHTML += '<label for="cpuSocket">CPU socket</label>';
            spec.innerHTML += '<input type="text" name="cpuSocket" id="cpuSocket" placeholder="Cpu socket">';

            spec.innerHTML += '<label for="cpuType">CPU type</label>';
            spec.innerHTML += '<input type="text" name="cpuType" id="cpuType" placeholder="Cpu type">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="cpu">'

        });

        btnGPU.addEventListener('click', function () {
            spec.innerHTML = '<label for="gpuMemory">GPU memory</label>';
            spec.innerHTML += '<input type="number" name="gpuMemory" id="gpuMemory" placeholder="Gpu memory">';

            spec.innerHTML += '<label for="gpuMemoryType">GPU memory type</label>';
            spec.innerHTML += '<input type="text" name="gpuMemoryType" id="gpuMemoryType" placeholder="Gpu memory type">';

            spec.innerHTML += '<label for="gpuType">GPU type</label>';
            spec.innerHTML += '<input type="text" name="gpuType" id="gpuType" placeholder="Gpu type">';

            spec.innerHTML += '<label for="gpuCores">GPU cores</label>';
            spec.innerHTML += '<input type="number" name="gpuCores" id="gpuCores" placeholder="Gpu cores">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="gpu">'

        });

        btnRAM.addEventListener('click', function () {
            spec.innerHTML = '<label for="ramType">RAM type</label>';
            spec.innerHTML += '<input type="text" name="ramType" id="ramType" placeholder="Ram type">';

            spec.innerHTML += '<label for="ramSpeed">RAM speed</label>';
            spec.innerHTML += '<input type="number" name="ramSpeed" id="ramSpeed" placeholder="Ram speed"  step="any">';

            spec.innerHTML += '<label for="ramSize">RAM size</label>';
            spec.innerHTML += '<input type="number" name="ramSize" id="ramSize" placeholder="Ram size">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="ram">'

        });

        btnPSU.addEventListener('click', function () {
            spec.innerHTML = '<label for="psuPower">PSU power</label>';
            spec.innerHTML += '<input type="number" name="psuPower" id="psuPower" placeholder="Psu power">';

            spec.innerHTML += '<label for="psuModular">PSU modular</label>';
            spec.innerHTML += '<input type="text" name="psuModular" id="psuModular" placeholder="Psu modular">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="psu">'

        });

        btnMOBO.addEventListener('click', function () {
            spec.innerHTML = '<label for="moboSocket">MOBO socket</label>';
            spec.innerHTML += '<input type="text" name="moboSocket" id="moboSocket" placeholder="Mobo socket">';

            spec.innerHTML += '<label for="moboFormFactor">MOBO form factor</label>';
            spec.innerHTML += '<input type="text" name="moboFormFactor" id="moboFormFactor" placeholder="Mobo form factor">';

            spec.innerHTML += '<label for="moboRamType">MOBO ram type</label>';
            spec.innerHTML += '<input type="text" name="moboRamType" id="moboRamType" placeholder="Mobo ram type">';

            spec.innerHTML += '<label for="moboRamSlots">MOBO ram slots</label>';
            spec.innerHTML += '<input type="number" name="moboRamSlots" id="moboRamSlots" placeholder="Mobo ram slots">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="moederbord">'

        });

        btnSTORAGE.addEventListener('click', function () {
            spec.innerHTML = '<label for="storageType">STORAGE type</label>';
            spec.innerHTML += '<input type="text" name="storageType" id="storageType" placeholder="Storage type">';

            spec.innerHTML += '<label for="storageSize">STORAGE size</label>';
            spec.innerHTML += '<input type="text" name="storageSize" id="storageSize" placeholder="Storage size">';

            spec.innerHTML += '<label for="storageSpeed">STORAGE speed</label>';
            spec.innerHTML += '<input type="number" name="storageSpeed" id="storageSpeed" placeholder="Storage speed" step="any">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="storage">'

        });

        btnCASE.addEventListener('click', function () {
            spec.innerHTML = '<label for="caseFormFactor">CASE form factor</label>';
            spec.innerHTML += '<input type="text" name="caseFormFactor" id="caseFormFactor" placeholder="Case form factor">';

            spec.innerHTML += '<label for="caseSize">CASE size</label>';
            spec.innerHTML += '<input type="text" name="caseSize" id="caseSize" placeholder="Case size">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="case">'

        });

        btnKeyboard.addEventListener('click', function () {
            spec.innerHTML = '<label for="keyboardType">KEYBOARD type</label>';
            spec.innerHTML += '<input type="text" name="keyboardType" id="keyboardType" placeholder="Keyboard type">';

            spec.innerHTML += '<label for="keyboardSwitch">KEYBOARD switch</label>';
            spec.innerHTML += '<input type="text" name="keyboardSwitch" id="keyboardSwitch" placeholder="Keyboard switch">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="keyboard">'

        });

        btnMouse.addEventListener('click', function () {
            spec.innerHTML = '<label for="mouseType">MOUSE type</label>';
            spec.innerHTML += '<input type="text" name="mouseType" id="mouseType" placeholder="Mouse type">';

            spec.innerHTML += '<label for="mouseSensor">MOUSE sensor</label>';
            spec.innerHTML += '<input type="text" name="mouseSensor" id="mouseSensor" placeholder="Mouse sensor">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="mouse">'

        });

        btnMonitor.addEventListener('click', function () {
            spec.innerHTML = '<label for="monitorSize">MONITOR size</label>';
            spec.innerHTML += '<input type="number" name="monitorSize" id="monitorSize" placeholder="Monitor size">';

            spec.innerHTML += '<label for="monitorRefreshRate">MONITOR refresh rate</label>';
            spec.innerHTML += '<input type="number" name="monitorRefreshRate" id="monitorRefreshRate" placeholder="Monitor refresh rate">';

            spec.innerHTML += '<label for="monitorResolution">MONITOR resolution</label>';
            spec.innerHTML += '<input type="text" name="monitorResolution" id="monitorResolution" placeholder="Monitor resolution">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="monitor">'

        });

        btnHeadset.addEventListener('click', function () {
            spec.innerHTML = '<label for="headphonesType">HEADPHONES type</label>';
            spec.innerHTML += '<input type="text" name="headphonesType" id="headphonesType" placeholder="Headphones type">';

            spec.innerHTML += '<label for="headphonesMic">HEADPHONES mic</label>';
            spec.innerHTML += '<input type="text" name="headphonesMic" id="headphonesMic" placeholder="Headphones mic">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="headphones">'

        });

    }

    if (document.body.id == 'Artikelen') {
        const btn = document.querySelectorAll("button#button");
        const btnSoort = document.querySelectorAll('button#buttonSoort');

        btn.forEach(button => {
            var nextElement = button.nextElementSibling;

            button.addEventListener('click', function () {


                if (nextElement.style.display == "grid") {
                    nextElement.style.display = "none";
                } else {
                    nextElement.style.display = "grid";
                }
            });
        })

        btnSoort.forEach(button => {
            var nextElement = button.nextElementSibling;

            button.addEventListener('click', function () {


                if (nextElement.style.display == "block") {
                    nextElement.style.display = "none";
                } else {
                    nextElement.style.display = "block";
                }
            });
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