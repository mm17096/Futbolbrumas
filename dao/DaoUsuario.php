<?php
require_once("../clases/Usuarios.php");
require_once("../conexion/Conexion.php");
require_once("../dao/DaoJugador.php");
require_once("../helpers/utils.php");

class DaoUsuario
{
    var $Conexion_ID;
    var $Errno = 0;
    var $Error = "";

    function __construct()
    {
        $this->Conexion_ID = new Conexion();
        $this->Conexion_ID = $this->Conexion_ID->getConexion();
    }

    function registroUsuarioRe(Usuario $usu)
    {
        if (!($usu instanceof Usuario)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Usuario";
            return 0;
        }
        //(`idusuario`, `idempleado`, `idrepresentante`, `tipo`, `correo`, `nombre`, `clave`)
        $result = $this->Conexion_ID->query("INSERT INTO `usuario` (`idusuario`, `idempleado`, `idrepresentante`, `tipo`, `correo`, `nombre`, `clave`) 
        VALUES(NULL, NULL,'" . $usu->getIdrepresentante() . "','" . $usu->getTipo() . "','" . $usu->getCorreo() . "','" . $usu->getNombre() . "','" . $usu->getClave() . "')");

        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

    public function loging($user, $pass)
    {
        //SELECT * FROM `usuario` WHERE nombre = 'variable' or correo = 'variable' and clave = 'variable';
        $result = false;
        $consulta = $this->Conexion_ID->query("SELECT * FROM `usuario` WHERE nombre = '$user' OR correo = '$user'");

        if ($consulta && $consulta->num_rows == 1) {
            $usuario = $consulta->fetch_object();
            //VERIFICAR LA CONTRASENIA
            $password = Utils::desencriptacion($usuario->clave);
            if ($pass == $password) {
                $result = $usuario;
            }
            return $result;
        }

        return $result;
    }

    public function UpdateUsuario(Usuario $usu, $imagen)
    {
        if (!($usu instanceof Usuario)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Usuario";
            return 0;
        }
        //(`idusuario`, `idempleado`, `idrepresentante`, `tipo`, `correo`, `nombre`, `clave`)
        $result = $this->Conexion_ID->query("UPDATE `usuario` SET `correo`= '" . $usu->getCorreo() . "',`nombre`= '" . $usu->getNombre() . "',`clave`= '" . $usu->getClave() . "',`imagen`= '$imagen' WHERE `idusuario`= '" . $usu->getIdusuario() . "'");

        if (!$result) {
            return 0;
        } else {
            return 1;
        }
    }

    public function logout()
    {
       Utils::deleteSession('usuario');
       Utils::deleteSession('identidad');
       
       if (isset($_SESSION['usuario'])) {
          unset($_SESSION['usuario']);
       }
       
       if (isset($_SESSION['identidad'])) {
          unset($_SESSION['identidad']);
       }

       echo '<script>window.location="'. base_url .'views/index.php"</script>';
    }
 
}
