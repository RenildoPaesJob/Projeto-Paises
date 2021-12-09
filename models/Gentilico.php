<?php

 class Gentilico{
     private $cod_gentilico;
     private $nome;
     private $ativo;

     public function getCod_gentilico()
     {
          return $this->cod_gentilico;
     }

     public function setCod_gentilico($cod_gentilico)
     {
          $this->cod_gentilico = $cod_gentilico;

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

     public function getAtivo()
     {
          return $this->ativo;
     }

     public function setAtivo($ativo)
     {
          $this->ativo = $ativo;

          return $this;
     }
 }

 interface GentilicoDao{
    public function addGentilico(Gentilico $g); 
    public function findByGentilico($nome);
    public function update(Gentilico $gentilico);
    public function findByGentilicoAll();
    public function findById($id);
    public function delete($codGentilico);
}