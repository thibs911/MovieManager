<!DOCTYPE html>
<html>
<meta charset="utf-8" lang="fr">
<head>
<title>Movie Manager</title>
    <link rel="icon" href="../ressources/images/favicon.ico" />
    <link rel="stylesheet" href="../ressources/css/style.css">
    <script src="../ressources/js/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
    <!--"localhost/server/"+onglet+".php"-->
<script>
    function menu(onglet){
        $.ajax({
            type: "GET",
            url: "../ressources/model/"+onglet+".xml",
            dataType:"xml",
            success: function(xml){
           $(xml).find('film').each(function(){
               var film=$(this).text();
               var realisateur=$(this).find('realisateur').attr("nom");
               var acteurs = [];
               $(this).find('acteurs').each(function(){
                   acteurs.push($(this).find('acteur').attr("nom"));
               })

               $("<li></li>").html("Titres : "+film +"<br/><ol> Réalisateur : "+realisateur+"</ol>"
               +" Acteurs : "+acteurs.toString()+"<br/>").appendTo("#contenu");
           })



            }
        })
    }

    $(document).ready(function() {

        menu("films");
    });


</script>
</head>
<body>

<ul>
    <li id="films"><a href="#1" onclick="menu('films')">Films</a></li>
    <li id="categories"><a href="#2" onclick="menu('genres')">Catégories</a></li>
    <li id="notes"><a href="#3" onclick="menu('notes')">Notes</a></li>
    <li id="commentaires"><a href="#4" onclick="menu('commentaires')">Commentaires</a></li>

</ul>


<div id="contenu">

</div>

<?php


?>

</body>
</html>