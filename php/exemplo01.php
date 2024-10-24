<?php  // inicio do php

// estrutura de códigos
// print é para imitir na tela
print "Olá Mundo!";

const pi = 9.14159;
echo " <br> Valor de pi = " . pi;
const imposto = 0.8;
print " <br> O valor do impoto é = " . imposto;
$nome = "Wes";
$idade = 25;
$valorDolar = 5.46;
$ehverdade = true;
print " <br> O valor do Dolar é = " . $valorDolar . $ehverdade;
print " <br> Minha idade é = " . $idade;
print " <br> Meu nome é = " . $nome . " e minha idade é = " . $idade;

print_r("<br> " . $nome ." <br>");
var_dump($nome);


if ($idade >= 18)
echo "<br> maior de idade";
else 
echo "<br> menor de idade";

$opcao = 1;
switch ($opcao) {
    case 1: 
        echo " <br> você escolheu o 1";
        break;
    case 2: 
         echo " <br> você escolheu o 2";
         break;
default : // 
        echo "<br> você nao selecionou a opção correta";
    }

//final
?>