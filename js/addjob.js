
window.onload = function() {
    setMinDate();
    setTimeout(removeSuccess, 4000);
}

function getCurDate(sep) {
    today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm
    return (yyyy+sep+mm+sep+dd);
}

function setMinDate(){
    var x = document.getElementsByName('expdate')[0];
    x.setAttribute('min',getCurDate('-'));
    x.setAttribute('value', getCurDate('-'));
}

function removeSuccess(){
    var alertElem = document.getElementById("my-animation");
    if(alertElem != null){
        var pos = 0;
        var id = setInterval(frame, 10);
        function frame(){
            if (pos == 50) {
                clearInterval(id);
            } else {
                pos++;
                alertElem.style.bot = pos + 'px';
            }
        }   
    
    }
}