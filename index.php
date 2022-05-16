<?php

class Veiculo
{
    private $velocidadeMax;
    private $velocidadeAtual;
    private $combustivel;

    protected function acelerar($velocidadeAtual, $velocidadeMax) //É uma função setter
    {
        $this->velocidadeAtual = $velocidadeAtual;
        if ($this->velocidadeMax < $velocidadeMax) {
            $this->velocidadeMax = $velocidadeMax;
        }
    }
    protected function freiar()    //É uma função setter
    {
        if ($this->velocidadeAtual > 0) {
            $this->velocidadeAtual = 0;
            $this->velocidadeMax = 0;
        }
    }

    protected function embarcarPassageiro($pesoPessoa) //É uma função setter
    {
        if ($pesoPessoa < $this->capacidadeCarga) {
            $this->capacidadeCarga -= $pesoPessoa;
        }
    }

    protected function currentSpeed($velAtual)     //É uma função getter
    {
        return $this->velocidadeAtual;
    }
}

class Carro extends Veiculo
{
    private $numRodas;
    private $numPortas;
}

class Caminhao extends Veiculo
{
    private $numRodas;
    private $numPortas;
    private $capacidadeCarga;

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

    public function instalarAlforge($numAlforges)
    {

        $this->qtdAlforges += $numAlforges;
    }
}
