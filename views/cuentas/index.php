<div class="row">

	<div class="col-xs-12">
		<h1>
			Cuentas de Instagram
			<a href="/?mod=cuentas&action=agregar" class="btn btn-success pull-right">Agregar cuenta</a>
		</h1>
	</div>

	<div class="col-xs-12">
		<table class="table table-hover table-condensed table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>URL</th>
				<th>Media Comentarios</th>
				<th>Media Likes</th>
				<th></th>
			</thead>
			<tbody>
				<? foreach($usuarios as $usuario): ?>
				<tr>
					<td><?=$usuario->getId()?></td>
					<td><?=$usuario->getNombre()?></td>
					<td><a href="<?=$usuario->getUrl()?>" target="_blank"><?=$usuario->getUrl()?></a></td>
					<td><?=$usuario->getMediaComentarios()?></td>
					<td><?=$usuario->getMediaLikes()?></td>
					<td>
						<a href="/?mod=cuentas&action=editar&id=<?=$usuario->getId()?>" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Editar</a>
						<!-- <a href="/?mod=cuentas&action=desactivar" class="btn btn-default"><i class="glyphicon glyphicon-eye-close"></i></a>
						<a href="/?mod=cuentas&action=actualizar" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></a> -->
					</td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>

</div>