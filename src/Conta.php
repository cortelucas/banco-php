<?php


class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo = 0;

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
        $this->validaNomeTitular($nomeTitular);
        $this->saldo = $saldo;
    }

    /**
     * @return string
     */
    public function getCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    /**
     * @param string $cpfTitular
     */
    public function setCpfTitular(string $cpfTitular): void
    {
        $this->cpfTitular = $cpfTitular;
    }

    /**
     * @return string
     */
    public function getNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    /**
     * @param string $nomeTitular
     */
    public function setNomeTitular(string $nomeTitular): void
    {
        $this->nomeTitular = $nomeTitular;
    }

    /**
     * @return float
     */
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * @param float $saldo
     */
    public function setSaldo(float $saldo): void
    {
        $this->saldo = $saldo;
    }


    public function sacar(float $valorSacar): void
    {
        if ($valorSacar > $this->saldo) {
            echo "Saldo Indisponivel";
            return;
        }
        $this->saldo -= $valorSacar;
    }

    public function depositar(float $valorDepositar)
    {
        if ($valorDepositar < 0){
            echo "Valor precisa ser positivo";
            return;
        }
        $this->saldo += $valorDepositar;
    }

    public function transferir(float $valorTransferir, Conta $contaDestino): void
    {
        if ($valorTransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }
        $this->sacar($valorTransferir);
        $contaDestino->depositar($valorTransferir);
    }

    private function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome deve ter ao menos 5 caracteres";
            exit();
        }
    }
}