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

<div class="inscantante">
</div>


<div class="spazio"></div>
<form method="POST" action="inserisciCanzone.php">
<div class="canzone">
<a href="inserisciCanzone.php">Inserisci canzone</a>
</div>
<br>
<input type="text" name="titolo" id="titolo" placeholder="titolo"><br><br>
<input type="text" name="genere" id="genere" placeholder="genere"><br><br>
<input type="text" name="cantanti" id="cantanti" placeholder="cantanti"><br><br>
Se sono presenti piu cantanti, assicurarsi di separarli con un "-"<br><br>
<input type="text" name="durata" id="durata" placeholder="durata"><br><br>
<input type="date" name="annodiuscita" id="annodiuscita" placeholder="anno di uscita"><br><br>

<div class="spazio"></div>
<input type="submit" value="Invia" name="submit">
</form>

</body>
</html>

<?php

if(isset($_POST['submit'])){

    $titolo = $_POST['titolo'];
    $genere = $_POST['genere'];
    $cantanti = $_POST['cantanti'];
    $durata = $_POST['durata'];
    $annouscita = $_POST['annodiuscita'];

    $nome = '';
    $cognome = '';
    $datanascita = ''; 
    $idcanz = '';


    // crea canzone 

    $sql = "INSERT INTO canzoni (titolo, genere, durata, AnnoDiUscita)
    VALUES ('$titolo', '$genere', '$durata', '$annouscita')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //prendi id dell'ultima canzone creata e mettilo in interpreta

    $sql = "SELECT idCanzone FROM canzoni";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo $idcanz = $row["idCanzone"] . "<br>";

    }
    } else {
    echo "0 results";
    }



    $arr = explode("-", $cantanti);

    //foreach per vedere se l'artista esiste gia

    foreach($arr as $key => $value){
        $sql = "SELECT pseudonimo FROM cantanti WHERE pseudonimo = '$value'";
        $result = $conn->query($sql);
        
        //se esiste, allora preleva id
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $sql = "SELECT idCantante FROM cantanti WHERE pseudonimo = '$value'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $idcant = $row['idCantante'];
                //mette id canzone e id cantante in interpreta
                $sql = "INSERT INTO interpreta (idCantante2, idCanzone2)
                VALUES ('$idcant', '$idcanz')";
                
                if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
                 
              }
          }
          //se non esiste, allora crea un cantante vuoto con pseudonimo e preleva id
        }
    }else {
            foreach($arr as $key => $value){
                $sql = "INSERT INTO cantanti (nome, cognome, pseudonimo, DataDiNascita)
                VALUES ('$nome', '$cognome', '$value', '$datanascita')";
        
                if ($conn->query($sql) === TRUE) {
                    echo "Aggiunto correttamente <br>";
                    $sql = "SELECT idCantante FROM cantanti WHERE pseudonimo = '$value'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo $idcant = $row['idCantante'];
                        $sql = "INSERT INTO interpreta (idCantante2, idCanzone2)
                        VALUES ('$idcant', '$idcanz')";
                        
                        if ($conn->query($sql) === TRUE) {
                          echo "New record created successfully";
                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                      }
                  }
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }


            }
        }
    }


}



?>


