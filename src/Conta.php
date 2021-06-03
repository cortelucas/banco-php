<?php


class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;

    /**
     * Conta constructor.
     * @param string $cpfTitular
     * @param string $nomeTitular
     * @param float $saldo
     */
    public function __construct(string $cpfTitular, string $nomeTitular, float $saldo)
    {
        $this->cpfTitular = $cpfTitular;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = $saldo;
    }


    public function sacar(float $valorSacar): void
    {
        if ($valorSacar > $this->saldo) {
            echo "Saldo Indisponivel";
        } else {
            $this->saldo -= $valorSacar;
        }
    }

    public function depositar(float $valorDepositar)
    {
        if ($valorDepositar < 0){
            echo "Valor precisa ser positivo";
        } else {
            $this->saldo += $valorDepositar;
        }
    }


}