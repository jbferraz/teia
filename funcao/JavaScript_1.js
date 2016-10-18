
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
function testeSenha(){
var y=document.getElementById("senha1").value;    
var x=document.getElementById("Senha2").value;
var z=document.getElementById("Btn-Cadatrar").className;
    if (x===y){
    document.getElementById("Btn-Cadatrar").className=z;
    document.getElementById("falhaSenha").style.display="none";
    }else{
      document.getElementById("falhaSenha").style.display="block";
      
      }
};
function  mudaestar(x){
   var r="star"+x;
   var cla=document.getElementById(r).className;
    if(cla==="glyphicon glyphicon-star-empty"){
        document.getElementById(r).className;
        document.getElementById(r).className="glyphicon glyphicon-star";
    }else{
       document.getElementById(r).className;
       document.getElementById(r).className="glyphicon glyphicon-star-empty"; 
   }
};
