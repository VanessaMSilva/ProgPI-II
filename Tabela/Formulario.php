<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: white;
        }
        
        img{
            width: 100px;
            height: 100px;
        }
        #formulario{
          
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: white;
        }
        #formulario > div{
            padding: 25px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to right,purple,pink);
            border-radius: 25px;
        }

        .form{
            color: black;
        }
        input{
            border-radius: 25px;
            background-color: white;
        }
    </style>
    <title>Formulario</title>
 </head>
 <body>
    l fo<section>
        <div id="formulario">
        <div >
            <div><img src="imagens/user-icon-design-free-png.webp" alt=""></div>
            <form action="tabela.php" method="post">
            <h1>FORMULARIO</h1>
            <hr>
            <div>
               
                    <div><label for="coluna">Colunas: </label></div>
                    <div><input id="coluna" type="number" name="colunas"></div>
                    <div><label for="linha">Linhas: </label></div>
                    <div><input id="linha" type="number" name="linhas"></div>
                </div>
                <div class="right form">
                    <div><label for="cor1">Cor 1: </label></div>
                    <div> <input id="cor1" type="color" name="cor1"></div>
                    <div><laber="cor2">Cor 2: </label></div>
                    <div><input id="cor2" type="color" name="cor2"></div>
                </div>
                    <div><input type="submit"></div>
                </div>
            </form>
            </div>
        </div>
    </section>
 </body>
 </html>