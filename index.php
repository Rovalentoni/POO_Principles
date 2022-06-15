<?php

class Veiculo
{
    private $velocidadeMax;
    private $velocidadeAtual;
    private $combustivel;

    protected function __construct($velocidadeMax, $combustivel)
    {
        $this->velocidadeMax = $velocidadeMax;
        $this->velocidadeAtual = 0;
        $this->combustivel = $combustivel;

        // __construct é chamada todas as vezes com o New.
        // Uma vez que posso colocar parametros settando as propriedades na instancia da classe com seus valores iniciais.

    }

    public function acelerar($velocidadeAtual, $velocidadeMax) //É uma função setter
    {
        $this->velocidadeAtual = $velocidadeAtual;
        if ($this->velocidadeMax < $velocidadeMax) {
            $this->velocidadeMax = $velocidadeMax;
        }
    }
    public function freiar()    //É uma função setter
    {
        if ($this->velocidadeAtual > 0) {
            $this->velocidadeAtual = 0;
            $this->velocidadeMax = 0;
        }
    }






    public function currentSpeed($velAtual)     //É uma função getter
    {
        return $this->velocidadeAtual;
    }
}

class Carro extends Veiculo
{
    private const NUMRODAS = 4;
    private $numPortas;
    private $maxPessoas;
    private $currentPessoas;

    public function __construct($velocidadeMax, $combustivel, $numPortas, $maxPessoas) // Declaraçao da funcao
    {
        parent::__construct($velocidadeMax, $combustivel); // Chamada da funcao
        $this->numPortas = $numPortas;
        $this->maxPessoas = $maxPessoas;
        $this->currentPessoas = 0;
    }


    public function embarcarPassageiros($currentPessoas) //É uma função setter
    {
        if ($currentPessoas < $this->maxPessoas) {
            $this->currentPessoas += $currentPessoas;
        } else {
            echo ('O veiculo está lotado');
        }
    }

    //Embarcar passageiro é algo que nao é nativo do veículo. Se esse metodo usar propriedades que nao constam na classe principal, 
    //provavelmente ela precisa estar numa classe mais especifica.
}

class Caminhao extends Carro
{
    private $capacidadeCarga;
    private $numRodas;

    function __construct($velocidadeMax, $combustivel, $numRodas, $numPortas, $capacidadeCarga, $maxPessoas)
    {
        parent::__construct($velocidadeMax, $combustivel, $numPortas, $maxPessoas);

        $this->numRodas = $numRodas;
        $this->capacidadeCarga = $capacidadeCarga;
    }

    public function carregarCarga($pesoCarga)
    {
        if ($pesoCarga < $this->capacidadeCarga) {
            $this->capacidadeCarga -= $pesoCarga;
        }
    }
}

class Moto extends Veiculo
{
    private $qtdAlforges;
    private $maxAlforges;
    public function __construct($velocidadeMax, $combustivel, $maxAlforges)
    {
        parent::__construct($velocidadeMax, $combustivel);
        $this->qtdAlforges = 0;
        $this->maxAlforges = $maxAlforges;
    }

    public function instalarAlforge($numAlforges)
    {
        if ($this->qtdAlforges < $this->maxAlforges) {
            $this->qtdAlforges += $numAlforges;
        } else echo ("nao é possível adicionar alforges");
    }
    // public function acelerarMoto($velocidadeAtual, $velocidadeMax) {
    //     $this->acelerar($velocidadeAtual, $velocidadeMax);
    // }
}

$moto = new Moto(120, 'gasolina', 4);
$moto->acelerar(0, 120);


//----------------------------------------------------------------------------------------------------------------------------//


//Exercício extensao de classes 2.0

/*Fazer um exercício Igual o index , só que com as classes
 ser vivo, mamíferos, repteis, aves, animal, Vegetal, arvore, erva.
Aplicar praticas de SOLID.*/


class SerVivo
{

    private $tipoCelular;
    private const DNA = 'sim';
    private const METABOLISMO = 'sim';

    function __construct($tipoCelular)
    {
        $this->tipoCelular = $tipoCelular;
    }
}

class Animal extends SerVivo
{

    private $reproduçao;
    private $alimentacao;
    private $tamanho;

    function __construct($reproduçao, $alimentacao, $tamanho, $tipoCelular)
    {
        parent::__construct($tipoCelular);
        $this->reproduçao = $reproduçao;
        $this->alimentacao = $alimentacao;
        $this->tamanho = $tamanho;
    }
}

class Mamiferos extends Animal
{
    private const TIPOCOLUNA = 'vertebrado';
    private $alimentaçaoInfantil;

    function __construct($reproduçao, $alimentacao, $tamanho, $tipoCelular, $alimentaçaoInfantil)
    {
        parent::__construct($reproduçao, $alimentacao, $tamanho, $tipoCelular);
        $this->alimentaçaoInfantil = $alimentaçaoInfantil;
    }
}

class Repteis extends Animal
{
    private $forcaMordida;
    private $numDentes;

    function __construct($reproduçao, $alimentacao, $tamanho, $tipoCelular, $forcaMordida, $numDentes)
    {
        parent::__construct($reproduçao, $alimentacao, $tamanho, $tipoCelular);
        $this->forcaMordida = $forcaMordida;
        $this->numDentes = $numDentes;
    }
}


class Aves extends Animal
{
    private $capacidadeVoo;
    private $tamanhoDoOvo;

    function __construct($reproduçao, $alimentacao, $tamanho, $tipoCelular, $capacidadeVoo, $tamanhoDoOvo)
    {
        parent::__construct($reproduçao, $alimentacao, $tamanho, $tipoCelular);
        $this->capacidadeVoo = $capacidadeVoo;
        $this->tamanhoDoOvo = $tamanhoDoOvo;
    }
}

class Vegetal extends SerVivo
{
    private $tipo;
    private $raridade;

    function __construct($tipoCelular, $tipo, $raridade)
    {
        parent::__construct($tipoCelular);
        $this->tipo = $tipo;
        $this->raridade = $raridade;
    }
}

class Arvore extends Vegetal
{
    private $tamanhoTronco;
    private $tiposDeFrutos;

    function __construct($tipoCelular, $tipo, $raridade, $tamanhoTronco, $tiposDeFrutos)
    {
        parent::__construct($tipoCelular, $tipo, $raridade);
        $this->tamanhoTronco = $tamanhoTronco;
        $this->tiposDeFrutos = $tiposDeFrutos;
    }
}

class Erva extends Vegetal
{
    private $qualidadeFumo;
    private $preçoCota;
    private $disponibilidade;

    function __construct(
        $tipoCelular,
        $tipo,
        $raridade,
        $tamanhoTronco,
        $tiposDeFrutos,
        $qualidadeFumo,
        $preçoCota,
        $disponibilidade
    ) {
        parent::__construct($tipoCelular, $tipo, $raridade, $tamanhoTronco, $tiposDeFrutos);
        $this->qualidadeFumo = $qualidadeFumo;
        $this->preçoCota = $preçoCota;
        $this->disponibilidade = $disponibilidade;
    }
}
