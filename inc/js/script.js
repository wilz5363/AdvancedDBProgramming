function searchCustomer(){
    var nric = document.getElementById("nric");
    if(nric.value.trim() != ""){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                if(xmlhttp.responseText == "false"){
                    document.getElementById("nric_error").innerHTML = "No such NRIC exist.";
                    document.getElementById("custName").value = "";
                    document.getElementById("custId").value = "";
                }else{
                    var result = JSON.parse(xmlhttp.responseText);
                    document.getElementById("nric_error").innerHTML = "";
                    document.getElementById("custId").value = result.CUSTOMER_ID;
                    document.getElementById("custName").value = result.CUSTOMER_NAME;

                }
            }
        };
        xmlhttp.open("GET","checkNric.php?q=" + nric.value, true);
        xmlhttp.send();
    }
}

function searchModel(){
    var carPlate = document.getElementById("carPlate");
    if(carPlate.value.trim() != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "false") {
                    document.getElementById("carPlate_error").innerHTML = "No such CAR PLATE exist.";
                } else {
                    var result = JSON.parse(xmlhttp.responseText);
                    var select = document.getElementById("carModel");
                    select.disabled = false;
                    for( var i = 0; i<result.length; i++){
                        var option = document.createElement("option");
                        option.innerHTML = result[i].CAR_MODEL;
                        option.value = result[i].CAR_MODEL;
                        select.appendChild(option);
                    }
                }
            }
        };
        xmlhttp.open("GET", "checkCarPlate.php?q=" + carPlate.value, true);
        xmlhttp.send();
    }
}

function searchCarColor(){
    var carPlate = document.getElementById("nric");
    if(carPlate.value.trim() != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "false") {

                } else {
                    var result = JSON.parse(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("GET", ".php?q=" + carPlate.value, true);
        xmlhttp.send();
    }
}

function searchCategory(){

}