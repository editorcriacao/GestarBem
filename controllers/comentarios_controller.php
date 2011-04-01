<?php

class ComentariosController extends AppController {

    var $name = 'Comentarios';

    function ver($id) {
        $comentarios = $this->Comentario->find('all', array('conditions' => array('Comentario.site' => 2, 'Comentario.artigo_id'=>$id), 'order'=>array('Comentario.created'=> 'DESC')));

        if (isset($this->params['requested'])) {
            return $comentarios;
        } else {
            $this->set('comentarios', $comentarios);
        }
    }

    function adicionar() {

        if (!empty($this->data)) {
            if($this->data['Comentario']['comentario'] == 'Deixe seu comentário' || empty($this->data['Comentario']['comentario'])){
                $this->Session->setFlash('Favor faça seu comentário.', 'msg_bad');
                $this->redirect(array('controller'=>'artigos', 'action'=>'ver', $this->data['Comentario']['artigo_id']));
            }
           if($this->Comentario->save($this->data)){
               $this->redirect(array('controller'=>'artigos', 'action'=>'ver', $this->data['Comentario']['artigo_id']));
           }
        }
    }

}

?>
