window.onload = function() {
    pagination('prev');
    pagination('next');
    var x = document.querySelector('[value]');
    moreInfo(x.getAttribute('value'));

};
    function moreInfo(str) {
        if (str == "") {
            document.getElementById("info").innerHTML = "";
            return;
        } else {
            xmlhttp = new XMLHttpRequest();

        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "jobinfo.php?q=" + str, true);
        xmlhttp.send();
    }

    function pagination(str){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                //prevButton.getAttribute("class")+" "+this.responseText
                //nextButton.getAttribute("class")+" "+this.responseText
                console.log(str);
                document.getElementById(str)
                    .setAttribute("class",
                        document.getElementById(str).getAttribute("class")+this.responseText);
            }
        };
        xmlhttp.open("GET", "pagination.php?pag=" + str, true);
        xmlhttp.send();
    }

