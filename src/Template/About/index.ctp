<?php
$aboutDescription = 'This is a cakePHP development framework';
?>
<!DOCTYPE html>
<html>
    <head>

        <title>
            <?= $aboutDescription ?>
        </title>    

    </head>

    <body>
        <h3>Welcome to PolBlog II </h3>
        <hr>
        <p> <b>&#201tudiant: Chrisphonte E Vladimir</b><br>
            <b>Titre du cours: 420-5b7 MO Applications internet.</b><br>
            Session: Automne 2018, Coll&#232ge Montmorency.</p></b>
    <hr>
    <h3>Schema Tables de Conception (DB) </h3>
    <p>Official database site </p>

    <?php
    echo $this->Html->image("picts/police_departments_model.gif", ["alt" => "police_departments_model.gif",
        "width" => "600px",
        "height" => "700px",
        "url" => 'http://www.databaseanswers.org/data_models/police_departments/index.htm'
    ]);

    echo $this->Html->image("picts/chrisTP2crud.jpg", ["alt" => "chrisTP2crud.jpg",
        "width" => "600px",
        "height" => "700px",
    ]);
    ?>
    <hr>

    <a href="http://www.databaseanswers.org/data_models/police_departments/index.htm">Visit our official web site</a>
    <p>
    <hr>

    Description sommaires.<br>
    &#201tapes d'utilisation typiques de l'application web:<br>
    1- Tous les visiteurs ont trois options de traduction du site<br> 
    et peuvent la changer sur la barre de la page d'accueil.<br> 
    Ils peuvent aussi, à partir de la page d'accueil accéder<br>  
    à une vue détaillée sur un magazine ou sur un utilisateur<br> 
    en cliquant sur Afficher ou View ou Vista.<br> 

    2- Cependant, un utilisateur a plus d'options selon<br>   
    les privilèges attribués à son statut (Admin ou Super-User).<br> 

    3- Les rôles ou privilèges peuvent être modifiés par l'administrateur<br> 
    en cliquant sur modifier de la liste des utilisateurs.<br> <br> 
    <hr>
    Interaction:<br>
    Les utilisateurs recoivent des messages de confirmiation aux échecs<br>
    ou succès de leurs commandes.<br><br>

    <hr>
    Utilisation des commandes:<br>  
    Tous les utilisateurs peuvent login en appuiyant le link login <br>
    de la page d'accueille et peuvent retourner à cette page à tout moment<br>
    en cliquant sur la commande Home.<br><br>
    <hr>
    R&#233sultat attendu:<br>
    Tous les utilisateurs vont pouvoir lire et écrire leurs opinions <br>
    et consulter leur statut sur le Pol-Blog.<br><br>


</p>
<hr> 
<h3> Travaux + TP2 </h3>

<p><br>
    Remarques:<br>
    -user name: cevchris23@gmail - password: vlad2312
    -Utiliser Home - Monopage pour revenir à la page d'accueil <br>
    -Monopage:Explore menu gauche - select Mono Page Genres<br>
    -Ajout possible mais modification?<br>
    -Link Menu AdminLineUp //class AppView extends UIView (inactive)<br>
    -Bootstrap-Admin: Ajout possible mais modification?<br>
    -Autocomplete : add user (full_name).<br>
    -Liste dépendante: add entrefilets (genres - thèmes). <br>
    -Convert to PDF : page d'accueil view[PDF] (inconvénient)<br>

<hr>   
        * Inconv&#233nient:<br>
        -Ajuster la dimension UI et la fonction pdf.<br>
        -Modidier data (mis à jour).<br>
        -Quelques tests (json).<br>

<hr>


<h3> Test TP2 </h3>
1-test pour une méthode "find" dans le modèle...<br>
(a): testFindPublished tests/TestCase/Model/Table/EntrefiletsTableTest(ok)<br><br>

2-test pour une vérification de la validation de données (par exemple "email") <br>
(a):testNoBlank tests/TestCase/Model/Table/ThemesTableTest (ok)<br><br> 
(b):testValidEmail tests/TestCase/Model/Table/UsersTableTest(ok)<br><br> 


3-tests pour vérifier le traitement des requêtes envoyées à au moins un contrôleur : <br>
a)vérifier accès autorisé et un autre non-autorisé.<br>
Voir:testAddAuthenticated tests/TestCase/Controller/UsersControllerTest (ok)<br><br>

b)vérifier actions:<br>
-de lecture (index), <br>
Voir:testIndex tests/TestCase/Controller/ThemesControllerTest (ok)<br><br>
-de lecture (view), <br>


Voir:testIndex tests/TestCase/Controller/ThemesControllerTest (todo)<br><br>

-d'ajout, de modification et de suppression.<br>
Voir:...(todo)<br><br>

4-test de code JS pour vérifier la faille XSS<br>
Voir:......(todo)<br><br>   

5-rapport HTML de type "Coverage" <br>    
cliquez le lien vers le rapport ici => 

<a href= "http://localhost/TP2_ChrisRestCrudPDF/webroot/coverage/index.html">Coverage</a>;
</p> 

<hr>

<?php /*
  // check out, How to use url-php in that case? voir prof. or students.

  $url = "http://localhost/ChrisMultiLng_v0_4_Jtest/webroot/coverage/";


  <?= $this->Html->link('Url_Coverage', $url)  ?>

 */
?>
</body>
</html>

