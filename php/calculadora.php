<?php 

$sair= 1;

while ($sair != 0){
print "<br> informe o primeiro numero";
$numero1 = trim(fgets(STDIN));
print "<br> informe o segundo numero";
$numero2 = trim(fgets(STDIN));
print "<br> informe a operação desejada: +, /, *, -, : ";
$entrada = trim(fgets(STDIN));



switch($entrada){ 
    case '+':{
        $soma = $numero1 + $numero2;
        print "<br>  Soma: $soma";
        break;
    }
    case '-':{
        $subtracao = $numero1 - $numero2;
        print "<br> subtracao: $subtracao";
        break;
    }
        case'*':{
        $divisao = $numero1 * $numero2;
        print "<br>  divisao: $divisao";
        break;
    }
    case'/':{
        $multiplicacao = $numero1 / $numero2;
        print "<br>  multiplicação: $multiplicacao";
        break;
    }
    default: print (" opção invalida");
}

    print "<br> digite 0 para sair e qualquer valor para continuar: ";
    $sair= trim(fgets(STDIN));
}

?>
