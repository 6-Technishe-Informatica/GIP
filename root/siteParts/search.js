const xmlhttp = new XMLHttpRequest();
const tabel = document.getElementById("myTable");

xmlhttp.onload = function () {
    const myObj = JSON.parse(this.responseText);

    for (let i = 0; i < myObj.length; i++) {
        const row = tabel.insertRow(i + 1);
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        cell1.innerHTML = "<a href='../pages/product.php?productName=" + myObj[i].artikelNaam + "&referentieNummer=" + myObj[i].referentieNummer + "'>" + myObj[i].artikelNaam + "</a>";
        cell2.innerHTML = myObj[i].prijs;
    }
}
xmlhttp.open("GET", "../includes/get_data.php");
xmlhttp.send();

tabel.style.display = "none";

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    tabel.style.display = "block";

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];

        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // add style display none to tr if there are more than 10 results



    // listen for click anywhere on the page
    document.addEventListener('click', function (event) {
        // if the click is not a child of the table
        if (!table.contains(event.target)) {
            // hide the table
            tabel.style.display = "none";
        }
    });
}

const burger = document.getElementById('burger');
const navLinks = document.getElementById('navLinks');

burger.addEventListener('click', function () {
    navLinks.classList.toggle('active');
});