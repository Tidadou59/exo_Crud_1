<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 14/01/2019
 * Time: 10:02
 */

// Premiere ligne

// info server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colyseum";

// connection base
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
// Selectionner la base à utiliser
    $conn->select_db($dbname);
}

//echo "Connexion Ok :) <br><br>"; //vérifie que les infos son ok

/* ***************************************************************** */
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>xxxxxxxx</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h3><b> Test message </b></h3> <br>
    </body>
    </html>

<?php
/* ============================================================================================================ */
// exo 2 :

/*
function liste()
{
global $conn;
    $sql = 'select * from clients';

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        echo $row['id']." ". $row['lastName']." ". $row['firstName']." ". $row['birthDate']."<br>";
    }
}
liste();
*/

$sql = 'SELECT * FROM clients';

$result = $conn->query($sql);
?>
    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_ID"> ID </td>
            <td class="taille_Prenom-Nom"> Nom </td>
            <td class="taille_Prenom-Nom"> Prenom </td>
            <td class="taille_Age"> Age </td>
        </tr>
        </tbody>
        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_id'>".$row['id']."</td> <!-- ID de l'élève -->
                <td class='T_P'>".$row['lastName']."</td> <!-- Prénom -->
                <td class='T_N'>".$row['firstName']."</td> <!-- Nom -->
                <td class='T_A'>".$row['birthDate']."</td> <!-- Age -->
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";

/* ============================================================================================================ */

// exo 2 :

$sql = 'SELECT * FROM showtypes';

$result = $conn->query($sql);
?>

    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_Prenom-Nom"> Type de spectacle : </td>
        </tr>
        </tbody>
        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_id'>".$row['type']."</td> <!-- type de spectacle -->
               
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";

/* ============================================================================================================ */

// exo 3 :

$sql = 'SELECT * FROM clients LIMIT 20';

$result = $conn->query($sql);
?>
    <h3><b> Exercice N°3 : Affiche que les 20 premiers </b></h3> <br>

    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_ID"> ID </td>
            <td class="taille_Prenom-Nom"> Nom </td>
            <td class="taille_Prenom-Nom"> Prenom </td>
            <td class="taille_Age"> Age </td>
        </tr>
        </tbody>
        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_id'>".$row['id']."</td> <!-- ID de l'élève -->
                <td class='T_P'>".$row['lastName']."</td> <!-- Prénom -->
                <td class='T_N'>".$row['firstName']."</td> <!-- Nom -->
                <td class='T_A'>".$row['birthDate']."</td> <!-- Age -->
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";

/* ============================================================================================================ */

// exo 4 :

$sql = 'SELECT * FROM clients where card = 1';

$result = $conn->query($sql);
?>
    <h3><b> Exercice N°4 : clients possédant une carte de fidélité </b></h3> <br>

    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_ID"> ID </td>
            <td class="taille_Prenom-Nom"> Nom </td>
            <td class="taille_Prenom-Nom"> Prenom </td>
            <td class="taille_Age"> Age </td>
        </tr>
        </tbody>
        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_id'>".$row['id']."</td> <!-- ID de l'élève -->
                <td class='T_P'>".$row['lastName']."</td> <!-- Prénom -->
                <td class='T_N'>".$row['firstName']."</td> <!-- Nom -->
                <td class='T_A'>".$row['birthDate']."</td> <!-- Age -->
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";

/* ============================================================================================================ */

// exo 5 :

$sql = "SELECT * FROM clients where lastName like 'M%' ORDER BY lastName ASC";

$result = $conn->query($sql);
?>
    <h3><b> Exercice N°5 : affiche uniquement nom & prenom dont le nom commence par "M" <br> & Trie des noms par ordre alphabétique
            : </b></h3> <br>

    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_Prenom-Nom"> Nom </td>
            <td class="taille_Prenom-Nom"> Prenom </td>
        </tr>
        </tbody>
        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_P'>".$row['lastName']."</td> <!-- Prénom -->
                <td class='T_N'>".$row['firstName']."</td> <!-- Nom -->
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";

/* ============================================================================================================ */

// exo 6 :

$sql = "SELECT * FROM shows ORDER BY title ASC";

$result = $conn->query($sql);
?>
    <h3><b> Exercice N°6 : </b></h3>
    <h2>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.<br>
        Trier les titres par ordre alphabétique.
<br>
    Afficher les résultat comme ceci : *Spectacle* par *artiste*, le *date* à *heure*.</h2>
<br>

    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_Prenom-Nom"> Spectacle </td>
            <td class="taille_Prenom-Nom"> Artiste </td>
            <td class="taille_Prenom-Nom"> Date </td>
            <td class="taille_Prenom-Nom"> Heure </td>
        </tr>
        </tbody>
        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_P'>".$row['title']."</td> <!-- Spectacle -->
                <td class='T_N'>".$row['performer']."</td> <!-- artiste -->
                <td class='T_N'>".$row['date']."</td> <!-- Date -->
                <td class='T_N'>".$row['startTime']."</td> <!-- Heure -->
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";

/* ============================================================================================================ */

// exo 7 :

$sql = 'SELECT * FROM clients';

$result = $conn->query($sql);
?>
    <h3><b> Exercice N°7 : </b></h3>
    <b>Afficher tous les clients comme ceci :

    Nom : *Nom de famille du client*
    Prénom : *Prénom du client*
    Date de naissance : *Date de naissance du client*
    Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
    Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*
    </b>
    <br><br>

    <table id="tbl" border="1">

        <tr class="styl">
            <th class="taille_Prenom-Nom"> Nom (client) </th>
            <th class="taille_Prenom-Nom"> Prenom (client) </th>
            <th class="taille_Prenom-Nom"> Date de naissance </th>
            <th class="taille_Prenom-Nom"> Carte de Fidélité (oui/non) </th>
            <th class="taille_Prenom-Nom"> N° Carte de Fidélité </th>
        </tr>

        <?php

        while($row = $result->fetch_assoc())
        {
            //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

            echo "
            <tr class='tr_genere'>
                <td class='T_P'>".$row['lastName']."</td> <!-- Spectacle -->
                <td class='T_N'>".$row['firstName']."</td> <!-- artiste -->
                <td class='T_N'>".$row['birthDate']."</td> <!-- Date -->
                
                <td class='T_N'>";

                    if($row['card'] == "1")
                        {
                            echo ("oui");
                        }

                    else
                        {
                            echo "non";
                        }
                "</td> <!-- Carte de Fidélité -->
                
                <td class='T_N'>".$row['cardNumber']."</td> <!-- N° Carte de Fidélité -->
            
                    //le code bloque et je ne comprend pas !
            
            </tr>
            ";
        };
        ?>
    </table>

<?php

echo "<br><br>";