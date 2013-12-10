<!DOCTYPE html>
<html>
<meta charset="utf-8" lang="fr">
<head>
<title>Movie Manager</title>
    <link rel="icon" href="../ressources/images/favicon.ico" />
    <link rel="stylesheet" href="../ressources/css/style.css">
    <link rel="stylesheet" href="../ressources/js/datatables-1.9.4/media/css/jquery.dataTables.css">
    <script src="../ressources/js/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
    <script src="../ressources/js/datatables-1.9.4/media/js/jquery.dataTables.js"></script>
    <!--"localhost/server/"+onglet+".php"-->
<script>
    function menu(onglet){
        $.ajax({
            type: "GET",
            url: "../ressources/model/"+onglet+"Projet.xml",
            dataType:"xml",
            success: function(xml){
             var tableau= "<thead><tr><th>Titre</th><th>Genre</th><th>Modification</th></tr></thead><tbody>";
           $(xml).find('film').each(function(){
               var film=$(this).find("titre").text();

               var genre=$(this).find("id_genre").text();
               var idRealisateur=$(this).find("id_realisateur").text();

             tableau += "<tr>";
             tableau += "<td>"+film+"</td><td>"+genre+"</td>";

           })
            tableau += "</tbody>"
                $("#tableau").html(tableau);
                $('#tableau').dataTable({

                });


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
    <table id='tableau'>
        </table>
</div>

<?php


?>

</body>
</html>