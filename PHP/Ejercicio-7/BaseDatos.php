<?php
class BaseDatos
{
    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "DBUSER2021";
        $this->password = "DBPSWD2021";
        $this->database = "carworkshop";
    }

    public function crearBaseDeDatos()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password);
        $consulta = "CREATE DATABASE IF NOT EXISTS carworkshop COLLATE utf8_spanish_ci";
        if ($transacc->query($consulta) === TRUE)
            echo "<p>Se ha creado la base de datos 'carworkshop'</p>";
        else {
            echo "<p>La base de datos ya existe o no se ha podido crear</p>";
            exit();
        }
        $transacc->close();
    }

    public function crearTabla()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);

        $consulta = "CREATE TABLE IF NOT EXISTS client (
                        id INT NOT NULL AUTO_INCREMENT, dni VARCHAR(200), clientname VARCHAR(200), clientsurname VARCHAR(200),
                        PRIMARY KEY (id), CONSTRAINT dni_unique UNIQUE (dni))";

        if ($transacc->query($consulta) === TRUE)
            echo "<p>Se ha creado la tabla 'client'</p>";
        else {
            echo "<p>La tabla ya existe o no se ha podido crear client</p>";
            exit();
        }

        $consulta = "CREATE TABLE IF NOT EXISTS vehicletype (
            id INT NOT NULL AUTO_INCREMENT, typename VARCHAR(200), priceperhour FLOAT,
            PRIMARY KEY (id), CONSTRAINT typename_unique UNIQUE (typename))";

        if ($transacc->query($consulta) === TRUE)
            echo "<p>Se ha creado la tabla 'vehicletype'</p>";
        else {
            echo "<p>La tabla ya existe o no se ha podido crear vehicletype</p>";
            exit();
        }

        $consulta = "CREATE TABLE IF NOT EXISTS vehicle (
                        id INT NOT NULL AUTO_INCREMENT, platenumber VARCHAR(200), make VARCHAR(200),
                        model VARCHAR(200), client_id INT, vehicletype_id INT,
                        PRIMARY KEY (id), FOREIGN KEY (client_id) REFERENCES client(id), 
                        FOREIGN KEY (vehicletype_id) REFERENCES vehicletype(id),
                        CONSTRAINT platenumber_unique UNIQUE (platenumber))";

        if ($transacc->query($consulta) === TRUE)
            echo "<p>Se ha creado la tabla 'vehicle'</p>";
        else {
            echo "<p>La tabla ya existe o no se ha podido crear vehicle</p>";
            exit();
        }

        $consulta = "CREATE TABLE IF NOT EXISTS workorder (
            id INT NOT NULL AUTO_INCREMENT, vehicle_id INT, workdate DATE,
            workorderdescription VARCHAR(300), amount FLOAT, 
            PRIMARY KEY (id), FOREIGN KEY (vehicle_id) REFERENCES vehicle(id), 
            CONSTRAINT date_vehicle UNIQUE (workdate,vehicle_id))";

        if ($transacc->query($consulta) === TRUE)
            echo "<p>Se ha creado la tabla 'workorder'</p>";
        else {
            echo "<p>La tabla ya existe o no se ha podido crear workorder</p>";
            exit();
        }

        $transacc->close();
    }

    public function insertarCliente()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consultaInsercion = $transacc->prepare("INSERT INTO client (dni, clientname, clientsurname) VALUES (?,?,?)");
        if ((empty($_POST['dni']) || empty($_POST['clientname']) || empty($_POST['clientsurname'])))
            echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
        else {
            $consultaInsercion->bind_param(
                'sss',
                $_POST["dni"],
                $_POST["clientname"],
                $_POST["clientsurname"]
            );
            $consultaInsercion->execute();
            echo "<p>Inserción realizada correctamente</p>";
            $consultaInsercion->close();
        }
        $transacc->close();
    }

    public function insertarVehiculo()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consultaInsercion = $transacc->prepare("INSERT INTO vehicle (platenumber, make, model, client_id, vehicletype_id) VALUES (?,?,?,?,?)");
        if ((empty($_POST['platenumber']) || empty($_POST['make']) || empty($_POST['model'])
            || empty($_POST['client_id']) || empty($_POST['vehicletype_id'])))

            echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
        else {
            $consultaInsercion->bind_param(
                'sssii',
                $_POST["platenumber"],
                $_POST["make"],
                $_POST["model"],
                $_POST["client_id"],
                $_POST["vehicletype_id"]
            );
            $consultaInsercion->execute();
            echo "<p>Inserción realizada correctamente</p>";
            $consultaInsercion->close();
        }
        $transacc->close();
    }

    public function insertarTipoVehiculo()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consultaInsercion = $transacc->prepare("INSERT INTO vehicletype (typename,priceperhour)
				VALUES (?,?)");
        if ((empty($_POST['typename']) || empty($_POST['priceperhour'])))
            echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
        else {
            $consultaInsercion->bind_param(
                'sd',
                $_POST["typename"],
                $_POST["priceperhour"]
            );
            $consultaInsercion->execute();
            echo "<p>Inserción realizada correctamente</p>";
            $consultaInsercion->close();
        }
        $transacc->close();
    }

    public function insertarWorkorder()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consultaInsercion = $transacc->prepare("INSERT INTO workorder (vehicle_id, workdate,
                workorderdescription, amount) VALUES (?,?,?,?)");
        if ((empty($_POST['vehicle_id']) || empty($_POST['workdate']) || empty($_POST['workorderdescription']) || empty($_POST['amount'])))
            echo "<p>No se puede realizar la inserción, faltan campos por completar</p>";
        else {
            $consultaInsercion->bind_param(
                'issd',
                $_POST["vehicle_id"],
                $_POST["workdate"],
                $_POST["workorderdescription"],
                $_POST["amount"]
            );
            $consultaInsercion->execute();
            echo "<p>Inserción realizada correctamente</p>";
            $consultaInsercion->close();
        }
        $transacc->close();
    }

    public function buscarClientes()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consulta = $transacc->prepare("SELECT * FROM client");
        $consulta->execute();
        $resultado = $consulta->get_result();
        if ($resultado->num_rows >= 1) {
            echo "<h2>Datos de clientes:</h2>";
            echo "<ul>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<li>Dni del cliente: " . $row["dni"] . "</li>";
                echo "<li>Nombre del cliente: " . $row["clientname"] . "</li>";
                echo "<li>Apellidos del cliente: " . $row["clientsurname"] . "</li>";
            }
            echo "</ul>";
        }
        $consulta->close();
        $transacc->close();
    }

    public function buscarVehiculos()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consulta = $transacc->prepare("SELECT * FROM vehicle");
        $consulta->execute();
        $resultado = $consulta->get_result();
        if ($resultado->num_rows >= 1) {
            echo "<h2>Datos de vehiculos:</h2>";
            echo "<ul>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<li>Matricula del vehiculo: " . $row["platenumber"] . "</li>";
                echo "<li>Marca del vehiculo: " . $row["make"] . "</li>";
                echo "<li>Modelo del vehiculo: " . $row["model"] . "</li>";
                echo "<li>Propietario del vehiculo: " . $row["client_id"] . "</li>";
                echo "<li>Tipo del vehiculo: " . $row["vehicletype_id"] . "</li>";
            }
            echo "</ul>";
        }
        $consulta->close();
        $transacc->close();
    }

    public function buscarTiposVehiculo()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consulta = $transacc->prepare("SELECT * FROM vehicletype");
        $consulta->execute();
        $resultado = $consulta->get_result();
        if ($resultado->num_rows >= 1) {
            echo "<h2>Datos de tipos de vehiculo:</h2>";
            echo "<ul>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<li>Nombre del tipo de vehiculo: " . $row["typename"] . "</li>";
                echo "<li>Precio por hora en euros: " . $row["priceperhour"] . "</li>";
            }
            echo "</ul>";
        }
        $consulta->close();
        $transacc->close();
    }

    public function buscarWorkorder()
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $consulta = $transacc->prepare("SELECT * FROM workorder");
        $consulta->execute();
        $resultado = $consulta->get_result();
        if ($resultado->num_rows >= 1) {
            echo "<h2>Datos de Workorder:</h2>";
            echo "<ul>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<li>Vehiculo de la workorder: " . $row["vehicle_id"] . "</li>";
                echo "<li>Fecha: " . $row["workdate"] . "</li>";
                echo "<li>Descripción: " . $row["workorderdescription"] . "</li>";
                echo "<li>Coste: " . $row["amount"] . "</li>";
            }
            echo "</ul>";
        }
        $consulta->close();
        $transacc->close();
    }

    public function borrarCliente()
    {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        else {
            $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
            $consulta = $transacc->prepare("DELETE FROM client WHERE id=?");
            $consulta->bind_param('i', $_POST["id"]);
            $consulta->execute();
            $consulta->close();
            echo "<p>Eliminación realizada correctamente</p>";
            $transacc->close();
        }
    }

    public function borrarVehiculo()
    {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        else {
            $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
            $consulta = $transacc->prepare("DELETE FROM vehicle WHERE id=?");
            $consulta->bind_param('i', $_POST["id"]);
            $consulta->execute();
            $consulta->close();
            echo "<p>Eliminación realizada correctamente</p>";
            $transacc->close();
        }
    }

    public function borrarTipoVehiculo()
    {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        else {
            $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
            $consulta = $transacc->prepare("DELETE FROM vehicletype WHERE id=?");
            $consulta->bind_param('i', $_POST["id"]);
            $consulta->execute();
            $consulta->close();
            echo "<p>Eliminación realizada correctamente</p>";
            $transacc->close();
        }
    }

    public function borrarWorkorder()
    {
        if (empty($_POST['id']))
            echo "<p>Introduzca id</p>";
        else {
            $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
            $consulta = $transacc->prepare("DELETE FROM workorder WHERE id=?");
            $consulta->bind_param('i', $_POST["id"]);
            $consulta->execute();
            $consulta->close();
            echo "<p>Eliminación realizada correctamente</p>";
            $transacc->close();
        }
    }

    public function cargarDatos($a1, $a2)
    {
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $archivo = fopen($a1, "r");
        while (($datos = fgetcsv($archivo, ",")) == true) {
            if ($a2 == 1) {
                $consultaInsercion = $transacc->prepare("INSERT INTO client VALUES (?,?,?,?)");
                $consultaInsercion->bind_param(
                    'isss',
                    $datos[0],
                    $datos[1],
                    $datos[2],
                    $datos[3]
                );
                $consultaInsercion->execute();
            } elseif ($a2 == 2) {
                $consultaInsercion = $transacc->prepare("INSERT INTO vehicle VALUES (?,?,?,?,?,?)");
                $consultaInsercion->bind_param(
                    'iissii',
                    $datos[0],
                    $datos[1],
                    $datos[2],
                    $datos[3],
                    $datos[4],
                    $datos[5]
                );
                $consultaInsercion->execute();
            } elseif ($a2 == 3) {
                $consultaInsercion = $transacc->prepare("INSERT INTO vehicletype VALUES (?,?,?)");
                $consultaInsercion->bind_param(
                    'isd',
                    $datos[0],
                    $datos[1],
                    $datos[2]
                );
                $consultaInsercion->execute();
            } elseif ($a2 == 4) {
                $consultaInsercion = $transacc->prepare("INSERT INTO workorder VALUES (?,?,?,?,?)");
                $consultaInsercion->bind_param(
                    'iissd',
                    $datos[0],
                    $datos[1],
                    $datos[2],
                    $datos[3],
                    $datos[4]
                );
                $consultaInsercion->execute();
            }
        }
        $consultaInsercion->close();
        echo "<p>Datos cargados correctamente</p>";
    }
}
