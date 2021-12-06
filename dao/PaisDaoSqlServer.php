<?php

require "models/Pais.php";

class PaisDaoSqlServer implements PaisDao
{
    private $pdo;

    public function __construct(PDO $drive)
    {
        $this->pdo = $drive;
    }

    public function addPais(Pais $p)
    {
        $campo = 'nome, nome_pt, sigla, bacen, id_gentilico';
        $keys  = ':nome, :nome_pt, :sigla, :bacen, :id_gentilico';

        $sql = $this->pdo->prepare("INSERT INTO pais ($campo) values ($keys)");

        $sql->bindValue(':nome', $p->getNome());
        $sql->bindValue(':nome_pt', $p->getNomePt());
        $sql->bindValue(':sigla', $p->getSigla());
        $sql->bindValue(':bacen', $p->getBacen());
        $sql->bindValue(':id_gentilico', $p->getIdGentilico());

        $sql->execute();

        return $p;
    }

    public function findAllPais()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT TOP (100) * FROM pais ORDER BY cod_pais DESC");
        $data = $sql->fetchAll();

        if (count($data) > 0) {
            foreach ($data as $pais) {

                $p = new Pais();

                $p->setCodPais($pais['cod_pais']);
                $p->setNome($pais['nome']);
                $p->setNomePt($pais['nome_pt']);
                $p->setBacen($pais['bacen']);
                $p->setSigla($pais['sigla']);

                $array[] = $p;
            }
        }

        return $array;
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM pais WHERE cod_pais = :cod_pais");
        
        $sql->bindValue(':cod_pais', $id);
        $sql->execute();

        $pais = $sql->fetch();

            $editarPais = new Pais();

            $editarPais->setCodPais($pais['cod_pais']);
            $editarPais->setNome($pais['nome']);
            $editarPais->setNomePt($pais['nome_pt']);
            $editarPais->setSigla($pais['sigla']);
            $editarPais->setBacen($pais['bacen']);
            $editarPais->setIdGentilico($pais['id_gentilico']);
        
        return $editarPais;
    }

    public function findByGentilico()
    {
        $sql = $this->pdo->query("SELECT * FROM gentilico");
        return $sql->fetchAll();
    }

    public function findByNome($nome)
    {
        $sql = $this->pdo->prepare("SELECT nome, nome_pt FROM pais WHERE nome_pt = :nome_pt");

        $sql->bindValue(':nome_pt', $nome);
        $sql->execute();

        return $sql->fetch();
    }

    public function editar($idPais)
    {
        $sql = $this->pdo->prepare("UPDATE pais SET nome = :nome, sigla = :sigla, bacen = :bacen WHERE cod_pais = :cod_pais");

        $sql->bindValue(':cod_pais', $idPais->getCodPais());
        $sql->bindValue(':nome', $idPais->getNome());
        $sql->bindValue(':sigla', $idPais->getSigla());
        $sql->bindValue(':bacen', $idPais->getBacen());

        $sql->execute();

        return true;
    }

    public function excluir($idPais)
    {
        $sql = $this->pdo->prepare("DELETE pais WHERE cod_pais = :cod_pais");

        $sql->bindValue(':cod_pais', $idPais);
        $sql->execute();
    }
}
