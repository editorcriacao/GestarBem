<?php

class RevistasController extends AppController {

    var $name = 'Revistas';

    function beforeFilter() {
        if ($this->Session->read('Usuario.logado') == 0 && $this->Session->read('Usuario.assinante') == 1) {
            $this->Session->setFlash('Você não pode ter acesso a essa area!', 'msg_bad');
            $this->redirect('/');
        }
    }

    function ler($revista) {

        if ($this->Session->read('Usuario.logado') == 1 && $this->Session->read('Usuario.assinante') == 1) {
            $this->set('revista', $revista);
            $this->render();
        } else {
            $this->Session->setFlash('Não foi possivel acessar essa area.', 'msg_bad');
            $this->redirect('/');
        }
    }

}

?>
