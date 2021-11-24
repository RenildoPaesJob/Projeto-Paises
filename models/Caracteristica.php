<?php
        require_once "Pais.php";
        
    class Caracteristica extends Pais{
        private $codCaracteristica;
        private $idPais;
        private $area;
        private $populacao;
        private $capital;
        private $pib;
        private $tipoGoverno;
        private $dataInfomacao;
 
        public function getCodCaracteristica()
        {
                return $this->codCaracteristica;
        }

        public function setCodCaracteristica($codCaracteristica)
        {
                $this->codCaracteristica = $codCaracteristica;

                return $this;
        }

        public function getIdPais()
        {
                return $this->idPais;
        }

        public function setIdPais($idPais)
        {
                $this->idPais = $idPais;

                return $this;
        }

        public function getArea()
        {
                return $this->area;
        }

        public function setArea($area)
        {
                $this->area = $area;

                return $this;
        }

        public function getPopulacao()
        {
                return $this->populacao;
        }

        public function setPopulacao($populacao)
        {
                $this->populacao = $populacao;

                return $this;
        }

        public function getCapital()
        {
                return $this->capital;
        }

        public function setCapital($capital)
        {
                $this->capital = $capital;

                return $this;
        }

        public function getPib()
        {
                return $this->pib;
        }

        public function setPib($pib)
        {
                $this->pib = $pib;

                return $this;
        }

        public function getTipoGoverno()
        {
                return $this->tipoGoverno;
        }

        public function setTipoGoverno($tipoGoverno)
        {
                $this->tipoGoverno = $tipoGoverno;

                return $this;
        }

        public function getDataInfomacao()
        {
                return $this->dataInfomacao;
        }

        public function setDataInfomacao($dataInfomacao)
        {
                $this->dataInfomacao = $dataInfomacao;

                return $this;
        }
    }

    interface CaracteristicaDao{
        public function add(Caracteristica $p);
        public function findDataInfo($idPais, $dataInfo);
        public function findTopPib($top);
    }