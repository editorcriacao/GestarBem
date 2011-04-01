<?php

Class AppController extends Controller {

    var $components = array('Session', 'Email', 'RequestHandler');
    var $helpers = array('Html', 'Session', 'Javascript', 'Form');

    function URLprevious() {
        return $this->Session->read('history.current');
    }

    function URLsave() {
        $current = $this->params['url']['url'];
        if ($this->Session->read('history.current') != $current) {
            $this->Session->write('history.previous', $this->Session->read('history.current'));
            $this->Session->write('history.current', $current);
        }
    }

    function sessionUsuario($data) {
        $this->Session->write('Usuario.id', $data['Usuario']['id']);
        $this->Session->write('Usuario.primeiroNome', $data['Usuario']['nome_usuario']);
        $this->Session->write('Usuario.email', $data['Usuario']['email_usuario']);
        $this->Session->write('Usuario.login', $data['Usuario']['login_usuario']);
        $this->Session->write('Usuario.assinante', $data['Usuario']['assinante_usuario']);
        $this->Session->write('Usuario.logado', '1');
    }

}

?>
