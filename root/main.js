document.addEventListener("DOMContentLoaded", function (event) { // als de DOM geladen is
    if (document.body.id == 'product') { // als de body id product is

        $discription = document.getElementById('discription'); // selecteer de discription
        $discriptionButton = document.getElementById('discription-button'); // selecteer de discription button

        $details = document.getElementById('details'); // selecteer de details
        $detailsButton = document.getElementById('details-button'); // selecteer de details button

        $discriptionButton.addEventListener('click', function () { // als er op de discription button geklikt wordt
            $discription.classList.add('active'); // voeg de active class toe aan de discription
            $details.classList.remove('active'); // verwijder de active class van de details

            $discriptionButton.classList.add('active'); // voeg de active class toe aan de discription button
            $detailsButton.classList.remove('active'); // verwijder de active class van de details button
        });

        $detailsButton.addEventListener('click', function () { // als er op de details button geklikt wordt
            $details.classList.add('active'); // voeg de active class toe aan de details
            $discription.classList.remove('active'); // verwijder de active class van de discription

            $detailsButton.classList.add('active'); // voeg de active class toe aan de details button
            $discriptionButton.classList.remove('active'); // verwijder de active class van de discription button
        });
    }

    if (document.body.id == 'contact') { // als de body id contact is
        const form = document.getElementById("form"); // selecteer het form

        form.addEventListener("submit", function (e) { // als er op de submit button geklikt wordt
            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var message = document.getElementById("text");

            if (name.value == "") { // als de naam leeg is
                e.preventDefault(); // voorkom dat het formulier verstuurd wordt
                var nextElement = name.nextElementSibling; // selecteer de volgende element
                nextElement.innerHTML = "Gelieve dit veld in te vullen.";
                nextElement.classList.add('show'); // voeg de show class toe
            } else if (!name.value.match(/^[a-zA-Z\s\-]+$/)) { // als de naam niet overeenkomt met de regex
                e.preventDefault(); // voorkom dat het formulier verstuurd wordt
                var nextElement = name.nextElementSibling; // selecteer de volgende element
                nextElement.innerHTML = "Vul een geldige naam in.";
                nextElement.classList.add('show'); // voeg de show class toe

            } else { // als de naam wel overeenkomt met de regex
                var nextElement = name.nextElementSibling; // selecteer de volgende element
                nextElement.classList.remove('show') // verwijder de show class
            }
            if (email.value.indexOf("@") == -1 || email.length < 6) { // als het email adres niet overeenkomt met de regex
                text = "Gelieve een geldig email adres in te vullen.";
                var nextElement = email.nextElementSibling; // selecteer de volgende element
                nextElement.innerHTML = text;
                nextElement.classList.add('show'); // voeg de show class toe
                e.preventDefault(); // voorkom dat het formulier verstuurd wordt
            }
            if (message.value.length <= 20) { // als het bericht minder dan 20 karakters bevat
                text = "Gelieve een bericht in te vullen van minstens 20 karakters.";
                var nextElement = message.nextElementSibling; // selecteer de volgende element
                nextElement.innerHTML = text;
                nextElement.classList.add('show'); // voeg de show class toe
                e.preventDefault(); // voorkom dat het formulier verstuurd wordt
            }
        })
    }

    if (document.body.id == 'admin') { // als de body id admin is

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

        btnCPU.addEventListener('click', function () { // als er op de cpu button geklikt wordt voeg de volgende html toe aan de spec div
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

        btnGPU.addEventListener('click', function () { // als er op de gpu button geklikt wordt voeg de volgende html toe aan de spec div
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

        btnRAM.addEventListener('click', function () { // als er op de ram button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="ramType">RAM type</label>';
            spec.innerHTML += '<input type="text" name="ramType" id="ramType" placeholder="Ram type">';

            spec.innerHTML += '<label for="ramSpeed">RAM speed</label>';
            spec.innerHTML += '<input type="number" name="ramSpeed" id="ramSpeed" placeholder="Ram speed"  step="any">';

            spec.innerHTML += '<label for="ramSize">RAM size</label>';
            spec.innerHTML += '<input type="number" name="ramSize" id="ramSize" placeholder="Ram size">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="ram">'

        });

        btnPSU.addEventListener('click', function () { // als er op de psu button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="psuPower">PSU power</label>';
            spec.innerHTML += '<input type="number" name="psuPower" id="psuPower" placeholder="Psu power">';

            spec.innerHTML += '<label for="psuModular">PSU modular</label>';
            spec.innerHTML += '<input type="text" name="psuModular" id="psuModular" placeholder="Psu modular">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="psu">'

        });

        btnMOBO.addEventListener('click', function () { // als er op de mobo button geklikt wordt voeg de volgende html toe aan de spec div
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

        btnSTORAGE.addEventListener('click', function () { // als er op de storage button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="storageType">STORAGE type</label>';
            spec.innerHTML += '<input type="text" name="storageType" id="storageType" placeholder="Storage type">';

            spec.innerHTML += '<label for="storageSize">STORAGE size</label>';
            spec.innerHTML += '<input type="text" name="storageSize" id="storageSize" placeholder="Storage size">';

            spec.innerHTML += '<label for="storageSpeed">STORAGE speed</label>';
            spec.innerHTML += '<input type="number" name="storageSpeed" id="storageSpeed" placeholder="Storage speed" step="any">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="storage">'

        });

        btnCASE.addEventListener('click', function () { // als er op de case button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="caseFormFactor">CASE form factor</label>';
            spec.innerHTML += '<input type="text" name="caseFormFactor" id="caseFormFactor" placeholder="Case form factor">';

            spec.innerHTML += '<label for="caseSize">CASE size</label>';
            spec.innerHTML += '<input type="text" name="caseSize" id="caseSize" placeholder="Case size">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="case">'

        });

        btnKeyboard.addEventListener('click', function () { // als er op de keyboard button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="keyboardType">KEYBOARD type</label>';
            spec.innerHTML += '<input type="text" name="keyboardType" id="keyboardType" placeholder="Keyboard type">';

            spec.innerHTML += '<label for="keyboardSwitch">KEYBOARD switch</label>';
            spec.innerHTML += '<input type="text" name="keyboardSwitch" id="keyboardSwitch" placeholder="Keyboard switch">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="keyboard">'

        });

        btnMouse.addEventListener('click', function () { // als er op de mouse button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="mouseType">MOUSE type</label>';
            spec.innerHTML += '<input type="text" name="mouseType" id="mouseType" placeholder="Mouse type">';

            spec.innerHTML += '<label for="mouseSensor">MOUSE sensor</label>';
            spec.innerHTML += '<input type="text" name="mouseSensor" id="mouseSensor" placeholder="Mouse sensor">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="mouse">'

        });

        btnMonitor.addEventListener('click', function () { // als er op de monitor button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="monitorSize">MONITOR size</label>';
            spec.innerHTML += '<input type="number" name="monitorSize" id="monitorSize" placeholder="Monitor size">';

            spec.innerHTML += '<label for="monitorRefreshRate">MONITOR refresh rate</label>';
            spec.innerHTML += '<input type="number" name="monitorRefreshRate" id="monitorRefreshRate" placeholder="Monitor refresh rate">';

            spec.innerHTML += '<label for="monitorResolution">MONITOR resolution</label>';
            spec.innerHTML += '<input type="text" name="monitorResolution" id="monitorResolution" placeholder="Monitor resolution">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="monitor">'

        });

        btnHeadset.addEventListener('click', function () { // als er op de headset button geklikt wordt voeg de volgende html toe aan de spec div
            spec.innerHTML = '<label for="headphonesType">HEADPHONES type</label>';
            spec.innerHTML += '<input type="text" name="headphonesType" id="headphonesType" placeholder="Headphones type">';

            spec.innerHTML += '<label for="headphonesMic">HEADPHONES mic</label>';
            spec.innerHTML += '<input type="text" name="headphonesMic" id="headphonesMic" placeholder="Headphones mic">';

            spec.innerHTML += '<input type="hidden" name="categorie" id="categorie" value="headphones">'

        });
    }
});

function artikelenPaginaSearch() { // search function voor de artikelen pagina

    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput'); 
    filter = input.value.toUpperCase(); // zet de input naar uppercase
    ul = document.getElementById("myUL"); // zet de ul in een variable
    li = ul.getElementsByTagName('li'); // zet de li's in een array

    for (i = 0; i < li.length; i++) { // loop door de li's heen en kijk of de input overeenkomt met de li's
        a = li[i].getElementsByClassName("a")[0]; // zet de a's in een array
        txtValue = a.textContent || a.innerText; // zet de text van de a's in een variable
        if (txtValue.toUpperCase().indexOf(filter) > -1) { // als de input overeenkomt met de text van de a's laat de li's zien
            li[i].style.display = ""; // laat de li's zien
        } else {
            li[i].style.display = "none"; // laat de li's niet zienw
        }
    }
}

if (document.body.id == 'product') { // als de body id product is voer de volgende code uit
    let slideIndex = 1; 
    showSlides(slideIndex); // laat de eerste slide zien

    function plusSlides(n) { // als er op de pijltjes geklikt wordt laat de volgende slide zien
        showSlides(slideIndex += n); // laat de volgende slide zien
    }

    function currentSlide(n) { // als er op de dots geklikt wordt laat de slide zien die bij de dot hoort
        showSlides(slideIndex = n); // laat de slide zien die bij de dot hoort
    }

    function showSlides(n) { // laat de slides zien
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 } // als de slide index groter is dan de lengte van de slides zet de slide index op 1
        if (n < 1) { slideIndex = slides.length } // als de slide index kleiner is dan 1 zet de slide index op de lengte van de slides 
        for (i = 0; i < slides.length; i++) { // loop door de slides heen en zet de display op none
            slides[i].style.display = "none"; // zet de display op none
        }
        for (i = 0; i < dots.length; i++) { // loop door de dots heen en zet de active class op de dot die bij de slide hoort
            dots[i].className = dots[i].className.replace(" active", ""); // zet de active class op de dot die bij de slide hoort
        }
        slides[slideIndex - 1].style.display = "block"; // zet de display van de slide die bij de slide index hoort op block
        dots[slideIndex - 1].className += " active"; // zet de active class op de dot die bij de slide hoort
    }

    const btnAddToCart = document.getElementById('btnAddToCart'); 

    btnAddToCart.addEventListener('click', function () { // als er op de add to cart button geklikt wordt voer de volgende code uit
        let params = new URLSearchParams(location.search); // zet de url in een variable
        let referentieNummer = params.get('referentieNummer'); // zet de referentie nummer in een variable

        //redirect to cart page
        window.location.href = "../pages/shoppingCard.php?referentieNummer=" + referentieNummer; // redirect naar de shopping card pagina
    });

}

if (document.body.id == 'profile') { // als de body id profile is voer de volgende code uit
    const btnNaam = document.getElementById('btnNaam'); 
    const btnEmail = document.getElementById('btnEmail');
    const btnWachtwoord = document.getElementById('btnWachtwoord');
    const btnGebruikersnaam = document.getElementById('btnGebruikersnaam');

    const naam = document.getElementById('naam');
    const email = document.getElementById('email');
    const wachtwoord = document.getElementById('wachtwoord');
    const gebruikersnaam = document.getElementById('gebruikersnaam');
    const start = document.getElementById('start');

    btnNaam.addEventListener('click', function () { // als er op de naam button geklikt wordt voer de volgende code uit
        naam.classList.toggle('hidden'); // toggle de hidden class

        if (!email.classList.contains('hidden')) { // als de email class niet de hidden class heeft toggle de hidden class
            email.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!wachtwoord.classList.contains('hidden')) { // als de wachtwoord class niet de hidden class heeft toggle de hidden class
            wachtwoord.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!gebruikersnaam.classList.contains('hidden')) { // als de gebruikersnaam class niet de hidden class heeft toggle de hidden class
            gebruikersnaam.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!start.classList.contains('hidden')) { // als de start class niet de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }

        if (naam.classList.contains('hidden')) { // als de naam class de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }
    });

    btnEmail.addEventListener('click', function () { // als er op de email button geklikt wordt voer de volgende code uit
        email.classList.toggle('hidden'); // toggle de hidden class

        if (!naam.classList.contains('hidden')) { // als de naam class niet de hidden class heeft toggle de hidden class
            naam.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!wachtwoord.classList.contains('hidden')) { // als de wachtwoord class niet de hidden class heeft toggle de hidden class
            wachtwoord.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!gebruikersnaam.classList.contains('hidden')) { // als de gebruikersnaam class niet de hidden class heeft toggle de hidden class
            gebruikersnaam.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!start.classList.contains('hidden')) { // als de start class niet de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }

        if (email.classList.contains('hidden')) { // als de email class de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }
    });

    btnWachtwoord.addEventListener('click', function () { // als er op de wachtwoord button geklikt wordt voer de volgende code uit
        wachtwoord.classList.toggle('hidden'); // toggle de hidden class

        if (!naam.classList.contains('hidden')) { // als de naam class niet de hidden class heeft toggle de hidden class
            naam.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!email.classList.contains('hidden')) { // als de email class niet de hidden class heeft toggle de hidden class
            email.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!gebruikersnaam.classList.contains('hidden')) { // als de gebruikersnaam class niet de hidden class heeft toggle de hidden class
            gebruikersnaam.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!start.classList.contains('hidden')) { // als de start class niet de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }

        if (wachtwoord.classList.contains('hidden')) { // als de wachtwoord class de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }
    });

    btnGebruikersnaam.addEventListener('click', function () { // als er op de gebruikersnaam button geklikt wordt voer de volgende code uit
        gebruikersnaam.classList.toggle('hidden'); // toggle de hidden class

        if (!naam.classList.contains('hidden')) { // als de naam class niet de hidden class heeft toggle de hidden class
            naam.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!email.classList.contains('hidden')) { // als de email class niet de hidden class heeft toggle de hidden class
            email.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!wachtwoord.classList.contains('hidden')) { // als de wachtwoord class niet de hidden class heeft toggle de hidden class
            wachtwoord.classList.toggle('hidden'); // toggle de hidden class
        }

        if (!start.classList.contains('hidden')) { // als de start class niet de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }

        if (gebruikersnaam.classList.contains('hidden')) { // als de gebruikersnaam class de hidden class heeft toggle de hidden class
            start.classList.toggle('hidden'); // toggle de hidden class
        }
    });
}