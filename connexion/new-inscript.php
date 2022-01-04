<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
        <title>Connexion</title>
    </head>

    <style>
        .bod {
            background-color: beige;

            height: 280px;  
            width: 10%;
            color: rgb(136, 89, 245);
            border: solid 2px;
            border-color : black;      
            position: static;
            margin: 0 auto 0 auto;
        }

        .hclass{
        text-align: center;    

        }   
     
        .gr{
            width: 25%; 
            height: 15%;    
            margin: 10%;          
        }

        .grb{
            width: 25%; 
            height: 15%;    
            margin: 10%; 
            background-color: green;         
        }

        .lig{
          
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        input[type=submit] {
          background-color: #3CBC8D;
          color: white;
        }

    </style>

    <body >
               
        <div class= "bod">
            
            <h3 class="hclass">INSCRIVEZ VOUS</h3>          
        
            <form action="inscript.php" method="POST">   
                    
                <div  class= "gr">
                    <label  class= "lab">UserName</label>
                    <input type="text" id="nom" name="nom" />               
                </div>

                <div  class= "gr">
                    <label>E-Mail</label>
                    <input type="text" id="email" name="email" />
                </div>

                <div  class= "gr">
                    <label">PassWord</label>
                    <input type="text" id="pw" name="pw" />                
                </div>  

                <div class="grb">
                    <div>
                        <input type="submit" value = "Valider mon inscription"/>                    
                    </div>
                    
                </div> 

            </form> 
        </div>  
    </body>
</html>