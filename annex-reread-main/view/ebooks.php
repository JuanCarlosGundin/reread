<!DOCTYPE html>
<html lang="en">
    <?php
    include '../services/connection.php';
    $filtro1="";
    $filtro2="";
    if(isset($_POST["filtro"])){
        $filtro1=$_POST["autor"];
        $filtro2=$_POST["paises"];
    }
    $book= mysqli_query($conn,"SELECT books.Title,books.Description,authors.name,books.img,books.Description,authors.Country 
    FROM books 
    INNER JOIN booksauthors ON books.Id=booksauthors.BookId 
    INNER JOIN authors ON booksauthors.AuthorId=authors.Id
    WHERE authors.name like '%$filtro1%' AND authors.Country like '%$filtro2%';"); 
    ?>

<head>
    <title>Re-Read ebooks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="icon" href="../img/icon.png">

</head>

<body>

    <div class="logo">
        <h1>Re-Read</h1>
    </div>

    <div class="header">
        <h1>Re-Read</h1>
        <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
    </div>

    <div class="row">
        <div class="column middle">
            <div class="topnav">
                <a href="index.php">Re-Read</a>
                <a href="libros.html">Libros</a>
                <a href="ebooks.html" class="active">eBooks</a>
            </div>
            <div class="column-2" id="filter">
        </div>
            <div class="textpage">
                <h3>Toda la actualidad en eBook</h3>
            <form action="ebooks.php" method="post">
                <input type="text" placeholder="buscar por Autor..." value="" name="autor">
                <select name="paises" placeholder="buscar por Pais...">
                    <option value="" selected>Todos los paises</option>
                    <option value="España">España</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Estados Unidos">Estados Unidos</option>
                    <option value="Otros">Otros</option>
                </select>
                <input type="submit" value="filtrar" name="filtro">
            </form>
                <?php foreach ($book as $book) {?>
                <div class="gallery">
                    <img src="../img/<?php echo $book["img"]?>" alt="Cell">
                    <div class="desc"><?php echo $book["Description"]?></div>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="column side">
            <h2>Top ventas</h2>
            <p>Cien años de soledad.</p>
            <p>Crónica de una muerte anunciada.</p>
            <p>El otoño del patriarca.</p>
            <p>El general en su laberinto.</p>
        </div>
    </div>

</body>

</html>