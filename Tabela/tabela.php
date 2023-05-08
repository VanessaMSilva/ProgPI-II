

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
 </head>
 <body>
 <?php
 $ver = false;
 echo '<table>';
 for($x=0; $x < $_POST["colunas"]; $x+=1){
     echo '<tr>';
     for($i=0; $i < $_POST["linhas"]; $i+=1){
         if($ver){
             echo '<td style="background-color:',$_POST["cor1"],'; padding: 50px"></td>';
             $ver = false;
         }
         else{
             echo '<td style="background-color:',$_POST["cor2"],'; padding: 50px;"></td>';
             
             $ver = true;
         }
     }
     echo "</tr>";
 }
 echo "</table>"
 ?>
 </body>
 </html>