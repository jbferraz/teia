
function  mudaestar(x){
   var y= 0 ;
    for (i = 1; i >= (x); i++){
        loop(x);
   }
};
function loop(x){
    var re="star"+x;
    var clat=document.getElementById(re).className;
    if(clat==="glyphicon glyphicon-star-empty"){
    document.getElementById(re).className;
    document.getElementById(re).className="glyphicon glyphicon-star";
    }else{
       document.getElementById(re).className;
       document.getElementById(re).className="glyphicon glyphicon-star-empty"; 
   } 
};