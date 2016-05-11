<html>
  <head>
    <title>Films</title>
  </head>
  <body>
    <form method='post' action='films.php'>
      <select name='realisateur' value='Hitchcock'>
        <?php
        $link =mysqli_connect("sql8.freemysqlhosting.net","sql8117996","xMd12ZdBgn","sql8117996");
        if(!$link) die("pb");
        $resultat=mysqli_query($link,"SELECT Distinct nom From Film Join Artiste On (idMes=idArtiste)");
        if($resultat){
          foreach($resultat as $film){
            echo"<option>".$film['nom']."</option>";
          }
        }
        else 
          die('Erreur de requete');
        mysqli_close($link);
        ?>
        </form>
        <input type='submit' value='Envoyer'>
        
      </select>
    </form>
    <legend>
      Films
    </legend>
    <table>
      <thead>
        <tr>
          <th>Titre</th>
          <th>Annee</th>
          <th>Genre</th>
          <th>Realisateur</th>
        </tr>
      </thead>
    <?php
      if(isset($_GET["nom"])){
        $nom = $_GET['nom'];
      
        $link = mysqli_connect("sql8.freemysqlhosting.net","sql8117996","xMd12ZdBgn","sql8117996");
        if(!$link) die ("pb");
        $resultat=mysqli_query($link,"SELECT titre,annee,genre, nom FROM Film Join Artiste On (idMes =idArtiste)");
    
         if($resultat){
      
          foreach($resultat as $film){
            if($nom == $film['nom']){
              echo"<tr>";
              echo"<td>".$film['titre']."</td>";
              echo"<td>".$film['annee']."</td>";
              echo"<td>".$film['genre']."</td>";
              echo"<td>".$film['nom']."</td>";
              echo"</tr>";
            }
          }
        }
      }
    else
      die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    ?>
    </table>
  </body>
</html>