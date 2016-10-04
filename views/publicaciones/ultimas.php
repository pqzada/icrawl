<div class="row">

	<div class="col-xs-12">
		<h1>Últimas publicaciones</h1>
	</div>
	
	<? $i=0; ?>
	<? foreach($publicaciones as $p): ?>
		<div class="col-xs-12" id="pub-<?=$p->getId()?>">
			<article class="<?=($i++%2==0)?'odd':''?>">
				<div class="media">
					<div class="media-left">
						<a href="<?=$p->getUrl()?>" target="_blank">
							<img class="media-object lazy" data-original="<?=$p->getImagen()?>" alt="...">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							<i class="glyphicon glyphicon-comment"></i> <?=$p->getComentarios()?> | 
							<i class="glyphicon glyphicon-thumbs-up"></i> <?=$p->getLikes()?>
							<? if($p->getVideo() == 1): ?>
								| <i class="glyphicon glyphicon-facetime-video"></i>
							<? endif; ?>
							<button class="btn btn-danger pull-right btn-eliminar" data-id="<?=$p->getId()?>">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</h4>
						<p><?=($p->getTitulo())?></p>
						<p class="info">Publicado por <em><?=$usuarios[$p->getIdUsuario()]['nombre']?></em>&nbsp;&nbsp;<time class="timeago" datetime="<?=str_replace(" ","T",$p->getFechaPublicacion())?>"><?=$p->getFechaPublicacion()?></time></p>
					</div>
				</div>
			</article>
		</div>
	<? endforeach; ?>

</div>
