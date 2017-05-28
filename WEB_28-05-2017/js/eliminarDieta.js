$(document).ready(function(){
  //-- Dietas--\\
$(".eliminarD").click(function(){/*hacemos referencia de que si hace click en eliminar, que hara*/
    $(this).parent('#diet').remove();/*le decimos que elemine la fila de la tabla*/
    var id_die=$(this).parent('#diet').find('.id_die').val();
    $.post('./accion.php',{/*Enviamos por POST*/
      Dieta:'eliminarDiet',
      Id:$(this).attr('data-id'),
      Id_die:id_die
    },function(e){
      alert(e);/*Visualizara un mensaje en el caso que se alla Eleminado*/
    });
});
});
