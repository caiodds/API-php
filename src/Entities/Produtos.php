<?php
/**
 * Model contato
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 0.1
 * 
 */

 //Entity Contato
 namespace App\Entities;

 class Produtos {

    private int $id_produtos;
    private string $nome_produto;
    private string $descricao_produto;
    private string $valor_unitario;

  

    /**
     * Get the value of id_produtos
     */ 
    public function getId_produtos()
    {
        return $this->id_produtos;
    }

    /**
     * Set the value of id_produtos
     *
     * @return  self
     */ 
    public function setId_produtos($id_produtos)
    {
        $this->id_produtos = $id_produtos;

        return $this;
    }

    /**
     * Get the value of nome_produto
     */ 
    public function getNome_produto()
    {
        return $this->nome_produto;
    }

    /**
     * Set the value of nome_produto
     *
     * @return  self
     */ 
    public function setNome_produto($nome_produto)
    {
        $this->nome_produto = $nome_produto;

        return $this;
    }

    /**
     * Get the value of descricao_produto
     */ 
    public function getDescricao_produto()
    {
        return $this->descricao_produto;
    }

    /**
     * Set the value of descricao_produto
     *
     * @return  self
     */ 
    public function setDescricao_produto($descricao_produto)
    {
        $this->descricao_produto = $descricao_produto;

        return $this;
    }

    /**
     * Get the value of valor_unitario
     */ 
    public function getValor_unitario()
    {
        return $this->valor_unitario;
    }

    /**
     * Set the value of valor_unitario
     *
     * @return  self
     */ 
    public function setValor_unitario($valor_unitario)
    {
        $this->valor_unitario = $valor_unitario;

        return $this;
    }
 }  