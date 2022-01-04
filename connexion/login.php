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

function lectuser($user,$pw)
{     
       // session_start();
        $db = dbConnect();
        $query="SELECT * FROM users WHERE username = '$user' and pw = '$pw'";
        $result =  $db->query($query);
        $tab = $result->fetchall(PDO::FETCH_ASSOC);          
        $val = count($tab); 
       
        if ($val===1){ 
            echo"<br>";
            echo "Vous etes connecte"; 
            echo"<br>";
            $_SESSION["newsession"]=1;  
?>
            <p><em><a href="index.php">Cliquer ici pour retourner a la page d'accueil<em></p>

<?php
        }else{
            echo"<br>";
            echo "Mdp ou nom incorrect"; 
            echo"<br>";
?>
           <p><em><a href="index.php">Cliquer ici pour essayer a nouveau<em></p>
<?php 
        } 
        return $val;
}
 
        session_start();
        if (isset($_SESSION["newsession"])){ 
            if ($_SESSION["newsession"]==1){           
?>
           <p><em><a href="index.php">Vous etes deja connecte cliquer ici pour continuer<em></p>
<?php         
           }else{  
            echo"<br>";
            echo "vous n'etes pas connecte";        
            echo"<br>";
              lectuser($_POST['nom'],$_POST['pw']);
           } 
        }else{           
            lectuser($_POST['nom'],$_POST['pw']);
        }   
     

?>           
          


