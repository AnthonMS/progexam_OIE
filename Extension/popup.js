document.addEventListener('DOMContentLoaded', function() {
    var getOrdersBtn = document.getElementById('getOrdersBtn');
    getOrdersBtn.addEventListener('click', function() {

        //console.log("testing123");

        //var testTitle = document.getElementById('testerTitle');
        //testTitle.innerHTML = 'Button clicked!';

        apiCall();

    }, false);
}, false);

function apiCall()
{
    var xhttp = new XMLHttpRequest();
    //xhttp.open("POST", "http://localhost/json_api.php", true);
    //xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.open("GET", "http://localhost/json_api.php", false);
    xhttp.send();
    //var response = JSON.parse(xhttp.responseText);
    //console.log("status: " + xhttp.status);
    //console.log("statusText: " + xhttp.statusText);
    //console.log("responseText: " + xhttp.responseText);

    var testTitle = document.getElementById('testerTitle');
    testTitle.innerHTML = xhttp.responseText;

    var testVar = xhttp.responseText.length;
    console.log(testVar);

    var testVar2 = JSON.parse(xhttp.responseText);
    testVar2 = testVar2.length;
    console.log(testVar2);

    var orderTable = document.getElementById("extensionTable");
    orderTable.innerHTML += "<tr><td>Testing</td><td>Testing2</td><td>Testing3</td><td>Testing4</td><td>Testing5</td><td>Testing6</td></tr>";

    //testTitle.innerHTML += JSON.parse(xhttp.responseText);
}