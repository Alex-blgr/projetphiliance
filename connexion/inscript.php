<?php

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=registration;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    catch(Exception $e)
    {
        // Gestion de l'erreur à l'arrache avec : 
        die('Erreur : '.$e->getMessage());
    }
}

function newuser($nom, $mail, $pw)
{
    $db = dbConnect();
    $query="SELECT * FROM users WHERE username = '$nom' and pw = '$pw'";
    $result =  $db->query($query);
    $tab = $result->fetchall(PDO::FETCH_ASSOC);          
    $val = count($tab); 

    if ($val===1){ 
        echo"<br>";
        echo "Vous etes deja inscrit"; 
        echo"<br>";     
?>
        <p><em><a href="index.php">Cliquer ici pour vous connecter<em></p>

<?php
    }else{

        $db = dbConnect();
        $result = $db->prepare("INSERT INTO users( username, email, pw) VALUES('$nom','$mail','$pw')");   
        $tab = $result->execute(array($nom,$mail,$pw));          
        $val = count($tab);  
        var_dump ($val);   

        if (isset($val)){ 
            if ($val==1){ 
                echo"<br>";
                echo "vous etes inscrit !";
                echo"<br>";  
    ?>         
                <p><em><a href="index.php">cliquer ici pour vous connecter<em></p>           
    <?php                
            }else{  
                echo"<br>";
                echo "vous n'etes pas inscrit !";
                echo"<br>"; 
    ?>             
                <p><em><a href="index.php">cliquer ici pour essayer a nouveau<em></p>        
    <?php
                echo"<br>";              
            } 
        }
    }    
}
    $nom = $_POST['nom'];
    $mail = $_POST['email'];
    $pw = $_POST['pw'];

    $nom = htmlspecialchars($nom);  
    $pw = htmlspecialchars($pw);

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {       
        newuser($nom,$mail,$pw);
      } else {
        echo("L'adresse mail : '$mail' n'est pas une adresse mail valide !");
?>             
        <p><em><a href="new-inscript.php">cliquer ici pour essayer a nouveau<em></p>        
<?php        
      }   
    

    
?>    