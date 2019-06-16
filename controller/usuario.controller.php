<?php
require_once 'model/usuario.php';

class UsuarioController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $usuario = new Usuario();
        if(isset($_REQUEST['idUsuario'])){
            $datos = $this->model->Obtener($_REQUEST['idUsuario'])->datos[0];
            $pedido->idUsuario = $datos->idUsuario;
            $pedido->user = $datos->user;
            $pedido->password = $datos->password;
            $pedido->nombre = $datos->nombre;
            $pedido->apellido = $datos->apellido;
            $pedido->telefono = $datos->telefono;
            $pedido->claveApi = $datos->claveApi;
            $pedido->idTrabajador = $datos->idTrabajador;
        }

        require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
       $usuario = new Usuario();

       $idUsuario = $_REQUEST['idUsuario'];
       $pedido->user = $_REQUEST['user'];
       $pedido->password = $_REQUEST['password'];
       $pedido->nombre = $_REQUEST['nombre'];
       $pedido->apellido = $_REQUEST['apellido'];
       $pedido->telefono = $_REQUEST['telefono'];
       $pedido->claveApi = $_REQUEST['claveApi'];
       $pedido->idTrabajador = $_REQUEST['idTrabajador'];

       $datos_json = json_encode(
        array(
            'user' => $pedido->user,
            'password' => $pedido->password,
            'nombre' => $pedido->nombre,
            'apellido' => $pedido->apellido,
            'telefono' => $pedido->telefono,
            'claveApi' => $pedido->claveApi,
            'idTrabajador' => $pedido->idTrabajador
        )
       );
       $idUsuario > 0
            ? $this->model->Actualizar($datos_json,$idUsuario)
            : $this->model->Registrar($datos_json);
       
       header('Location: index.php');
    }

    public function Eliminar(){
       $this->model->Eliminar($_REQUEST['idUsuario']);
       header('Location: index.php');
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

    //creacion del reporte
    public function Reporte(){
        require_once 'model/reportes.php';
    }
}
