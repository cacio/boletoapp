<?php
require __DIR__ . '/vendor/autoload.php';

use Boletos\Boleto\Banco\Itau;

$boleto = new Itau([
    // Obrigatórios gerais
    'valor'        => 100.50,
    'vencimento'   => new DateTime('+5 days'),
    'numero'       => '123456', // número do documento
    'nossoNumero'  => '12345678',

    // Dados bancários do beneficiário
    'agencia'      => '1234',
    'conta'        => '56789',
    'carteira'     => '109',

    // Beneficiário
    'beneficiario' => [
        'nome'       => 'Minha Empresa LTDA',
        'documento'  => '12345678000199',
    ],

    // Pagador (alguns bancos exigem)
    'pagador' => [
        'nome'       => 'Cliente Teste',
        'documento'  => '12345678900',
    ],
]);

echo "Linha Digitável:\n";
echo $boleto->getLinhaDigitavel() . PHP_EOL;
