<?php
    session_start();
    if (isset($_SESSION["newsession"])){ 

        if ($_SESSION["newsession"]==1){    
?>        
            <h3>Vous etes connecte bienvenue sur notre site !<em></p> 


            <p><em><a href="logout.php">Cliquer ici pour vous deconnecter<em></p>


<?php
        }else{
            // echo "gloup";
            require('register.php');  
        }

    }else{
       //  echo "gloup";
        require('register.php');  
    }   

?>
