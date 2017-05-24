$(document).ready(function(){
	$(".eliminar").click(function(){/*hacemos referencia de que si hace click en eliminar, que hara*/
			$(this).parent('td').parent('tr').remove();/*le decimos que elemine la fila de la tabla*/
			$.post('./ejecutaEjercicios.php',{/*Enviamos por POST*/
				Caso:'Eliminar',
				Id:$(this).attr('data-id'),
			},function(e){
				alert(e);/*Visualizara un mensaje en el caso que se alla Eleminado*/
			});
	});
	$(".modificar").click(function(){/*hacemos referencia de que si hace click en modificar, que hara*/
		var nombre=$(this).parent('td').parent('tr').find('.nombre').val();/*find() Busca el contenido de la class="titulo"*/
		var categoria=$(this).parent('td').parent('tr').find('.categoria').val();/*find() Busca el contenido de la class="subtitulo"*/
		var url=$(this).parent('td').parent('tr').find('.url').val();/*find() Busca el contenido de la class="subtitulo"*/
		$.post('./ejecutaEjercicios.php',{/*Enviamos por POST*/
			Caso:'Modificar',
			Id:$(this).attr('data-id'),
			Nombre:nombre,
			Categoria:categoria,
			Url:url
		},function(e){
			alert(e);/*Visualizara un mensaje en el caso que se alla Modificado*/
		});
	});
});
