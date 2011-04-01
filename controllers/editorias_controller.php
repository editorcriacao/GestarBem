<?php
    Class EditoriasController extends AppController{
        var $name = 'Editorias';

        function index(){
            $editoria = $this->Editoria->find('all', array('conditions'=>array('site'=>3)));

                if (isset($this->params['requested'])) {
                    return $editoria;
                } else {
                    $this->set('editoria', $editoria);
                }
        }

        function ver($id){
            $this->Editoria->id = $id;
            $editoria = $this->Editoria->read();
            $this->set('title_for_layout', $editoria['Editoria']['nomeEditoria']);
            $this->set('editoria', $editoria); 
            $this->set('artigos', $this->Editoria->Artigo->find('all', array('conditions'=> array('Artigo.editoria_id'=>$id), 'order'=>array('Artigo.created'=>'DESC'))));
        }
    }
?>
