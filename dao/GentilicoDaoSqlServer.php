<?php

require_once "models/Gentilico.php";

class GentilicoDaoSqlServer implements GentilicoDao
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function addGentilico(Gentilico $g)
    {

        $sql = $this->pdo->prepare(
            "INSERT INTO gentilico (nome, ativo)
                VALUES (:nome, :ativo)"
        );

        $sql->bindValue(':nome', $g->getNome());
        $sql->bindValue(':ativo', $g->getAtivo());

        $sql->execute();

        return $g;
    }

    public function findByGentilico($nome)
    {
        $sql = $this->pdo->prepare("SELECT * FROM gentilico where nome=:nome");
        $sql->bindValue(':nome', $nome);
        $sql->execute();

        return $sql->fetch();
    }
    
    public function findByGentilicoAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM gentilico");
        $g = $sql->fetchAll();

        if (count($g) > 0) {

            foreach ($g as $gent) {

                $g = new Gentilico();

                $g->setCod_gentilico($gent['cod_gentilico']);
                $g->setNome($gent['nome']);

                $array[] = $g;
            }
        }
        return $array;
    }
}
