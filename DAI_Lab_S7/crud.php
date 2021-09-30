<?php
include_once 'db.php';  //Llamada de un archivo, 
                        //el one lo carga una vez
/* Codigo para realizar insercion */
if(isset($_POST['save'])){
    $año=$MySQLiconn->real_escape_string($_POST['año']);
    $autor=$MySQLiconn->real_escape_string($_POST['autor']);
    $titulo=$MySQLiconn->real_escape_string($_POST['titulo']);
    $url=$MySQLiconn->real_escape_string($_POST['url']);
    $especialidad=$MySQLiconn->real_escape_string($_POST['especialidad']);
    $editorial=$MySQLiconn->real_escape_string($_POST['editorial']);

    $SQL=$MySQLiconn->query("INSERT INTO libros(año,autor,titulo,url,especialidad,editorial) VALUES('$año','$autor','$titulo','$url','$especialidad','$editorial')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}
/* Codigo para el Delete */
if(isset($_GET['del'])){
    $SQL=$MySQLiconn->query("DELETE FROM libros WHERE id=".$_GET['del']);
    //Enviar cosas por header
    header("Location: index.php");
    
}
/* Codigo para el Update */
//Parte 1
if(isset($_GET['edit'])){
    $SQL=$MySQLiconn->query("SELECT * FROM libros WHERE id=".$_GET['edit']);
    $getRow=$SQL->fetch_array();  
}
//Parte 2
if(isset($_POST['update'])){
    $SQL=$MySQLiconn->query("UPDATE libros SET 
    año='".$_POST['año']."', autor='".$_POST['autor']."', titulo='".$_POST['titulo']."', url='".$_POST['url']."', especialidad='".$_POST['especialidad']."', editorial='".$_POST['editorial']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
?>