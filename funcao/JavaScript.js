
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
function pegaIdProfd(x,y){
document.getElementById("ProdId").value=x;
var t="Listar.php?codigo="+y+"";
document.getElementById("ifr1").src=t};


window.onload = function() {
   toogle();
};