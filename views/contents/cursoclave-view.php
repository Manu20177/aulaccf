<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-videocam zmdi-hc-fw"></i> Inscripcion de Curso</h1>
	</div>
	<p class="lead">
		Para poder Inscribirse y Acceder al contenido del curso debe ingresar la Clave de Acceso suministrada por el Administrador de Cursos.
	</p>
</div>
<?php 
	require_once "./controllers/cursoclaveController.php";

	$insVideo = new cursoclaveController();

	$urls=SERVERURL.$_GET['views'];
	$datos = $_SESSION["curso_seleccionado"] ?? null;

	$code      = $datos['cod'];
	$fecha     = $datos['fecha'];
	$titulo    = $datos['titulo'];
	$portada   = $datos['portada'];
	$id_alumno = $datos['id_alumno'];

	
?>
<p class="text-center">
	<a href="<?php echo SERVERURL; ?>cursolist/" class="btn btn-info btn-raised btn-sm">
		<i class="zmdi zmdi-long-arrow-return"></i> Volver
	</a>
</p>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-success">
				<div class="panel-heading">
				    <h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> Datos del Curso</h3>
				</div>
			  	<div class="panel-body">
				    <form action="<?php echo SERVERURL; ?>ajax/ajaxInscripcion.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="ajaxDataForm">
				    	<input type="hidden" name="cursoclave" value="<?php echo $code; ?>">
				    	<input type="hidden" name="id_alumno" value="<?php echo $id_alumno; ?>">
				    	<fieldset class="full-box">
				    		<div class="container-fluid">
								<div class="row">
									
										<div class="form-group label-floating" style="text-align: center;">
										  	<h1><?php echo $titulo; ?></h1>
											
											<img src="<?php echo $portada; ?>" 
												alt="Portada" 
												class="img-responsive" 
												style="max-width: 300px; margin: 10px auto; display: block;">
											<h2><?php echo $fecha; ?></h2>

										</div>
								</div>
				    			<div class="row">
				    		
				    				
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<span class="control-label">Clave de Inscripcion *</span>
										  	<input class="form-control" type="text" name="clave" required="" maxlength="30">
										</div>
				    				</div>
									
									

				    				
				    			</div>
				    		</div>
				    	</fieldset>
				    	
				    	
					    <p class="text-center">
					    	<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Inscribirse</button>
					    </p>
					    <div class="full-box form-process"></div>
				    </form>
				    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				    	
				    </form>
			  	</div>
			</div>
		</div>
	</div>
</div>
