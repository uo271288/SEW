<?php
    class BaseDatos{
        private $servername;
        private $username;
        private $password;
        private $database;

        public function __construct(){
            $this->servername = "localhost";
            $this->username = "DBUSER2020";
            $this->password = "DBPSWD2020";
            $this->database = "curso";
        }

        public function crearBaseDeDatos(){
            $transacc = new mysqli($this->servername,$this->username,$this->password);
            $consulta = "CREATE DATABASE IF NOT EXISTS curso COLLATE utf8_spanish_ci";
            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la base de datos 'curso'</p>";
            else {
                echo "<p id=\"confirm\">La base de datos ya existe o no se ha podido crear</p>";
                exit();
            }
            $transacc->close();
        }

        public function crearTabla(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);

            $consulta = "CREATE TABLE IF NOT EXISTS alumno (
                        id INT NOT NULL AUTO_INCREMENT,
                        nombre VARCHAR(200),
                        edad INT,
                        PRIMARY KEY (id))";

            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la tabla 'alumno'</p>";
            else {
                echo "<p id=\"confirm\">La tabla ya existe o no se ha podido crear</p>";
                exit();
            }

            $consulta = "CREATE TABLE IF NOT EXISTS materia (
                        id INT NOT NULL AUTO_INCREMENT,
                        nombre VARCHAR(200),
                        departamento VARCHAR(200),
                        PRIMARY KEY (id))";

            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la tabla 'materia'</p>";
            else {
                echo "<p id=\"confirm\">La tabla ya existe o no se ha podido crear</p>";
                exit();
            }

			$consulta = "CREATE TABLE IF NOT EXISTS asistencia (
                        id INT NOT NULL AUTO_INCREMENT,
                        nota INT,
						            id_alumno INT,
                        id_materia INT,
                        PRIMARY KEY (id),
                        FOREIGN KEY (id_alumno) REFERENCES alumno(id),
						            FOREIGN KEY (id_materia) REFERENCES materia(id))";

            if($transacc->query($consulta) === TRUE)
                echo "<p id=\"confirm\">Se ha creado la tabla 'asistencia'</p>";
            else {
                echo "<p id=\"confirm\">La tabla ya existe o no se ha podido crear</p>";
                exit();
            }

            $transacc->close();
        }

        public function insertarAlumno(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consultaInsercion = $transacc->prepare("INSERT INTO alumno (nombre,edad) VALUES (?,?)");
            if ((empty($_POST['nombrea']) ||empty($_POST['edad'])))
                echo "<p id=\"confirm\">No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consultaInsercion->bind_param('si',
                    $_POST["nombrea"],$_POST["edad"]);
                $consultaInsercion->execute();
                echo "<p id=\"confirm\">Inserción realizada correctamente</p>";
                $consultaInsercion->close();
            }
            $transacc->close();
        }

        public function insertarMateria(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consultaInsercion = $transacc->prepare("INSERT INTO materia (nombre,departamento) VALUES (?,?)");
            if ((empty($_POST['nombrem']) ||empty($_POST['departamento'])))
                echo "<p id=\"confirm\">No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consultaInsercion->bind_param('ss',
                    $_POST["nombrem"],$_POST["departamento"]);
                $consultaInsercion->execute();
                echo "<p id=\"confirm\">Inserción realizada correctamente</p>";
                $consultaInsercion->close();
            }
            $transacc->close();
        }

        public function insertarAsistencia(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consultaInsercion = $transacc->prepare("INSERT INTO asistencia (nota,id_alumno,id_materia)
				VALUES (?,?,?)");
            if (empty($_POST['nota']) || empty($_POST['idalumno'])|| empty($_POST['idmateria']))
                echo "<p id=\"confirm\">No se puede realizar la inserción, faltan campos por completar</p>";
            else {
                $consultaInsercion->bind_param('iii',
                    $_POST["nota"],$_POST["idalumno"],$_POST["idmateria"]);
                $consultaInsercion->execute();
                echo "<p id=\"confirm\">Inserción realizada correctamente</p>";
                $consultaInsercion->close();
            }
            $transacc->close();
        }

        public function buscarAlumno(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consulta = $transacc->prepare("SELECT * FROM alumno");
            $consulta->execute();
            $resultado = $consulta->get_result();
            if ($resultado->num_rows >= 1) {
                echo "<h2>Datos de los alumnos:</h2>";
                echo "<ul>";
                while($row = $resultado->fetch_assoc()) {
					echo "<li>Nombre del alumno: " . $row["nombre"] . "</li>";
                    echo "<li>Edad del alumno: " . $row["edad"] . "</li><br>";
                }
                echo "</ul><br><br>";
            }
            $consulta->close();
            $transacc->close();
        }

        public function buscarMateria(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consulta = $transacc->prepare("SELECT * FROM materia");
            $consulta->execute();
            $resultado = $consulta->get_result();
            if ($resultado->num_rows >= 1) {
                echo "<h2>Datos de las materias:</h2>";
                echo "<ul>";
                while($row = $resultado->fetch_assoc()) {
					echo "<li>Nombre de la materia: " . $row["nombre"] . "</li>";
                    echo "<li>Departamento de la materia: " . $row["departamento"] . "</li><br>";
                }
                echo "</ul><br><br>";
            }
            $consulta->close();
            $transacc->close();
        }

        public function buscarAsistencia(){
            $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
            $consulta = $transacc->prepare("SELECT * FROM asistencia");
            $consulta->execute();
            $resultado = $consulta->get_result();
            if ($resultado->num_rows >= 1) {
                echo "<h2>Datos de la asistencia:</h2>";
                echo "<ul>";
                while($row = $resultado->fetch_assoc()) {
					             echo "<li>Nota: " . $row["nota"] . "</li>";
                       echo "<li>Id del alumno: " . $row["id_alumno"] . "</li>";
					             echo "<li>Id de la materia: " . $row["id_materia"] . "</li>";
                }
                echo "</ul><br><br>";
            }
            $consulta->close();
            $transacc->close();
        }

        public function borrarAlumno(){
            if (empty($_POST['id']) )
                echo "<p id=\"confirm\">Introduzca id del alumno</p>";
            else{
                $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
                $consulta = $transacc->prepare("DELETE FROM alumno WHERE id=?");
                $consulta->bind_param('i', $_POST["id"]);
                $consulta->execute();
                $consulta->close();
                echo "<p id=\"confirm\">Eliminación realizada correctamente</p>";
                $transacc->close();
            }
        }

		public function borrarMateria(){
            if (empty($_POST['id']) )
                echo "<p id=\"confirm\">Introduzca id de la materia</p>";
            else{
                $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
                $consulta = $transacc->prepare("DELETE FROM materia WHERE id=?");
                $consulta->bind_param('i', $_POST["id"]);
                $consulta->execute();
                $consulta->close();
                echo "<p id=\"confirm\">Eliminación realizada correctamente</p>";
                $transacc->close();
            }
        }

		public function borrarAsistencia(){
            if (empty($_POST['id']) )
                echo "<p id=\"confirm\">Introduzca id de la asistencia</p>";
            else{
                $transacc = new mysqli($this->servername,$this->username,$this->password,$this->database);
                $consulta = $transacc->prepare("DELETE FROM asistencia WHERE id=?");
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
					$consultaInsercion = $transacc->prepare("INSERT INTO alumno VALUES (?,?,?)");
					$consultaInsercion->bind_param('isi',
						 $datos[0],$datos[1],$datos[2]);
					$consultaInsercion->execute();
				}
				elseif($a2 == 2){
					$consultaInsercion = $transacc->prepare("INSERT INTO materia VALUES (?,?,?)");
					$consultaInsercion->bind_param('iss',
						 $datos[0],$datos[1],$datos[2]);
					$consultaInsercion->execute();
				}
				else {
					$consultaInsercion = $transacc->prepare("INSERT INTO asistencia VALUES (?,?,?,?)");
					$consultaInsercion->bind_param('iiii',
						 $datos[0],$datos[1], $datos[2], $datos[3]);
					$consultaInsercion->execute();
				}
            }
            $consultaInsercion->close();
            echo "<p id=\"confirm\">Datos cargados correctamente</p>";
        }

	}
?>
