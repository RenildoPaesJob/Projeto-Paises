<?php

    require "models/Caracteristica.php";

    class CaracteristicaDaoSqlServer implements CaracteristicaDao{
        private $pdo;

        public function __construct(PDO $driver)
        {
            $this->pdo = $driver;
        }

        public function add(Caracteristica $p){

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
            $sql->bindValue(':dataInfo',$p->getDataInfomacao());

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
            $sql->bindValue(':data_informacao',$dataInfo);

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
            
            $sql->bindValue(":top_pib",$top, PDO::PARAM_INT);
            $sql->execute();
            $p = $sql->fetchAll();

            // print_r($p);
            // exit;

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
    }