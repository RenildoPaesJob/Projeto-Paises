<?php

require "models/Estado.php";

class EstadoDaoSqlServer implements EstadoDao
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function addEstado(Estado $e)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO estado (nome, uf, ibge, id_pais, ddd) 
                 VALUES (:nome, :uf, :ibge, :id_pais, :ddd)"
        );
        $sql->bindValue(':nome', $e->getNome());
        $sql->bindValue(':uf', $e->getUf());
        $sql->bindValue(':ibge', $e->getIbge());
        $sql->bindValue(':id_pais', $e->getIdPais());
        $sql->bindValue(':ddd', $e->getDdd());

        $sql->execute();

        return $e;
    }

    public function findByName($nome, $idPais)
    {
        $sql = $this->pdo->prepare(
            "SELECT * from estado e 
                inner join pais p on p.cod_pais = e.id_pais 
                where e.nome = :nome AND p.id_pais = :idpais");

        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':idpais', $idPais);
        $sql->execute();

        return $sql->fetch();
    }

    public function findByEstadoAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM estado");
        $data = $sql->fetchAll();

        foreach ($data as $e) {
            
            $newEstado = new Estado();

            $newEstado->setCodEstado($e['cod_estado']);
            $newEstado->setNome($e['nome']);
            $newEstado->setIdPais($e['id_pais']);
            $newEstado->setIbge($e['ibge']);

            $array[] = $newEstado;

        }

        return $array;
    }
}
