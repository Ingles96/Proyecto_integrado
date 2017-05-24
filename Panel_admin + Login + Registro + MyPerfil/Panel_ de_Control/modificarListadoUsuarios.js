$(document).ready(function(){
	$(".eliminar").click(function(){/*hacemos referencia de que si hace click en eliminar, que hara*/
			$(this).parent('td').parent('tr').remove();/*le decimos que elemine la fila de la tabla*/
			$.post('./ejecutaListadoUsuarios.php',{/*Enviamos por POST*/
				Caso:'Eliminar',
				Id:$(this).attr('data-id'),
			},function(e){
				alert(e);/*Visualizara un mensaje en el caso que se alla Eleminado*/
			});
	});
	$(".modificar").click(function(){/*hacemos referencia de que si hace click en modificar, que hara*/
		var rol=$(this).parent('td').parent('tr').find('.rol').val();/*find() Busca el contenido de la class="titulo"*/
		$.post('./ejecutaListadoUsuarios.php',{/*Enviamos por POST*/
			Caso:'Modificar',
			Id:$(this).attr('data-id'),
			Rol:rol
		},function(e){
			alert(e);/*Visualizara un mensaje en el caso que se alla Modificado*/
		});
	});
});
