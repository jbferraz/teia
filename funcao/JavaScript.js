
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



    function Testa_Email(){
        var x=document.getElementById("email").value;
	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		dataType:'json',//Definimos o tipo de retorno
		url: 'Teste_Email_Existe.php/?id='+x,//Definindo o arquivo onde serão buscados os dados
		success: function(dados){
                    alert(dados)
                   var y=dados;
                   if (y===x){
                     document.getElementById("falhaEmail").style.display="block";   
                   }else{
                       document.getElementById("falhaEmail").style.display="none";   
                   }
                   
	}
        })
};
function esolhebtnsidbar(){
    var x=document.getElementsByClassName("navbar-toggle").style.display;
    if (x==="block"){
           document.getElementById("sidbar-actv1").className=""; 
       document.getElementById("sidbar-actv2").className=""; 
    }else{
        document.getElementById("sidbar-actv2").style.display="none"; 
         document.getElementById("sidbar-actv1").style.display="block"; 
    }
}