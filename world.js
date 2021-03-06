/* 620118070 */
"use strict";

window.onload = function(){
    var lookup_country_button = document.getElementById("lookupCountries");
    var lookup_cities_button = document.getElementById("lookupCities");

    lookup_country_button.addEventListener("click", function(e){

        const country = document.getElementsByTagName("input")[0];
        var xhttp = new XMLHttpRequest(); //create XMLHttpRequest object
        xhttp.onreadystatechange = function(){
             if (this.readyState == 4 && this.status == 200) {
               document.getElementById("result").innerHTML = this.responseText; //display results in the result section
             }
        };

        var url = "world.php?" + "country=" + String(country.value) + "&context=";

        xhttp.open("GET", url); //specify the request type and where file is located in this case the file is in the same folder
        xhttp.send(); //send php the character to find
    });

    lookup_cities_button.addEventListener("click", function(e){

        const country = document.getElementsByTagName("input")[0];
        var xhttp = new XMLHttpRequest(); //create XMLHttpRequest object
        xhttp.onreadystatechange = function(){
             if (this.readyState == 4 && this.status == 200) {
               document.getElementById("result").innerHTML = this.responseText; //display results in the result section
             }
        };

        var url = "world.php?" + "country=" + String(country.value) + "&context=countries";

        xhttp.open("GET", url); //specify the request type and where file is located in this case the file is in the same folder
        xhttp.send(); //send php the character to find
    });
}