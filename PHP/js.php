<!DOCTYPE html>
<html>
<head>
<title>js</title>
</head>
<body>
  <style>
      ul {
        list-style: none;
      }
    </style>
    <?php
    $n = $_GET['n'];
      echo "<ul id="."etoile".">";
      for ($i=0 ; $i < $n ; $i++){
         echo "<li>" ;
         echo "*" ;
         echo "</li" ;
         echo "<br>";
      }
      echo "</ul>" ;
    ?>
    <script>
        var x= document.getElementById("etoile");

       x.addEventListener("mouseenter", function( event ) {
        // on met l'accent sur la cible de mouseenter
        event.target.style.color = "black";

        // on réinitialise la couleur après quelques instants
        setTimeout(function() {
          event.target.style.color = "";
        }, 500);
      }, false);

      // Ce gestionnaire sera exécuté à chaque fois que le curseur
      // se déplacera sur un autre élément de la liste
       x.addEventListener("mouseover", function( event ) {
        // on met l'accent sur la cible de mouseover
        event.target.style.color = "green";

        // on réinitialise la couleur après quelques instants
        setTimeout(function() {
          event.target.style.color = "";
        }, 500);
      }, false);
    </script>
</body>
</html>
