<?php
    class BaseDatos{
        private $servername;
        private $username;
        private $password;
        private $database;

        public function __construct(){
            $this->servername = "localhost";
            $this->username = "DBUSER2018";
            $this->password = "DBPSWD2018";
            $this->database = "personal_uniovi";
        }

        public function crearBaseDeDatos(){            
            $transacc = new mysqli($this->servername,$this->username,$this->password);            
            $consulta = "CREATE DATABASE IF NOT EXISTS personal_uniovi COLLATE utf8_spanish_ci";
            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la base de datos 'personal_uniovi'</p>";
            else { 
                echo "<p id=\"confirm\">La base de datos ya existe o no se ha podido crear</p>";
                exit();
            } 
            $transacc->close();  
        }

        public function crearTabla(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);

            $consulta = "CREATE TABLE IF NOT EXISTS departamento (
                        id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(200), ubicacion VARCHAR(200),
                        PRIMARY KEY (id))";

            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la tabla 'DEPARTAMENTO'</p>";
            else { 
                echo "<p id=\"confirm\">La tabla ya existe o no se ha podido crear</p>";
                exit();
            }			
			
            $consulta = "CREATE TABLE IF NOT EXISTS centro (
                        id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(200), ubicacion VARCHAR(200),
                        PRIMARY KEY (id))";

            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la tabla 'CENTRO'</p>";
            else { 
                echo "<p id=\"confirm\">La tabla ya existe o no se ha podido crear</p>";
                exit();
            }	
			
			$consulta = "CREATE TABLE IF NOT EXISTS empleado (
                        id INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(200), apellidos VARCHAR(200),
						dni VARCHAR(30), edad INT, sexo VARCHAR(30),
						id_departamento INT, id_centro INT,
                        PRIMARY KEY (id),FOREIGN KEY (id_departamento) REFERENCES departamento(id),
						FOREIGN KEY (id_centro) REFERENCES centro(id))";

            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la tabla 'EMPLEADO'</p>";
            else { 
                echo "<p id=\"confirm\">La tabla ya existe o no se ha podido crear</p>";
                exit();
            }
			
            $transacc->close();
        }

        public function insertarCentro(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consultaInsercion = $transacc->prepare("INSERT INTO centro (nombre,ubicacion) VALUES (?,?)"); 
            if ((empty($_POST['nombrec']) ||empty($_POST['ubicacionc'])))
                echo "<p id=\"confirm\">No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consultaInsercion->bind_param('ss', 
                    $_POST["nombrec"],$_POST["ubicacionc"]);
                $consultaInsercion->execute();
                echo "<p id=\"confirm\">Inserción realizada correctamente</p>";
                $consultaInsercion->close();
            }
            $transacc->close();
        }
		
        public function insertarDepartamento(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consultaInsercion = $transacc->prepare("INSERT INTO departamento (nombre,ubicacion) VALUES (?,?)"); 
            if ((empty($_POST['nombred']) ||empty($_POST['ubicaciond'])))
                echo "<p id=\"confirm\">No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consultaInsercion->bind_param('ss', 
                    $_POST["nombred"],$_POST["ubicaciond"]);
                $consultaInsercion->execute();
                echo "<p id=\"confirm\">Inserción realizada correctamente</p>";
                $consultaInsercion->close();
            }
            $transacc->close();
        }	

        public function insertarDocente(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consultaInsercion = $transacc->prepare("INSERT INTO empleado (nombre,apellidos,dni,edad,sexo,id_departamento,id_centro)
				VALUES (?,?,?,?,?,?,?)"); 
            if ((empty($_POST['nombrep']) || empty($_POST['apellidosp'])|| empty($_POST['dnip'])|| empty($_POST['edadp'])
				|| empty($_POST['sexop'])|| empty($_POST['dptop'])|| empty($_POST['centrop'])))
                echo "<p id=\"confirm\">No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consultaInsercion->bind_param('sssisii', 
                    $_POST["nombrep"],$_POST["apellidosp"],$_POST["dnip"],$_POST["edadp"],$_POST["sexop"],$_POST["dptop"],$_POST["centrop"]);
                $consultaInsercion->execute();
                echo "<p id=\"confirm\">Inserción realizada correctamente</p>";
                $consultaInsercion->close();
            }
            $transacc->close();
        }			

        public function buscarDatosCentro(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consulta = $transacc->prepare("SELECT * FROM centro");
            $consulta->execute(); 
            $resultado = $consulta->get_result();
            if ($resultado->num_rows >= 1) {
                echo "<h2>Datos de centros:</h2>";
                echo "<ul>";
                while($row = $resultado->fetch_assoc()) {
					echo "<li>Nombre del centro: " . $row["nombre"] . "</li>";
                    echo "<li>Ubicacion del centro: " . $row["ubicacion"] . "</li><br>";
                }
                echo "</ul><br><br>";
            }
            $consulta->close();
            $transacc->close();
        }
		
        public function buscarDatosDepartamento(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consulta = $transacc->prepare("SELECT * FROM departamento");
            $consulta->execute(); 
            $resultado = $consulta->get_result();
            if ($resultado->num_rows >= 1) {
                echo "<h2>Datos de departamentos:</h2>";
                echo "<ul>";
                while($row = $resultado->fetch_assoc()) {
					echo "<li>Nombre del departamento: " . $row["nombre"] . "</li>";
                    echo "<li>Ubicacion del departamento: " . $row["ubicacion"] . "</li><br>";
                }
                echo "</ul><br><br>";
            }
            $consulta->close();
            $transacc->close();
        }

        public function buscarDatosDocente(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consulta = $transacc->prepare("SELECT * FROM empleado");
            $consulta->execute(); 
            $resultado = $consulta->get_result();
            if ($resultado->num_rows >= 1) {
                echo "<h2>Datos de empleados:</h2>";
                echo "<ul>";
                while($row = $resultado->fetch_assoc()) {
					echo "<li>Nombre del empleado: " . $row["nombre"] . "</li>";
                    echo "<li>Apellido del empleado: " . $row["apellidos"] . "</li>";
					echo "<li>Dni  del empleado: " . $row["dni"] . "</li>";
					echo "<li>Edad del empleado: " . $row["edad"] . "</li>";
                    echo "<li>Sexo del empleado: " . $row["sexo"] . "</li>";
					echo "<li>Departamento asociado: " . $row["id_departamento"] . "</li>";
                    echo "<li>Centro asociado: " . $row["id_centro"] . "</li><br>";
                }
                echo "</ul><br><br>";
            }
            $consulta->close();
            $transacc->close();
        }
		
        public function borrarDatosCentro(){
            if (empty($_POST['id']) )
                echo "<p id=\"confirm\">Introduzca id</p>";
            else{
                $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
                $consulta = $transacc->prepare("DELETE FROM centro WHERE id=?"); 
                $consulta->bind_param('i', $_POST["id"]); 
                $consulta->execute();
                $consulta->close();
                echo "<p id=\"confirm\">Eliminación realizada correctamente</p>";
                $transacc->close();
            }
        }
		
		public function borrarDatosDepartamento(){
            if (empty($_POST['id']) )
                echo "<p id=\"confirm\">Introduzca id</p>";
            else{
                $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
                $consulta = $transacc->prepare("DELETE FROM departamento WHERE id=?"); 
                $consulta->bind_param('i', $_POST["id"]); 
                $consulta->execute();
                $consulta->close();
                echo "<p id=\"confirm\">Eliminación realizada correctamente</p>";
                $transacc->close();
            }
        }
		
		public function borrarDatosDocente(){
            if (empty($_POST['id']) )
                echo "<p id=\"confirm\">Introduzca id</p>";
            else{
                $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
                $consulta = $transacc->prepare("DELETE FROM empleado WHERE id=?"); 
                $consulta->bind_param('i', $_POST["id"]); 
                $consulta->execute();
                $consulta->close();
                echo "<p id=\"confirm\">Eliminación realizada correctamente</p>";
                $transacc->close();
            }
        }
		
		public function cargarDatos($a1,$a2){            
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $archivo = fopen($a1, "r");            
            while(($datos = fgetcsv($archivo,",")) == true){
				if($a2 == 1){
					$consultaInsercion = $transacc->prepare("INSERT INTO centro VALUES (?,?,?)"); 
					$consultaInsercion->bind_param('iss', 
						 $datos[0],$datos[1],$datos[2]);
					$consultaInsercion->execute();
				}
				elseif($a2 == 2){
					$consultaInsercion = $transacc->prepare("INSERT INTO departamento VALUES (?,?,?)"); 
					$consultaInsercion->bind_param('iss', 
						 $datos[0],$datos[1],$datos[2]);
					$consultaInsercion->execute();	
				}
				else {
					$consultaInsercion = $transacc->prepare("INSERT INTO empleado VALUES (?,?,?,?,?,?,?,?)"); 
					$consultaInsercion->bind_param('isssisii', 
						 $datos[0],$datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6],$datos[7]);
					$consultaInsercion->execute();
				}
            }
            $consultaInsercion->close();
            echo "<p id=\"confirm\">Datos cargados correctamente</p>";
        }	
		
	}
?>