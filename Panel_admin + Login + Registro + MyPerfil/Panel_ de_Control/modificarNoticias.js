$(document).ready(function(){
	$(".eliminar").click(function(){/*hacemos referencia de que si hace click en eliminar, que hara*/
			$(this).parent('td').parent('tr').remove();/*le decimos que elemine la fila de la tabla*/
			$.post('./ejecutaNoticias.php',{/*Enviamos por POST*/
				Caso:'Eliminar',
				Id:$(this).attr('data-id'),
			},function(e){
				alert(e);/*Visualizara un mensaje en el caso que se alla Eleminado*/
			});
	});
	$(".modificar").click(function(){/*hacemos referencia de que si hace click en modificar, que hara*/
		var titulo=$(this).parent('td').parent('tr').find('.titulo').val();/*find() Busca el contenido de la class="titulo"*/
		var subtitulo=$(this).parent('td').parent('tr').find('.subtitulo').val();/*find() Busca el contenido de la class="subtitulo"*/
		var descripcion=$(this).parent('td').parent('tr').find('.descripcion').val();/*find() Busca el contenido de la class="descripcion"*/
		$.post('./ejecutaNoticias.php',{/*Enviamos por POST*/
			Caso:'Modificar',
			Id:$(this).attr('data-id'),
			Titulo:titulo,
			Subtitulo:subtitulo,
			Descripcion:descripcion
		},function(e){
			alert(e);/*Visualizara un mensaje en el caso que se alla Modificado*/
		});
	});
});
