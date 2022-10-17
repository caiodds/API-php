<?php
/**
 * Classe ContratoController
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Controllers;
 
 use \App\Entities\Produtos as Produtos;
 use \App\Models\ProdutoModel as ProdutoModel;
 
 class ProdutosController extends Controller{
     private Produtos $entity;
     private ProdutosModels $model;
    
     public function __construct(){
        parent::__construct();
        $this->model = new \App\Models\ProdutosModels();
        
     }

     /**
      * Obter todos os registros da base de dados
      * 
      * @return json    
      */
     public function getAll(){  
        $contatos = $this->model->getAll();
        if ( $contatos ){
            return json_encode ( ['success'=> true, 
               'data' => $contatos, 
               'message' => 'dados obtidos com sucesso.' ]);
        }

        return ( ['success'=> false, 
                  'data' => $contatos, 
                  'message' => 'consulta não retornou dados' ]);
     }

     public function getById($id){
        $produtos = $this->model->getById($id);
         return json_encode ([
                             'success'=>$this->success, 
                             'data'=>$produtos, 
                             'message' => 'registro obtido com sucesso' 
                            ]);
     }

     //Incluir um novo registro na base de dados
     public function add(Produtos $entity){
        $this->model = new ProdutosModel();
       
        if ( $this->model->add($entity) ){
            $this->success = true;
            $this->data = [];
            $this->msg = 'Registro atualizado com sucesso.';
        } 

        return json_encode([
            'success'=>$this->success, 
            'data'=>$this->data,
            'message'=>$this->msg ]);
     }

     //Atualiza o contato na base de dados
     public function update(Produtos $produto){
        if ( $this->model->update($produto) ){
            $this->success = true;
            $this->data = [];
            $this->msg = 'Registro atualizado com sucesso.';
        }

        return json_encode([
                             'success'=>$this->success, 
                             'data'=>$this->data,
                             'message'=>$this->msg ]);
     }

     //Excluir um novo registro na base de dados
     public function delete($id){
        if ( $this->model->delete($id) ){
            $this->success = true;
            $this->data = [];
            $this->msg = 'Registro excluído com sucesso.';
        }

        return json_encode([
                             'success'=>$this->success, 
                             'data'=>$this->data,
                             'message'=>$this->msg ]);
     }
}