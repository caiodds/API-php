<?php
/**
 * Model contato
 * 
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Models;

 use \App\Persistence\Conexao as Conexao;

 class ProdutosModel  {
    
    protected  $con;
    protected \App\Entities\Produtos $entity;
    
    public function __construct() {
        $this->con = Conexao::getInstance();
    }

    public function getAll(){
        $sql = 'SELECT * FROM produto';
        $query = $this->con->query($sql, \PDO::FETCH_OBJ);

        $data = [];
        foreach( $query->fetchAll() as $row ) { 
             $data[] = $row;
        }
        
        return $data;
    }

    public function add(\App\Entities\Produtos $entity): bool{

        //die(var_dump($entity));

        $sql  = ' INSERT INTO contatos (id_produtos, nome_produto, descricao_produto) ';
        $sql .= ' VALUES(?,?,?,?,? ) ' ;

        $stm = $this->con->prepare($sql);

        $stm->bindValue(1, $entity->getId_produto());
        $stm->bindValue(2, $entity->getNome_produto());
        $stm->bindValue(3, $entity->getDescricao_produto());

        $inserted = $stm->execute();

        //die(var_dump($inserted));

        // return [
        //     'success' => $inserted,
        //     'data' => [],
        //     'message' => $inserted ? 'registro salvo com sucesso' : 'não foi possível incluir o registro'
        // ];

        return $inserted;
    }

    public function update(\App\Entities\Produtos $entity): bool{
           //die(var_dump($entity));

           $sql  = ' UPDATE contatos                             
                            SET nome_produto = ? , 
                            descricao_produto = ? , ';

           $sql .= ' WHERE id = ? ' ;
              
           $stm = $this->con->prepare($sql);
   
           $stm->bindValue(1, $entity->getId_produto());
           $stm->bindValue(2, $entity->getNome_produto());
           $stm->bindValue(3, $entity->getDescricao_produto());
   
           $updated = $stm->execute();
   
           //die(var_dump($inserted));
   
        //    return [
        //        'success' => $updated,
        //        'data' => [],
        //        'message' => $update ? 'registro salvo com sucesso' : 'não foi possível incluir o registro'
        //    ];
   
           return $updated;
    }

    public function delete($id){
        $sql  = ' DELETE FROM produto '; 
        $sql .= ' WHERE id_produto = ? ' ;

        $stm = $this->con->prepare($sql);
        $stm->bindValue(1, $id);

        $deleted = $stm->execute();


         return json_encode([
               'success' => $deleted,
               'data' => [],
               'message' => $deleted ? 'registro excluído com sucesso' : 'não foi possível excluir o registro'
           ]);

        //return $updated;      
    } 

 }