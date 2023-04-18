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
        echo "<br>"
        $mycar = new Car("red","Toyota");
        echo $mycar->mensagem();




    ?>
</body>
</html>

