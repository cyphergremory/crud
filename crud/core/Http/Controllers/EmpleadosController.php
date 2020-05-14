<?php
namespace Core\Http\Controllers;
require "{$_SERVER['DOCUMENT_ROOT']}/crud/vendor/autoload.php";
use Model\Empleados;
class EmpleadosController
{
    public function __construct()
    {
        var_dump( "{$_SERVER['DOCUMENT_ROOT']}/crud/vendor/autoload.php");
    }

    public function registro()
    {

    }

}

if(isset($_POST['register'])){

    $datos =[
        'name' => $_POST['name'],
        'surname' =>  $_POST['surname'],
        'position' => $_POST['position'],
        'salary' => $_POST['salary']
    ];

    $respuesta = (new Empleados)->register($datos);

    echo json_encode($respuesta);
}

if(isset($_POST['select'])) {
    $respuesta = (new Empleados)->select();

    echo json_encode($respuesta);
}

if(isset($_POST['delete'])){
    $respuesta =(new Empleados)->delete($_POST['id']);
    echo json_encode($respuesta);
}

if(isset($_POST['update'])){
    $datos =[
        'name' => $_POST['name'],
        'surname' =>  $_POST['surname'],
        'position' => $_POST['position'],
        'salary' => $_POST['salary'],
        'id' => $_POST['id']
    ];

    $respuesta =  (new Empleados)->update($datos);

    echo json_encode($respuesta);

}

if(isset($_POST['find'])){
    $respuesta =  (new Empleados)->selectId($_POST['id']);

    echo json_encode($respuesta);
}
