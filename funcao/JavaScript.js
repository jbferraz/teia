
function toogle(){
    var div = document.getElementById("mySidenav-tt");
    if (div.style.display !=='none'){
        div.style.display = 'none';
        document.getElementById("bd").style.overflow="auto";
    }
    else {
        div.style.display = 'block';
        document.getElementById("bd").style.overflow="hidden" ;
        
    }
};
function pegaIdProfd(x){
document.getElementById("ProdId").value=x;  
    }
 function pegaIdimg(x){
alert(x) 
    };
window.onload = function() {
   toogle();
};