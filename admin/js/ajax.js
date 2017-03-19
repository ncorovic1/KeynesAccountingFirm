function addFormField(type_of_element) {
    type = type_of_element;
    var ajaxRequest;
    try {
        ajaxRequest = new XMLHttpRequest();
    }
    catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {  
            $result = ajaxRequest.responseText;
            document.getElementById("allFields").innerHTML = document.getElementById("allFields").innerHTML + $result;
        }
    }
    var query = "?type=" + type;
    ajaxRequest.open("GET", "componentCode.php" + query, true);
    ajaxRequest.send(null);
}