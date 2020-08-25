$(document).ready(function(){
    ToggleMensaje("Apagar");
});
  
function ToggleMensaje(estado){
    if (estado == "Mostrar") {
    $(".box-mensaje").fadeIn(500);
    }else {
    $(".box-mensaje").hide();
    }
}