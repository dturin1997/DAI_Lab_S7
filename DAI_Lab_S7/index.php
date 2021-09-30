<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ejemplo CRUD</title>
    <!-- Se enlace a style.css-->
    <link rel="stylesheet" type="text/css" href="css/estyle_s7.css">
     
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
-->
</head>
<body class="bg-warning">
<center>
    <br>
    <br>
    <div id="form" class="container"> 
        <form method="post">
            <table class="table table-warning table-striped" width="100%" border="1" cellpadding="15">
                <tr>
                    <td>
                        <input type="text" name="año" placeholder="Año" value="<?php if(isset($_GET['edit'])){ echo $getRow['año'];}?>">           
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="autor" placeholder="Autor" value="<?php if(isset($_GET['edit'])){ echo $getRow['autor'];}?>">              
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])){ echo $getRow['titulo'];}?>">              
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="url" placeholder="URL" value="<?php if(isset($_GET['edit'])){ echo $getRow['url'];}?>">              
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="especialidad" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])){ echo $getRow['especialidad'];}?>">              
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="editorial" placeholder="Editorial" value="<?php if(isset($_GET['edit'])){ echo $getRow['editorial'];}?>">              
                    </td>
                </tr>
                <tr>
                    <td>
                       <?php
                            if(isset($_GET['edit'])){
                                ?><!-- Se fraccionó el codigo-->
                                <button class="btn btn-primary" type="submit" name="update">Editar</button>
                                <?php
                            }else{
                                ?>
                                <button class="btn btn-primary" type="submit" name="save">Registrar</button>
                                <?php
                            }
                       ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="container">    
        <br><br>
        <table class="table table-success table-striped" border="1" cellpadding="15">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Año</th>
            <th scope="col">Autor</th>
            <th scope="col">Titulo</th>
            <th scope="col">URL</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Editorial</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
            <?php
            $res=$MySQLiconn->query("SELECT * FROM libros");
            while($row=$res->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['año']; ?></td>
                    <td><?php echo $row['autor']; ?></td>
                    <td id="titulo"><?php echo $row['titulo']; ?></td>
                    <td><a href="<?php echo $row['url']; ?>" target="_blank">Leer Libro</a></td>
                    <td><?php echo $row['especialidad']; ?></td>
                    <td><?php echo $row['editorial']; ?></td>
                    <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</center>    
</body>
</html>