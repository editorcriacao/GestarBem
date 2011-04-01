<?php
    Class FilesController extends AppController{
        var $name = 'Files';

        function beforeFilter(){
            if($this->Session->read('Usuario.logado') == 0 && $this->Session->read('Usuario.assinante') == 1){
                $this->Session->setFlash('Você não pode ter acesso a essa area!', 'msg_bad');
                $this->redirect('/');
            }
        }
    }
?>
