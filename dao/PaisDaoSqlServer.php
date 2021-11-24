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

        //$arrayName = explode(',', $keys);

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

        $sql = $this->pdo->query("SELECT * FROM pais");
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
        $sql = $this->pdo->prepare(
            "SELECT cod_pais FROM pais WHERE cod_pais = :cod_pais"
        );

        $sql->bindValue(':cod_pais', $id);

        $sql->execute();

        return $sql->fetch();
    }

    public function findByGentilico()
    {
        $sql = $this->pdo->query("SELECT * FROM gentilico");
        return $sql->fetchAll();
    }

    public function findByNome($nome)
    {
        $sql = $this->pdo->prepare("SELECT nome_pt FROM pais WHERE nome_pt = :nome_pt");
        $sql->bindValue(':nome_pt', $nome);

        $sql->execute();

        return $sql->fetch();
    }
}
