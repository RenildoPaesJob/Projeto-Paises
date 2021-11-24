<?php

    class Estado{
        private $codEstado;
        private $nome;
        private $uf;
        private $ibge;
        private $idPais;
        private $ddd;

        public function getCodEstado()
        {
                return $this->codEstado;
        }

        public function setCodEstado($codEstado)
        {
                $this->codEstado = $codEstado;

                return $this;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }
 
        public function getUf()
        {
                return $this->uf;
        }
 
        public function setUf($uf)
        {
                $this->uf = $uf;

                return $this;
        }
 
        public function getIbge()
        {
                return $this->ibge;
        }

        public function setIbge($ibge)
        {
                $this->ibge = $ibge;

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

        public function getDdd()
        {
                return $this->ddd;
        }

        public function setDdd($ddd)
        {
                $this->ddd = $ddd;

                return $this;
        }
    }

    interface EstadoDao{
        public function addEstado(Estado $e);
        public function findByName($nome, $idPais);
        public function findByEstadoAll();
    }