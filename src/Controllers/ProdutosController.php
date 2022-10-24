<?php
/**
 * Classe ContratoController
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 1.0
 * 
 */

 namespace App\Controllers;
 
 use \App\Entities\Produtos as Produtos;
 use \App\Models\ProdutosModel as ProdutosModel;
 
 class ProdutosController extends Controller{
     private Produtos $entity;
     private ProdutosModel $model;
    
     public function __construct(){
        parent::__construct();
        $this->model = new \App\Models\ProdutosModel();
        
     }

     /**
      * Obter todos os registros da base de dados
      * 
      * @return json    
      */
     public function getAll(){  
        $produtos = $this->model->getAll();
        // die(var_dump($produtos));
        if ( $produtos ){
            return json_encode ( ['success'=> true, 
               'data' => $produtos, 
               'message' => 'dados obtidos com sucesso.' ]);
        }

        return ( ['success'=> false, 
                  'data' => $produtos, 
                  'message' => 'consulta não retornou dados' ]);
     }

     public function getById_produtos($id){
        $produtos = $this->model->getById_produtos($id);
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
     public function update(Produtos $produtos){
        if ( $this->model->update($produtos) ){
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
     public function delete($id_produtos){
        if ( $this->model->delete($id_produtos) ){
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