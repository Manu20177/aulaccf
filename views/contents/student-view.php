<?php if($_SESSION['userType']=="Administrador"): ?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Usuarios <small>(Estudiantes)</small></h1>
	</div>
	<p class="lead">
		Bienvenido a la sección de estudiantes, aquí podrás registrar nuevos estudiantes (Los campos marcados con * son obligatorios para registrar un estudiante).
	</p>
</div>
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li class="active">
	  	<a href="<?php echo SERVERURL; ?>student/" class="btn btn-info">
	  		<i class="zmdi zmdi-plus"></i> Nuevo
	  	</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>studentlist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> Lista
	  		</a>
	  	</li>
	</ul>
</div>
<?php 
	require_once "./controllers/studentController.php";

	$insStudent = new studentController();

	if(isset($_POST['name']) && isset($_POST['username'])){
		echo $insStudent->add_student_controller();
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
				    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> Nuevo Estudiante</h3>
				</div>
			  	<div class="panel-body">
				    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> Datos personales</legend><br>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Cédula *</label>
										  	<input pattern="[0-9]{1,10}" maxlength="10"   oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" type="text" name="cedula" value="<?php if(isset($_POST['cedula'])){ echo $_POST['cedula']; } ?>" required="">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Email</label>
										  	<input class="form-control" type="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Telefono / Celular *</label>
										  	<input pattern="[0-9]{1,10}" maxlength="10"   oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" type="text" name="telefono" value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; } ?>" required="">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Tipo de Usuario *</label>
											<select class="form-control" name="tipousu" id="" >
												<option value="1">Socio</option>
												<option value="2">Representante</option>
												<option value="3">Trabajador</option>
											</select>
										</div>
				    				</div>

									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nivel de Estudios *</label>
											<select class="form-control" name="nivel" id="" >
												<option value="Inicial">Educación Inicial</option>
												<option value="Primaria">Educación General Básica (Primaria)</option>
												<option value="Secundaria">Bachillerato General Unificado (Secundaria)</option>
												<option value="TercerNivel">Educación Superior (Tercer Nivel)</option>
												<option value="Postgrado">Postgrado</option>
											</select>
										</div>
				    				</div>

									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Provincia *</label>
											<select class="form-control" name="provincia" id="" >
												<option value="Azuay">Azuay</option>
												<option value="Bolívar">Bolívar</option>
												<option value="Cañar">Cañar</option>
												<option value="Carchi">Carchi</option>
												<option value="Chimborazo">Chimborazo</option>
												<option value="Cotopaxi">Cotopaxi</option>
												<option value="El Oro">El Oro</option>
												<option value="Esmeraldas">Esmeraldas</option>
												<option value="Galápagos">Galápagos</option>
												<option value="Guayas">Guayas</option>
												<option value="Imbabura">Imbabura</option>
												<option value="Loja">Loja</option>
												<option value="Los Ríos">Los Ríos</option>
												<option value="Manabí">Manabí</option>
												<option value="Morona Santiago">Morona Santiago</option>
												<option value="Napo">Napo</option>
												<option value="Orellana">Orellana</option>
												<option value="Pastaza">Pastaza</option>
												<option value="Pichincha">Pichincha</option>
												<option value="Santa Elena">Santa Elena</option>
												<option value="Santo Domingo de los Tsáchilas">Santo Domingo de los Tsáchilas</option>
												<option value="Sucumbíos">Sucumbíos</option>
												<option value="Tungurahua">Tungurahua</option>
												<option value="Zamora Chinchipe">Zamora Chinchipe</option>
											</select>
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Actividad Economica *</label>
											<select class="form-control" name="actividad" id="" >
												<option value="Agricultura">Agricultura</option>
												<option value="Ganadería">Ganadería</option>
												<option value="Pesca">Pesca</option>
												<option value="Silvicultura">Silvicultura</option>
												<option value="Minería">Minería</option>
												<option value="Petróleo y Gas">Petróleo y Gas</option>
												<option value="Industria Manufacturera">Industria Manufacturera</option>
												<option value="Construcción">Construcción</option>
												<option value="Comercio">Comercio</option>
												<option value="Servicios">Servicios</option>
												<option value="Turismo">Turismo</option>
												<option value="Tecnología e Informática">Tecnología e Informática</option>
												<option value="Educación">Educación</option>
												<option value="Salud">Salud</option>
												<option value="Artes y Entretenimiento">Artes y Entretenimiento</option>
												<option value="Transporte y Logística">Transporte y Logística</option>
												<option value="Finanzas y Banca">Finanzas y Banca</option>
												<option value="Administración Pública">Administración Pública</option>
											</select>
										</div>
				    				</div>

									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Grupo Etnico *</label>
											<select class="form-control" name="etnia" id="" >
												<option value="Mestizo">Mestizo</option>
												<option value="Indígena">Indígena</option>
												<option value="Afroecuatoriano">Afroecuatoriano</option>
												<option value="Blanco">Blanco</option>
												<option value="Montuvio">Montuvio</option>
												<option value="Negro">Negro</option>
												<option value="Mulato">Mulato</option>
												<option value="Asiático">Asiático</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
				    				</div>


									
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br><br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-key"></i> Datos de la cuenta</legend><br>
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-sm-6">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Nombre de usuario *</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" required="" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Genero</label>
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="Masculino">Masculino</option>
									          	<option value="Femenino">Femenino</option>
									        </select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Contraseña *</label>
										  	<input class="form-control" type="password" name="password1" value="<?php if(isset($_POST['password1'])){ echo $_POST['password1']; } ?>" required="" maxlength="70">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Repita la contraseña *</label>
										  	<input class="form-control" type="password" name="password2" value="<?php if(isset($_POST['password2'])){ echo $_POST['password2']; } ?>" required="" maxlength="70">
										</div>
				    				</div>
								</div>
							</div>
				    	</fieldset>
					    <p class="text-center">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
				    </form>
			  	</div>
			</div>
		</div>
	</div>
</div>
<?php 
	else:
		$logout2 = new loginController();
        echo $logout2->login_session_force_destroy_controller(); 
	endif;
?>
