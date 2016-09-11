<div class="row">

	<div class="col-xs-12">
		<h1>Agregar cuenta</h1>
	</div>

	<div class="col-xs-12">

		<? if(isset($result)): ?>
			<? if($result !== true): ?>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
						<div class="alert alert-danger" role="alert">
							<? foreach($result as $r): ?>
								<ul>
									<li><?=$r?></li>
								</ul>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			<? else: ?>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
						<div class="alert alert-success" role="alert">
							<b><?=$user->getCuenta()?></b> registrada satisfactoriamente!
						</div>
					</div>
				</div>
			<? endif; ?>
		<? endif; ?>
		
		<form action="" method="POST" class="form-horizontal">
	
			<div class="form-group">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-1 text-right">
					<label class="control-label">ID Instagram</label>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<input type="text" name="id" class="form-control input-lg" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-1 text-right">
					<label class="control-label">Cuenta</label>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<input type="text" name="cuenta" class="form-control input-lg" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-1 text-right">
					<label class="control-label">Nombre</label>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<input type="text" name="nombre" class="form-control input-lg" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
					<input type="submit" name="agregar" value="Agregar" class="btn btn-lg btn-success btn-block">
				</div>
			</div>

		</form>

	</div>

</div>