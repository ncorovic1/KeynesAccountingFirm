function populateUpdate() {
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
            document.getElementById("allFields").innerHTML = $result;
        }
    }
    
    var e = document.getElementById("chooseHeader");
    var id = e.options[e.selectedIndex].value;
    var query = "?id=" + id;
    ajaxRequest.open("GET", "updateService.php" + query, true);
    ajaxRequest.send(null);
}