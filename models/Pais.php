<?php
        
    class Pais{
        private $codPais;
        private $nome;
        private $nomePt;
        private $sigla;
        private $bacen;
        private $idGentilico;

        public function getCodPais()
        {
                return $this->codPais;
        }

        public function setCodPais($codPais)
        {
                $this->codPais = $codPais;

                return $this;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = ucwords(trim($nome));

                return $this;
        }

        public function getNomePt()
        {
                return $this->nomePt;
        }

        public function setNomePt($nomePt)
        {
                $this->nomePt = trim($nomePt);

                return $this;
        }

        public function getSigla()
        {
                return $this->sigla;
        }

        public function setSigla($sigla)
        {
                $this->sigla = ucwords(trim($sigla));

                return $this;
        }
 
        public function getBacen()
        {
                return $this->bacen;
        }

        public function setBacen($bacen)
        {
                $this->bacen =trim($bacen);

                return $this;
        }
        
        public function getIdGentilico()
        {
                return $this->idGentilico;
        }

        public function setIdGentilico($idGentilico)
        {
                $this->idGentilico = $idGentilico;

                return $this;
        }
    }

    interface PaisDao{
        public function addPais(Pais $p);
        public function findAllPais();
        public function findById($id);
        public function findByGentilico();
        public function findByNome($nome);
        public function editar($idPais);
        public function excluir($idPais);
    }