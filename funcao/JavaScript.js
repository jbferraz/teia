function menutoglle(){
document.getElementById("menuSitepc").style.display="none";
document.getElementById("menuSitemobile").style.display="block"; 

};

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
function pegaIdProfdExcluir(x){
document.getElementById("ProdIdExcluir").value=x; 
}

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
function mudaclass(){
        document.getElementById("vt2").className="glyphicon glyphicon-star-empty"
        document.getElementById("vt3").className="glyphicon glyphicon-star-empty"
        document.getElementById("vt4").className="glyphicon glyphicon-star-empty"
        document.getElementById("vt5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="1";
}
function mudaclass2(){
    var c=document.getElementById("vt2").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("vt2").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="2";
    }else{
        document.getElementById("vt3").className="glyphicon glyphicon-star-empty"
        document.getElementById("vt4").className="glyphicon glyphicon-star-empty"
        document.getElementById("vt5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="2";
    }
}
function mudaclass3(){
    var c=document.getElementById("star3").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("vt2").className="glyphicon glyphicon-star";
        document.getElementById("vt3").className="glyphicon glyphicon-star";
         document.getElementById("nota").value="3";
    }else{
        document.getElementById("vt4").className="glyphicon glyphicon-star-empty"
        document.getElementById("vt5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="3";
    }
}
function mudaclass4(){
    var c=document.getElementById("vt4").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("vt2").className="glyphicon glyphicon-star";
        document.getElementById("vt3").className="glyphicon glyphicon-star";
        document.getElementById("vt4").className="glyphicon glyphicon-star";
         document.getElementById("nota").value="4";
    }else{
        document.getElementById("vt5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="4";
    }
}
function mudaclass5(){
        document.getElementById("vt2").className="glyphicon glyphicon-star";
        document.getElementById("vt3").className="glyphicon glyphicon-star";
        document.getElementById("vt4").className="glyphicon glyphicon-star";
        document.getElementById("vt5").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="5";
}
function pagUsuario(x){
    document.getElementById("idDono").value=x;
    
};

function setrank(){
        document.getElementById("star2").className="glyphicon glyphicon-star-empty"
        document.getElementById("star3").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="1";
}
function setrank2(){
    var c=document.getElementById("star2").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2").className="glyphicon glyphicon-star";
        document.getElementById("star3").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="2";
    }else{
        document.getElementById("star3").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="2";
    }
}
function setrank3(){
    var c=document.getElementById("star3").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2").className="glyphicon glyphicon-star";
        document.getElementById("star3").className="glyphicon glyphicon-star";
         document.getElementById("nota").value="3";
    }else{
        document.getElementById("star4").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="3";
    }
}
function setrank4(){
    var c=document.getElementById("star4").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2").className="glyphicon glyphicon-star";
        document.getElementById("star3").className="glyphicon glyphicon-star";
        document.getElementById("star4").className="glyphicon glyphicon-star";
         document.getElementById("nota").value="4";
    }else{
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="4";
    }
}
function setrank5(){
        document.getElementById("star2").className="glyphicon glyphicon-star";
        document.getElementById("star3").className="glyphicon glyphicon-star";
        document.getElementById("star4").className="glyphicon glyphicon-star";
        document.getElementById("star5").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="5";
}


function setranko(){
        document.getElementById("star2").className="glyphicon glyphicon-star-empty"
        document.getElementById("star3").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="1";
}
function setrank2o(){
    var c=document.getElementById("star2o").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="2";
    }else{
        document.getElementById("star3o").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4o").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5o").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="2";
    }
}
function setrank3o(){
    var c=document.getElementById("star3o").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("star3o").className="glyphicon glyphicon-star";
         document.getElementById("notao").value="3";
    }else{
        document.getElementById("star4o").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5o").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="3";
    }
}
function setrank4o(){
    var c=document.getElementById("star4o").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("star3o").className="glyphicon glyphicon-star";
        document.getElementById("star4o").className="glyphicon glyphicon-star";
         document.getElementById("notao").value="4";
    }else{
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="4";
    }
}
function setrank5o(){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("star3o").className="glyphicon glyphicon-star";
        document.getElementById("star4o").className="glyphicon glyphicon-star";
        document.getElementById("star5o").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="5";
}
function setranko1(){
        document.getElementById("star2").className="glyphicon glyphicon-star-empty"
        document.getElementById("star3").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="1";
}
function setrank2o1(){
    var c=document.getElementById("star2o").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="2";
    }else{
        document.getElementById("star3o").className="glyphicon glyphicon-star-empty"
        document.getElementById("star4o").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5o").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="2";
    }
}
function setrank3o1(){
    var c=document.getElementById("star3o").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("star3o").className="glyphicon glyphicon-star";
         document.getElementById("notao").value="3";
    }else{
        document.getElementById("star4o").className="glyphicon glyphicon-star-empty"
        document.getElementById("star5o").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="3";
    }
}
function setrank4o1(){
    var c=document.getElementById("star4o").className;
    if(c==="glyphicon glyphicon-star-empty"){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("star3o").className="glyphicon glyphicon-star";
        document.getElementById("star4o").className="glyphicon glyphicon-star";
         document.getElementById("notao").value="4";
    }else{
        document.getElementById("star5").className="glyphicon glyphicon-star-empty"
        document.getElementById("nota").value="4";
    }
}
function setrank5o1(){
        document.getElementById("star2o").className="glyphicon glyphicon-star";
        document.getElementById("star3o").className="glyphicon glyphicon-star";
        document.getElementById("star4o").className="glyphicon glyphicon-star";
        document.getElementById("star5o").className="glyphicon glyphicon-star";
        document.getElementById("nota").value="5";
}