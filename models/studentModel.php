<?php
	if($actionsRequired){
		require_once "../core/mainModel.php";
	}else{ 
		require_once "./core/mainModel.php";
	}

	class studentModel extends mainModel{

		/*----------  Add Student Model  ----------*/
		public function add_student_model($data){
			$query=self::connect()->prepare("INSERT INTO estudiante(Codigo,Nombres,Apellidos,Email,Cedula,Telefono,Tipo,Nivel,Provincia,Actividad,Etnia) VALUES(:Codigo,:Nombres,:Apellidos,:Email,:Cedula,:Telefono,:Tipo,:Nivel,:Provincia,:Actividad,:Etnia)");
			$query->bindParam(":Codigo",$data['Codigo']);
			$query->bindParam(":Nombres",$data['Nombres']);
			$query->bindParam(":Apellidos",$data['Apellidos']);
			$query->bindParam(":Email",$data['Email']);
			$query->bindParam(":Cedula",$data['Cedula']);
			$query->bindParam(":Telefono",$data['Telefono']);
			$query->bindParam(":Tipo",$data['Tipousu']);
			$query->bindParam(":Nivel",$data['Nivel']);
			$query->bindParam(":Provincia",$data['Provincia']);
			$query->bindParam(":Actividad",$data['Actividad']);
			$query->bindParam(":Etnia",$data['Etnia']);
			$query->execute();
			return $query;
		}


		/*----------  Data Student Model  ----------*/
		public function data_student_model($data){
			if($data['Tipo']=="Count"){
				$query=self::connect()->prepare("SELECT Codigo FROM estudiante");
			}elseif($data['Tipo']=="Only"){
				$query=self::connect()->prepare("SELECT * FROM estudiante WHERE Codigo=:Codigo");
				$query->bindParam(":Codigo",$data['Codigo']);
			}
			$query->execute();
			return $query;
		}


		/*----------  Delete Student Model  ----------*/
		public function delete_student_model($code){
			$query=self::connect()->prepare("DELETE FROM estudiante WHERE Codigo=:Codigo");
			$query->bindParam(":Codigo",$code);
			$query->execute();
			return $query;
		}


		/*----------  Update Student Model  ----------*/
		public function update_student_model($data){
			$query=self::connect()->prepare("UPDATE estudiante SET Nombres=:Nombres,Apellidos=:Apellidos,Email=:Email,Cedula=:Cedula,Telefono=:Telefono,Tipo=:Tipo,Nivel=:Nivel,Provincia=:Provincia,Actividad=:Actividad,Etnia=:Etnia WHERE Codigo=:Codigo");
			$query->bindParam(":Nombres",$data['Nombres']);
			$query->bindParam(":Apellidos",$data['Apellidos']);
			$query->bindParam(":Email",$data['Email']);
			$query->bindParam(":Cedula",$data['Cedula']);
			$query->bindParam(":Telefono",$data['Telefono']);
			$query->bindParam(":Tipo",$data['Tipousu']);
			$query->bindParam(":Codigo",$data['Codigo']);
			$query->bindParam(":Nivel",$data['Nivel']);
			$query->bindParam(":Provincia",$data['Provincia']);
			$query->bindParam(":Actividad",$data['Actividad']);
			$query->bindParam(":Etnia",$data['Etnia']);
			$query->execute();
			return $query;
		}
	}