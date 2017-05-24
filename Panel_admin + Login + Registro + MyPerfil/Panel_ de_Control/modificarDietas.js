$(document).ready(function(){
	$(".eliminar").click(function(){/*hacemos referencia de que si hace click en eliminar, que hara*/
			$(this).parent('td').parent('tr').remove();/*le decimos que elemine la fila de la tabla*/
			$.post('./ejecutaDietas.php',{/*Enviamos por POST*/
				Caso:'Eliminar',/*Variable Case que contiene un string  Eliminar para especifiar el caso de la accion que se ara acontinuacion*/
				Id:$(this).attr('data-id'),/*Cogemos el id que tiene el boton Eliminar, que viene siendo el id de la fila que haremos el cambio*/
			},function(e){
				alert(e);/*Visualizara un mensaje en el caso que se alla Eleminado*/
			});
	});
	$(".modificar").click(function(){/*hacemos referencia de que si hace click en modificar, que hara*/
		var nombre=$(this).parent('td').parent('tr').find('.nombre').val();/*find() Busca el contenido de la class="nombre"*/
		var descripcion=$(this).parent('td').parent('tr').find('.descripcion').val();/*find() Busca el contenido de la class="descripcion"*/
		var categoria=$(this).parent('td').parent('tr').find('.categoria').val();/*find() Busca el contenido de la class="categoria"*/
		$.post('./ejecutaDietas.php',{/*Enviamos por POST*/
			Caso:'Modificar', /*Variable Case que contiene un string  Modificar para especifiar el caso de la accion que se ara acontinuacion*/
			Id:$(this).attr('data-id'),/*Cogemos el id que tiene el boton modificar, que viene siendo el id de la fila que haremos el cambio*/
			Nombre:nombre,	/*Almacenamos por Post la informacion de las variables de arriba*/
			Descripcion:descripcion, /*Almacenamos por Post la informacion de las variables de arriba*/
			Categoria:categoria /*Almacenamos por Post la informacion de las variables de arriba*/
		},function(e){
			alert(e);/*Visualizara un mensaje en el caso que se alla Modificado*/
		});
	});
});
