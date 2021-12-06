<?php

require "models/Caracteristica.php";

class CaracteristicaDaoSqlServer implements CaracteristicaDao
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Caracteristica $p)
    {

        $sql = $this->pdo->prepare(
            "INSERT INTO caracteristica (id_pais, area, populacao, capital, pib, tipo_governo, data_informacao)
                VALUES (:pais, :area, :populacao, :capital, :pib, :tipoGoverno, :dataInfo)"
        );

        $sql->bindValue(':pais', $p->getIdPais());
        $sql->bindValue(':area', $p->getArea());
        $sql->bindValue(':populacao', $p->getPopulacao());
        $sql->bindValue(':capital', $p->getCapital());
        $sql->bindValue(':pib', $p->getPib());
        $sql->bindValue(':tipoGoverno', $p->getTipoGoverno());
        $sql->bindValue(':dataInfo', $p->getDataInfomacao());

        $sql->execute();

        return $p;
    }

    public function findDataInfo($idPais, $dataInfo)
    {
        $sql = $this->pdo->prepare(
            "SELECT id_pais, data_informacao 
                FROM caracteristica
                WHERE id_pais=:idPais 
                AND YEAR(data_informacao)=YEAR(:data_informacao)"
        );

        $sql->bindValue(':idPais', $idPais);
        $sql->bindValue(':data_informacao', $dataInfo);

        $sql->execute();

        if ($sql->fetch() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findTopPib($top)
    {
        $array = [];

        $sql = $this->pdo->prepare(
            "SELECT TOP(:top_pib) pib,capital, populacao, data_informacao, nome_pt
                 from caracteristica INNER JOIN pais on cod_pais = id_pais
                 WHERE YEAR(GETDATE()) = YEAR(data_informacao)
                 ORDER BY pib desc"
        );

        $sql->bindValue(":top_pib", $top, PDO::PARAM_INT);
        $sql->execute();
        $p = $sql->fetchAll();

        if ($sql->rowCount() > 0) {

            foreach ($p as $pais) {

                $c = new Caracteristica();

                $c->setNomePt($pais['nome_pt']);
                $c->setCapital($pais['capital']);
                $c->setPopulacao(number_format($pais['populacao'], 0, ',', '.'));
                $c->setPib(number_format(($pais['pib'])));

                $array[] = $c;
            }
            return $array;
        }
    }

    public function findByAll()
    {
        $array = [];

        $sql = $this->pdo->query(
            "SELECT c.cod_caracteristica ,p.nome_pt, c.area, c.populacao, 
                c.capital, c.pib, c.tipo_governo
                FROM pais p
                INNER JOIN caracteristica c
                ON p.cod_pais = c.id_pais ORDER BY p.nome_pt DESC"
        );

        $data = $sql->fetchAll();

        if (count($data) > 0) {

            foreach ($data as $caracteristica) {

                $c = new Caracteristica();
                
                $c->setCodCaracteristica($caracteristica['cod_caracteristica']);
                $c->setNome($caracteristica['nome_pt']);
                $c->setArea($caracteristica['area']);
                $c->setPopulacao($caracteristica['populacao']);
                $c->setCapital($caracteristica['capital']);
                $c->setPib($caracteristica['pib']);
                $c->setTipoGoverno($caracteristica['tipo_governo']);

                $array[] = $c;
            }

            return $array;
        }
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM caracteristica where cod_caracteristica = :cod_caracteristica");
        
        $sql->bindValue(':cod_caracteristica', $id);
        $sql->execute();
        
        $caract = $sql->fetch();

            $caracteristica = new Caracteristica();

            $caracteristica->setCodCaracteristica($caract['cod_caracteristica']);
            $caracteristica->setArea($caract['area']);
            $caracteristica->setPopulacao($caract['populacao']);
            $caracteristica->setCapital($caract['capital']);
            $caracteristica->setPib($caract['pib']);
            $caracteristica->setTipoGoverno($caract['tipo_governo']);

        return $caracteristica;
    }

    public function update($caracteristica)
    {
        // $array = [];
        $query = "area = :area, populacao = :populacao,  capital = :capital, pib = :pib, tipo_governo = :tipo_governo";
        $sql = $this->pdo->prepare("UPDATE caracteristica SET $query  WHERE  cod_caracteristica = :cod_caracteristica");
       
        $sql->bindValue(':cod_caracteristica', $caracteristica->getCodCaracteristica());
        $sql->bindValue(':area', $caracteristica->getArea());
        $sql->bindValue(':populacao', $caracteristica->getPopulacao());
        $sql->bindValue(':capital', $caracteristica->getCapital());
        $sql->bindValue(':pib', $caracteristica->getPib());
        $sql->bindValue(':tipo_governo', $caracteristica->getTipoGoverno());

    
        $sql->execute();

        return true;
    }

    public function delete($codCaracteristica)
    {
        $sql = $this->pdo->prepare(
            "DELETE caracteristica WHERE cod_caracteristica = :cod_caracteristica"
        );
        
        $sql->bindValue(':cod_caracteristica', $codCaracteristica);

        $sql->execute();
    }
}
