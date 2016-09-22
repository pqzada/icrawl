$(document).ready(function(){

	$('.btn-eliminar').click(function(){

		if(confirm("¿Estas seguro que deseas eliminar esta publicacion?")) {

			var id = $(this).attr('data-id');
			$.ajax({
				url: '/?mod=publicaciones&action=eliminar',
				type: 'POST',
				data: {id: id},
				success: function(result) {
					if(result > 0) {
						$('#pub-' + id).hide();
					}
				}
			});
		}

	});

	$("img.lazy").lazyload();
	$("time.timeago").timeago();
	$('#table').DataTable();

});