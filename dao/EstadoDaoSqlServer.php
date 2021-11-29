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
                where e.nome = :nome AND p.cod_pais = :cod_pais"
        );

        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':cod_pais', $idPais);
        $sql->execute();

        return $sql->fetch();
    }

    public function findByEstadoAll()
    {
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM estado");
        $data = $sql->fetchAll();

        foreach ($data as $e) {

            $newEstado = new Estado();

            $newEstado->setCodEstado($e['cod_estado']);
            $newEstado->setNome($e['nome']);
            $newEstado->setUf($e['uf']);
            $newEstado->setDdd($e['ddd']);
            $newEstado->setIdPais($e['id_pais']);
            $newEstado->setIbge($e['ibge']);

            $array[] = $newEstado;
        }

        return $array;
    }

    public function findEstadoIdPais($idPais)
    {
        $array = [];

        $sql = $this->pdo->prepare("SELECT cod_estado, nome FROM estado WHERE id_pais = :id_pais");
        $sql->bindValue(":id_pais", $idPais);
        $sql->execute();

        $estados = $sql->fetchAll();

        foreach ($estados as $e) {

            $est = new Estado();

            $est->setCodEstado($e['cod_estado']);
            $est->setNome($e['nome']);

            $array[] = [
                'cod_estado' => $est->getCodEstado(),
                'nome' => $est->getNome()
            ];
        }

        return $array;
    }

    public function findById($id){
        
        $sql = $this->pdo->prepare("SELECT * FROM estado WHERE cod_estado = :cod_estado");
        $sql->bindValue(':cod_estado', $id);
        $sql->execute();

        $upEstado = $sql->fetch();

            $estado = new Estado();

            $estado->setCodEstado($upEstado['cod_estado']);
            $estado->setNome($upEstado['nome']);
            $estado->setUf($upEstado['uf']);
            $estado->setIbge($upEstado['ibge']);
            $estado->setDdd($upEstado['ddd']);
            $estado->setIdPais($upEstado['id_pais']);

        return $estado;

    }

    public function editar(Estado $idEstado)
    {
        $sql = $this->pdo->prepare("UPDATE estado SET nome = :nome, uf = :uf, ibge = :ibge, ddd = :ddd WHERE cod_estado = :cod_estado");
        $sql->bindValue(':cod_estado', $idEstado->getCodEstado());
        $sql->bindValue(':nome', $idEstado->getNome());
        $sql->bindValue(':uf', $idEstado->getUf());
        $sql->bindValue(':ibge', $idEstado->getIbge());
        $sql->bindValue('ddd', $idEstado->getDdd());

        $sql->execute();

        return true;    
    }

    public function excluir($idEstado)
    {
        $sql = $this->pdo->prepare("DELETE estado WHERE cod_estado = :cod_estado");

        $sql->bindValue(':cod_estado', $idEstado);
        $sql->execute();
    }
}
