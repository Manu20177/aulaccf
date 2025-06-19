<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> Datos del estudiante</h1>
	</div>
	<p class="lead">
		Bienvenido a la sección de actualización de los datos de los estudiantes. Acá podrá actualizar la información personal de los estudiantes registrados en el sistema.
	</p>
</div>
<?php 
	require_once "./controllers/studentController.php";

	$studentIns = new studentController();

	if(isset($_POST['code'])){
		echo $studentIns->update_student_controller();
	}

	$code=explode("/", $_GET['views']);

	$data=$studentIns->data_student_controller("Only",$code[1]);
	if($data->rowCount()>0):
		$rows=$data->fetch();
?>
<?php if($_SESSION['userType']=="Administrador"): ?>

<p class="text-center">
	<a href="<?php echo SERVERURL; ?>studentlist/" class="btn btn-info btn-raised btn-sm">
		<i class="zmdi zmdi-long-arrow-return"></i> Volver
	</a>
</p>
<?php endif; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-success">
				<div class="panel-heading">
				    <h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> Actualizar datos</h3>
				</div>
			  	<div class="panel-body">
				    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> Datos personales</legend><br>
				    		<input type="hidden" name="code" value="<?php echo $rows['Codigo']; ?>">
				    		<div class="container-fluid">
				    			<div class="row">
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Cédula *</label>
										  	<input pattern="[0-9]{1,10}" maxlength="10"   oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" type="text" name="cedula" value="<?php echo $rows['Cedula']; ?>" required="">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="name" value="<?php echo $rows['Nombres']; ?>" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="lastname" value="<?php echo $rows['Apellidos']; ?>" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Email</label>
										  	<input class="form-control" type="email" name="email" value="<?php echo $rows['Email']; ?>">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Telefono / Celular *</label>
										  	<input pattern="[0-9]{1,10}" maxlength="10"   oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" type="text" name="telefono" value="<?php echo $rows['Telefono']; ?>" required="">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Tipo de Usuario *</label>
											  <select class="form-control" name="tipousu">
												
												<option value="1" <?php if($rows['Tipo'] == '1') echo 'selected'; ?>>Socio</option>
												<option value="2" <?php if($rows['Tipo'] == '2') echo 'selected'; ?>>Representante</option>
												<option value="3" <?php if($rows['Tipo'] == '3') echo 'selected'; ?>>Trabajador</option>
											  </select>
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Nivel de Estudios *</label>
											<select class="form-control" name="nivel" id="">
												<option value="Inicial" <?php if($rows['Nivel'] == 'Inicial') echo 'selected'; ?>>Educación Inicial</option>
												<option value="Primaria" <?php if($rows['Nivel'] == 'Primaria') echo 'selected'; ?>>Educación General Básica (Primaria)</option>
												<option value="Secundaria" <?php if($rows['Nivel'] == 'Secundaria') echo 'selected'; ?>>Bachillerato General Unificado (Secundaria)</option>
												<option value="TercerNivel" <?php if($rows['Nivel'] == 'TercerNivel') echo 'selected'; ?>>Educación Superior (Tercer Nivel)</option>
												<option value="Postgrado" <?php if($rows['Nivel'] == 'Postgrado') echo 'selected'; ?>>Postgrado</option>
											</select>
										</div>
									</div>

									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Provincia *</label>
											<select class="form-control" name="provincia" id="">
												<option value="Azuay" <?php if($rows['Provincia'] == 'Azuay') echo 'selected'; ?>>Azuay</option>
												<option value="Bolívar" <?php if($rows['Provincia'] == 'Bolívar') echo 'selected'; ?>>Bolívar</option>
												<option value="Cañar" <?php if($rows['Provincia'] == 'Cañar') echo 'selected'; ?>>Cañar</option>
												<option value="Carchi" <?php if($rows['Provincia'] == 'Carchi') echo 'selected'; ?>>Carchi</option>
												<option value="Chimborazo" <?php if($rows['Provincia'] == 'Chimborazo') echo 'selected'; ?>>Chimborazo</option>
												<option value="Cotopaxi" <?php if($rows['Provincia'] == 'Cotopaxi') echo 'selected'; ?>>Cotopaxi</option>
												<option value="El Oro" <?php if($rows['Provincia'] == 'El Oro') echo 'selected'; ?>>El Oro</option>
												<option value="Esmeraldas" <?php if($rows['Provincia'] == 'Esmeraldas') echo 'selected'; ?>>Esmeraldas</option>
												<option value="Galápagos" <?php if($rows['Provincia'] == 'Galápagos') echo 'selected'; ?>>Galápagos</option>
												<option value="Guayas" <?php if($rows['Provincia'] == 'Guayas') echo 'selected'; ?>>Guayas</option>
												<option value="Imbabura" <?php if($rows['Provincia'] == 'Imbabura') echo 'selected'; ?>>Imbabura</option>
												<option value="Loja" <?php if($rows['Provincia'] == 'Loja') echo 'selected'; ?>>Loja</option>
												<option value="Los Ríos" <?php if($rows['Provincia'] == 'Los Ríos') echo 'selected'; ?>>Los Ríos</option>
												<option value="Manabí" <?php if($rows['Provincia'] == 'Manabí') echo 'selected'; ?>>Manabí</option>
												<option value="Morona Santiago" <?php if($rows['Provincia'] == 'Morona Santiago') echo 'selected'; ?>>Morona Santiago</option>
												<option value="Napo" <?php if($rows['Provincia'] == 'Napo') echo 'selected'; ?>>Napo</option>
												<option value="Orellana" <?php if($rows['Provincia'] == 'Orellana') echo 'selected'; ?>>Orellana</option>
												<option value="Pastaza" <?php if($rows['Provincia'] == 'Pastaza') echo 'selected'; ?>>Pastaza</option>
												<option value="Pichincha" <?php if($rows['Provincia'] == 'Pichincha') echo 'selected'; ?>>Pichincha</option>
												<option value="Santa Elena" <?php if($rows['Provincia'] == 'Santa Elena') echo 'selected'; ?>>Santa Elena</option>
												<option value="Santo Domingo de los Tsáchilas" <?php if($rows['Provincia'] == 'Santo Domingo de los Tsáchilas') echo 'selected'; ?>>Santo Domingo de los Tsáchilas</option>
												<option value="Sucumbíos" <?php if($rows['Provincia'] == 'Sucumbíos') echo 'selected'; ?>>Sucumbíos</option>
												<option value="Tungurahua" <?php if($rows['Provincia'] == 'Tungurahua') echo 'selected'; ?>>Tungurahua</option>
												<option value="Zamora Chinchipe" <?php if($rows['Provincia'] == 'Zamora Chinchipe') echo 'selected'; ?>>Zamora Chinchipe</option>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Actividad Económica *</label>
											<select class="form-control" name="actividad" id="" >
												<option value="Agricultura" <?php if($rows['Actividad'] == 'Agricultura') echo 'selected'; ?>>Agricultura</option>
												<option value="Ganadería" <?php if($rows['Actividad'] == 'Ganadería') echo 'selected'; ?>>Ganadería</option>
												<option value="Pesca" <?php if($rows['Actividad'] == 'Pesca') echo 'selected'; ?>>Pesca</option>
												<option value="Silvicultura" <?php if($rows['Actividad'] == 'Silvicultura') echo 'selected'; ?>>Silvicultura</option>
												<option value="Minería" <?php if($rows['Actividad'] == 'Minería') echo 'selected'; ?>>Minería</option>
												<option value="Petróleo y Gas" <?php if($rows['Actividad'] == 'Petróleo y Gas') echo 'selected'; ?>>Petróleo y Gas</option>
												<option value="Industria Manufacturera" <?php if($rows['Actividad'] == 'Industria Manufacturera') echo 'selected'; ?>>Industria Manufacturera</option>
												<option value="Construcción" <?php if($rows['Actividad'] == 'Construcción') echo 'selected'; ?>>Construcción</option>
												<option value="Comercio" <?php if($rows['Actividad'] == 'Comercio') echo 'selected'; ?>>Comercio</option>
												<option value="Servicios" <?php if($rows['Actividad'] == 'Servicios') echo 'selected'; ?>>Servicios</option>
												<option value="Turismo" <?php if($rows['Actividad'] == 'Turismo') echo 'selected'; ?>>Turismo</option>
												<option value="Tecnología e Informática" <?php if($rows['Actividad'] == 'Tecnología e Informática') echo 'selected'; ?>>Tecnología e Informática</option>
												<option value="Educación" <?php if($rows['Actividad'] == 'Educación') echo 'selected'; ?>>Educación</option>
												<option value="Salud" <?php if($rows['Actividad'] == 'Salud') echo 'selected'; ?>>Salud</option>
												<option value="Artes y Entretenimiento" <?php if($rows['Actividad'] == 'Artes y Entretenimiento') echo 'selected'; ?>>Artes y Entretenimiento</option>
												<option value="Transporte y Logística" <?php if($rows['Actividad'] == 'Transporte y Logística') echo 'selected'; ?>>Transporte y Logística</option>
												<option value="Finanzas y Banca" <?php if($rows['Actividad'] == 'Finanzas y Banca') echo 'selected'; ?>>Finanzas y Banca</option>
												<option value="Administración Pública" <?php if($rows['Actividad'] == 'Administración Pública') echo 'selected'; ?>>Administración Pública</option>
											</select>
										</div>
									</div>

									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Grupo Étnico *</label>
											<select class="form-control" name="etnia" id="" >
												<option value="Mestizo" <?php if($rows['Etnia'] == 'Mestizo') echo 'selected'; ?>>Mestizo</option>
												<option value="Indígena" <?php if($rows['Etnia'] == 'Indígena') echo 'selected'; ?>>Indígena</option>
												<option value="Afroecuatoriano" <?php if($rows['Etnia'] == 'Afroecuatoriano') echo 'selected'; ?>>Afroecuatoriano</option>
												<option value="Blanco" <?php if($rows['Etnia'] == 'Blanco') echo 'selected'; ?>>Blanco</option>
												<option value="Montuvio" <?php if($rows['Etnia'] == 'Montuvio') echo 'selected'; ?>>Montuvio</option>
												<option value="Negro" <?php if($rows['Etnia'] == 'Negro') echo 'selected'; ?>>Negro</option>
												<option value="Mulato" <?php if($rows['Etnia'] == 'Mulato') echo 'selected'; ?>>Mulato</option>
												<option value="Asiático" <?php if($rows['Etnia'] == 'Asiático') echo 'selected'; ?>>Asiático</option>
												<option value="Otro" <?php if($rows['Etnia'] == 'Otro') echo 'selected'; ?>>Otro</option>
											</select>
										</div>
									</div>
				    			</div>
				    		</div>
				    	</fieldset>
					    <p class="text-center">
					    	<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Guardar cambios</button>
					    </p>
				    </form>
			  	</div>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
	<p class="lead text-center">Lo sentimos ocurrió un error inesperado</p>
<?php
		endif;

?>