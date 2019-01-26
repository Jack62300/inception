var datehs = new Date();
// raccourci d’écriture
function $(id){return document.getElementById("time")}
 
function hms(){
    var today=new Date();

    
    var hrs= today.getHours();
    var mns= today.getMinutes();
    var scd= today.getSeconds();

    var str=(hrs<10?"0"+hrs:hrs)+":"+(mns<10?"0"+mns:mns);
    document.querySelector(".time").innerHTML= `<b>${str}</b>`;
    setTimeout(hms,1000);// réécriture toutes les 1000 millisecondes
}
hms();

