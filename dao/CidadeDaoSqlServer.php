<?php

require "models/Cidade.php";

class CidadeDaoSqlServer implements CidadeDao
{
    private $pdo;

    public function __construct(PDO $drive)
    {
        $this->pdo = $drive;
    }

    public function addCidade(Cidade $c)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO cidade (nome, id_estado, ibge) 
                VALUES (:nome, :id_estado, :ibge)"
        );

        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':id_estado', $c->getIdEstado());
        $sql->bindValue(':ibge', $c->getIbge());

        $sql->execute();

        return $c;
    }

    public function findAllCidade()
    {
        $array = [];

        $sql    = $this->pdo->query("SELECT TOP (50) * FROM cidade");
        $data   = $sql->fetchAll();

        foreach ($data as $c) {

            $newCidade = new Cidade();

            $newCidade->setCodCidade($c['cod_cidade']);
            $newCidade->setNome($c['nome']);
            $newCidade->setIdEstado($c['id_estado']);
            $newCidade->setIbge($c['ibge']);

            $array[] = $newCidade;
        }

        return $array;
    }

    public function findByName($nomeCidade, $idEstado)
    {
        $sql = $this->pdo->prepare(
            "SELECT * from cidade c 
                inner join estado e on e.cod_estado = c.id_estado
                where c.nome = :nomeCidade AND c.id_estado = :id_estado"
        );

        $sql->bindValue(':nomeCidade', $nomeCidade);
        $sql->bindValue(':id_estado', $idEstado);
        $sql->execute();

        return $sql->fetch();
    }

    public function findByAllE($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM cidade WHERE cod_cidade = :cod_cidade");
        $sql->bindValue(':cod_cidade', $id);
        $sql->execute();

        $cidade = $sql->fetch();

        $newCidade = new Cidade();

        $newCidade->setCodCidade($cidade['cod_cidade']);
        $newCidade->setNome($cidade['nome']);
        $newCidade->setIdEstado($cidade['id_estado']);
        $newCidade->setIbge($cidade['ibge']);

        return $newCidade;
    }

    public function update($cidade)
    {

        $sql = $this->pdo->prepare("UPDATE cidade SET nome = :nome, ibge = :ibge WHERE cod_cidade = :cod_cidade");

        $sql->bindValue(':cod_cidade', $cidade->getCodCidade());
        $sql->bindValue(':nome', $cidade->getNome());
        $sql->bindValue(':ibge', $cidade->getIbge());

        $sql->execute();
        
        return true;
    }

    public function exluir($codCidade)
    {
        $sql = $this->pdo->prepare("DELETE cidade WHERE cod_cidade = :cod_cidade");

        $sql->bindValue(':cod_cidade', $codCidade);
        $sql->execute();

        return;
    }
}
