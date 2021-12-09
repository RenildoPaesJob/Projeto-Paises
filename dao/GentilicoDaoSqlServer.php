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
        $sql = $this->pdo->prepare("SELECT * FROM gentilico WHERE nome=:nome");
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

                $gt = new Gentilico();

                $gt->setCod_gentilico($gent['cod_gentilico']);
                $gt->setNome($gent['nome']);

                $array[] = $gt;
            }
        }
        return $array;
    }

    public function findById($id)
    {

        $sql = $this->pdo->prepare("SELECT * FROM gentilico WHERE cod_gentilico = :cod_gentilico");

        $sql->bindValue(':cod_gentilico', $id);
        $sql->execute();

        $gentilico = $sql->fetch();

        $editarGentilico = new Gentilico();

        $editarGentilico->setCod_gentilico($gentilico['cod_gentilico']);
        $editarGentilico->setNome($gentilico['nome']);
        $editarGentilico->setAtivo($gentilico['ativo']);

        return $editarGentilico;
    }

    public function update($gentilico)
    {
        $sql = $this->pdo->prepare("UPDATE gentilico SET nome = :nome, ativo = :ativo WHERE cod_gentilico = :cod_gentilico");
        $sql->bindValue(':cod_gentilico', $gentilico->getCod_gentilico());
        $sql->bindValue(':nome', $gentilico->getNome());
        $sql->bindValue(':ativo', $gentilico->getAtivo());

        $sql->execute();
        return true;
    }

    public function delete($codGentilico)
    {
        $sql = $this->pdo->prepare("DELETE gentilico WHERE cod_gentilico = :cod_gentilico");
        $sql->bindValue(':cod_gentilico', $codGentilico);

        $sql->execute();
        return;
    }


}
