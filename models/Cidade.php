<?php

    class Cidade{
        private $codCidade;
        private $nome;
        private $idEstado;
        private $ibge;
 
        public function getCodCidade()
        {
                return $this->codCidade;
        }

        public function setCodCidade($codCidade)
        {
                $this->codCidade = $codCidade;

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

        public function getIdEstado()
        {
                return $this->idEstado;
        }

        public function setIdEstado($idEstado)
        {
                $this->idEstado = $idEstado;

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
        
    }

    interface CidadeDao{
        public function addCidade(Cidade $c);
        public function findAllCidade();
        public function findByName($nomeCidade, $idEstado);
        public function findByAllE($id);
        public function update(Cidade $cidade);
        public function exluir($codCidade);
       
    }