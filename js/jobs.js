function moreInfo(str){
    if (str == "") {
        document.getElementById("info").innerHTML = "";
        return;
    }else{
        xmlhttp = new XMLHttpRequest();

    }
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("info").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "jobinfo.php?q="+str, true);
    xmlhttp.send();
}