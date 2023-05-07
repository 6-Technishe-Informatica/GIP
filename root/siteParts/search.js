const xmlhttp = new XMLHttpRequest(); // maak een nieuw XMLHttpRequest object aan
const tabel = document.getElementById("myTable"); // selecteer de tabel waar de data in moet komen

xmlhttp.onload = function () { 
    const myObj = JSON.parse(this.responseText); // zet de responseText om naar een JSON object

    for (let i = 0; i < myObj.length; i++) { // loop door het JSON object heen
        const row = tabel.insertRow(i + 1); // maak een nieuwe rij aan in de tabel
        const cell1 = row.insertCell(0); // maak een nieuwe cel aan in de rij
        const cell2 = row.insertCell(1); // maak een nieuwe cel aan in de rij
        cell1.innerHTML = "<a href='../pages/product.php?productName=" + myObj[i].artikelNaam + "&referentieNummer=" + myObj[i].referentieNummer + "'>" + myObj[i].artikelNaam + "</a>"; // vul de cel met de naam van het artikel
        cell2.innerHTML = myObj[i].prijs; // vul de cel met de prijs van het artikel
    }
}
xmlhttp.open("GET", "../includes/get_data.php"); // open een GET request naar de get_data.php file
xmlhttp.send(); // verstuur het XMLHttpRequest

tabel.style.display = "none"; // zet de tabel op display none

function myFunction() { // functie die wordt aangeroepen als er iets in de zoekbalk wordt getypt
    // Declare variables
    var input, filter, table, tr, td, i, txtValue; // declareer variabelen
    input = document.getElementById("myInput"); // selecteer de zoekbalk
    filter = input.value.toUpperCase(); // zet de zoekbalk naar uppercase
    table = document.getElementById("myTable"); // selecteer de tabel
    tr = table.getElementsByTagName("tr"); // selecteer alle rijen in de tabel

    tabel.style.display = "block"; // zet de tabel op display block

    for (i = 0; i < tr.length; i++) { // loop door alle rijen heen
        td = tr[i].getElementsByTagName("td")[0]; // selecteer de eerste cel in de rij

        if (td) { // als de cel bestaat
            txtValue = td.textContent || td.innerText; // zet de tekst van de cel naar txtValue
            if (txtValue.toUpperCase().indexOf(filter) > -1) { // als de tekst van de cel overeenkomt met de zoekterm
                tr[i].style.display = ""; // zet de display van de rij op block
            } else { // als de tekst van de cel niet overeenkomt met de zoekterm
                tr[i].style.display = "none"; // zet de display van de rij op none
            }
        }
    }

    document.addEventListener('click', function (event) { // als er op de pagina wordt geklikt
        if (!table.contains(event.target)) { // als de tabel niet de target is
            tabel.style.display = "none"; // zet de tabel op display none
        }
    });
}

const burger = document.getElementById('burger'); // selecteer de burger
const navLinks = document.getElementById('navLinks'); // selecteer de navLinks

burger.addEventListener('click', function () { // als er op de burger wordt geklikt
    navLinks.classList.toggle('active'); // toggle de active class op de navLinks
});