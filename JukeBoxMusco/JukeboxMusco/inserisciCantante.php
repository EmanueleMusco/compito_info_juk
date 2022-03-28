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
    <div class="grid-item" style="color: rgb(236, 100, 85);"> <a href="aggiungi.php"><img src="icone/plus.png" ><br>Aggiungi cantante/canzone</a></div>
    <div class="grid-item"><a href="cerca.php"><img src="icone/search.png" ><br>Cerca cantante/canzone</a></div>
    <div class="grid-item"><a href="elimina.php"><img src="icone/bin.png" ><br>Cancella cantante/canzone</a></div>
    <div class="grid-item"><a href="aggiorna.php"><img src="icone/refresh.png" ><br>Aggiorna cantante/canzone</a></div>
</div>

<!-- div di spaziatura-->
<div class="spazio"></div>
<div class="cantante">
<a href="inserisciCantante.php"> Inserisci cantante</a>
</div>

<br>
<form method="POST" action="inserisciCantante.php">
<div class="inscantante">
<input type="text" name="nome" id="nome" placeholder="nome"><br><br>
<input type="text" name="cognome" id="cognome" placeholder="cognome"><br><br>
<input type="text" name="pseudonimo" id="pseudonimo" placeholder="pseudonimo"><br><br>
<input type="date" name="datadinascita" id="datadinascita" placeholder="data di nascita"><br><br>
</div>
<div class="spazio"></div>
<input type="submit" value="Invia" name= "submit">
</form>

<div class="spazio"></div>
<div class="canzone">
<a href="inserisciCanzone.php">Inserisci canzone</a>
</div>



</body>
</html>

<?php


if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $pseudonimo = $_POST['pseudonimo'];
    $datanascita = $_POST['datadinascita'];

    $sql = "INSERT INTO cantanti (nome, cognome, pseudonimo, DataDiNascita)
    VALUES ('$nome', '$cognome', '$pseudonimo', '$datanascita')";
    
    if ($conn->query($sql) === TRUE) {
        
      echo "<br>Cantante aggiunto correttamente";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



?>




