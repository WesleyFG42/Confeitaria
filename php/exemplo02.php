<?php

/*
 Comentários de várias linhas 
 */

$candidatoA = 'Lucas'; // VARIÁVEIS DE TEXTO
$candidatoB = 'Rafael';
$candidatoC = 'Wesley';
$votoA = 0; // VARIÁVEIS INTEIRO
$votoB = 0;
$votoC = 0; 

for ($pessoas = 10; $pessoas > 0; $pessoas--) {

    print("<br>Escolha seu candidato: 1: $candidatoA - 2: $candidatoB - 3: $candidatoC ::: ");
    
    // Para ler a entrada do usuário
    $entrada = trim(fgets(STDIN)); 

    switch ($entrada) {
        case 1:
            $votoA += 1;
            print("Voto A");
            break; // Saio do laço switch
            
        case 2: // Corrigido para 2
            $votoB += 1;
            print("Voto B");
            break; // Saio do laço switch
            
        case 3:
            $votoC += 1;
            print("Voto C");
            break; // Saio do laço switch
            
        default:
            print("<br>Opção Inválida!");
    }
}

print("<br>Total de votos: $candidatoA - $votoA");
print("<br>Total de votos: $candidatoB - $votoB");
print("<br>Total de votos: $candidatoC - $votoC");

?>
