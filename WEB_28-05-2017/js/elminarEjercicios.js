$(document).ready(function(){
	//-- Ejercicios --\\
$(".eliminar").click(function(){/*hacemos referencia de que si hace click en eliminar, que hara*/
		$(this).parent('#iframe').remove();/*le decimos que elemine la fila de la tabla*/
		var id_ej=$(this).parent('#iframe').find('.id_ej').val();
		$.post('./accion.php',{/*Enviamos por POST*/
			Caso:'eliminarVideo',
			Id:$(this).attr('data-id'),
			Id_ej:id_ej
		},function(e){
			alert(e);/*Visualizara un mensaje en el caso que se alla Eleminado*/
		});
});
});
