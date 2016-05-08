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

function searchCarPlate(){
    var carPlate = document.getElementById("carPlate");

    var select_color = document.getElementById("carColor");
    var length_color = select_color.options.length;
    for (var i = 0; i < length_color; i++) {
        select_color.options[i] = null;
    }

    var select_model = document.getElementById("carModel");
    var length_model = select_model.options.length;
    for (var i = 0; i < length_model; i++) {
        select_model.options[i] = null;
    }

    if(carPlate.value.trim() != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "false" || JSON.parse(xmlhttp.responseText) == "") {
                    document.getElementById("carPlate_error").innerHTML = "No such CAR PLATE exist OR not AVAILABLE.";
                } else {
                    document.getElementById("carPlate_error").innerHTML = "";
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

function searchCarModel(){
    var carPlate = document.getElementById("carPlate");
    var carModel = document.getElementById("carModel");
    var xmlHttp = new XMLHttpRequest();

    var select = document.getElementById("carColor");
    var length = select.options.length;
    for (var i = 0; i < length; i++) {
        select.options[i] = null;
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
            var result = JSON.parse(xmlHttp.responseText);
            select.disabled = false;
            for(var i = 0; i<result.length; result++){
                var option = document.createElement("option");
                option.innerHTML = result[i].CAR_COLOR;
                option.value = result[i].CAR_COLOR;
                select.appendChild(option);
            }
        }
    };
    xmlHttp.open("GET", "checkCarModel.php?q="+carPlate.value+"&m="+carModel.value);
    xmlHttp.send();
}

function searchCategorynPrice(){

    var carPlate = document.getElementById("carPlate");
    var carModel = document.getElementById("carModel");
    var carColor = document.getElementById("carColor");
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            var result = JSON.parse(xmlHttp.responseText);
            var categoryName = document.getElementById("carCategory");
            var price = document.getElementById("price");
            categoryName.value  = result.CC_NAME;
            price.value = result.CC_PRICE;
        }
    };
    xmlHttp.open("GET", "getCategoryPrice.php?q="+carPlate.value+"&m="+carModel.value+"&color="+carColor.value);
    xmlHttp.send();

}

