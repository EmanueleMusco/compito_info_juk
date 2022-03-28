<?php 
include 'connessione.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jukebox</title>
</head>
<body>
<h1 align="center"> <a href="index.php">JUKEBOX</a> </h1>
<div class="container">
<div class="grid-container">
    <div class="grid-item"><a href="aggiungi.php"><img src="icone/plus.png"><br>Aggiungi cantante/canzone</a></div>
    <div class="grid-item"><a href="cerca.php" style="color: rgb(236, 100, 85);"><img src="icone/search.png"><br>Cerca cantante/canzone</a></div>
    <div class="grid-item"><a href="elimina.php"><img src="icone/bin.png"><br>Cancella cantante/canzone</a></div>
    <div class="grid-item"><a href="aggiorna.php"><img src="icone/refresh.png"><br>Aggiorna cantante/canzone</a></div>
</div>


</div>
</body>
</html>

<?php

