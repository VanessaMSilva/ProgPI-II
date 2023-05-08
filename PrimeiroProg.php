<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello world!!</h1>
    <?php
        
        $x = 5;
        $y = 10;
        function mytest(){
            global $x,$y;
            $y = $x + $y;
            echo "\nTeste 01: $y";
        }
        function mytest2(){
            $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
            
        }
        function mytest03(){
            static $z=0;
            echo $z;
            $z++;
        }

        echo "\n$y";
        mytest();
        mytest2();
        echo "\nTeste 02: $y";
        mytest03();
        mytest03();
        mytest03();
        /**VERIFICAR TIPAGEM DA VARIAVEL***/
        $x = 5988;
        echo var_dump($x);

        /*ARRAY */
        $cars = array("Volvo","BMW","Toyota",45);
        echo var_dump($cars);

        /*Classe objeto */
        class Car{
            public $cor;
            public $modelo;
            
            public function __construct($cor,$modelo){
                $this->cor = $cor;
                $this->modelo = $modelo;
            }

            public function mensagem(){
                return "Meu carro é um " . $this->cor . " " . $this->modelo;
            }
        }

        $mycar = new Car("preto","Volvo");
        echo $mycar->mensagem();
        echo "<br>";
        $mycar = new Car("red","Toyota");
        echo $mycar->mensagem();

        //Atividade string
        echo "<br>";
        echo "Tamanho mensagem ", strlen($mycar->mensagem());
        echo "<br>";
        echo "Numero de palavras ", str_word_count($mycar->mensagem());
        echo "<br>";
        echo "Inverter mensagem ", strrev($mycar->mensagem());
        echo "<br>";
        echo "Procurar palavra ", strpos($mycar->mensagem(),"car");
        echo "<br>";
        echo "Substituir mensagem ", str_replace("car","argafgigk",$mycar->mensagem());
        print "<h1>Bom dia!!!</h1>";

        $x = 0;

        for($x=0; $x<=30; $x+=10){
            echo "The numbers is: $x <br>";
        }
        $ver = false;
        echo '<table>';
        for($x=0; $x<3; $x+=1){
            echo '<tr>';
            for($i=0; $i<3; $i+=1){
                if($ver){
                    echo '<td style="background-color:#bdd6ee; padding: 50px"></td>';
                    $ver = false;
                }
                else{
                    echo '<td style="background-color:#9bc2e4; padding: 50px;"></td>';
                    
                    $ver = true;
                }
            }
            echo "</tr>";
        }
        echo "</table>"

    ?>
</body>
</html>

