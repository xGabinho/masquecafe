<?php
if(isset($_POST['btn_registrar'])){
    include "conexion.php";
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    if($password == $Cpassword){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $nacimiento = $_POST['nacimiento'];
        $rol = $_POST['rol'];
        $ciudad = $_POST['ciudad'];
        $genero = $_POST['genero'];
        $correo = $_POST['correo'];
        $encript = md5($password);

        $query = "INSERT INTO `clientes` (`nombre`, `apellidos`, `nacimiento`, `rol`, `ciudad`, `genero`, `correo`, `clave`) VALUES 
        ('$nombre', '$apellidos', '$nacimiento', '$rol', '$ciudad', '$genero', '$correo', '$encript');";

        $registrar = mysqli_query($conexion,$query);

        echo"<script>alert('Registro exitoso');</script>";
        echo"<script>window.location='login.php';</script>";
    }else{
        echo"<script>alert('Las contraseñas no coinciden');</script>";
        echo"<script>window.location='registrar.php';</script>";
    }
}
?>