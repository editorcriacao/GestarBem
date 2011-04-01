<?php

Class ArtigosController extends AppController {

    var $name = 'Artigos';

    function index() {
        $artigo = $this->Artigo->find('all', array('limit' => 3, 'conditions' => array('Artigo.site' => '3'), 'order' => array('Artigo.created' => 'DESC')));

        if (isset($this->params['requested'])) {
            return $artigo;
        } else {
            $this->set('artigo', $artigo);
        }
    }

     function destaques() {
        $destaques = $this->Artigo->find('all', array(
                    'conditions' => array('Artigo.site' => 3, 'Artigo.destaque'=>1),
                    'order' => array('Artigo.created' => 'Desc'),
                    'limit' => 3));

        if (isset($this->params['requested'])) {
            return $destaques;
        } else {
            $this->set('destaques', $destaques);
        }
    }

    function recentes() {
        $ultimasMaterias = $this->Artigo->find('all', array(
                    'conditions' => array('Artigo.site' => 3),
                    'order' => array('Artigo.created' => 'Desc'),
                    'limit' => 3));

        if (isset($this->params['requested'])) {
            return $ultimasMaterias;
        } else {
            $this->set('ultimasMaterias', $ultimasMaterias);
        }
    }

    function ultimasEducacao() {
        $ultimasEducacao = $this->Artigo->find('first', array(
                    'conditions' => array('Artigo.site' => 3, 'Artigo.editoria_id'=>21),
                    'order' => array('Artigo.created' => 'Desc')));

        if (isset($this->params['requested'])) {
            return $ultimasEducacao;
        } else {
            $this->set('ultimasEducacao', $ultimasEducacao);
        }
    }

    function ultimasNutricao() {
        $ultimasNutricao = $this->Artigo->find('first', array(
                    'conditions' => array('Artigo.site' => 3, 'Artigo.editoria_id'=>24),
                    'order' => array('Artigo.created' => 'Desc')));

        if (isset($this->params['requested'])) {
            return $ultimasNutricao;
        } else {
            $this->set('ultimasNutricao', $ultimasNutricao);
        }
    }

    function ultimasVestuario() {
        $ultimasVestuario = $this->Artigo->find('first', array(
                    'conditions' => array('Artigo.site' => 3, 'Artigo.editoria_id'=>25),
                    'order' => array('Artigo.created' => 'Desc')));

        if (isset($this->params['requested'])) {
            return $ultimasVestuario;
        } else {
            $this->set('ultimasVestuario', $ultimasVestuario);
        }
    }

    function ultimasEspecial() {
        $ultimasEspecial = $this->Artigo->find('first', array(
                    'conditions' => array('Artigo.site' => 3, 'Artigo.editoria_id'=>28),
                    'order' => array('Artigo.created' => 'Desc')));

        if (isset($this->params['requested'])) {
            return $ultimasEspecial;
        } else {
            $this->set('ultimasEspecial', $ultimasEspecial);
        }
    }

    function ver($id) {
        $artigo = $this->Artigo->find('first', array('conditions' => array('Artigo.id' => $id)));
        $this->set('artigo', $artigo);
        $this->set('title_for_layout', $artigo['Artigo']['titulo']);
        $this->Artigo->UpdateAll(array('Artigo.cliques' => $artigo['Artigo']['cliques']+=1), array('Artigo.id' => $id));
        $this->set('relacionado', $this->Artigo->find('all', array('conditions' => array('Artigo.editoria_id' => $artigo['Artigo']['editoria_id'], 'Artigo.id <>' => $artigo['Artigo']['id']))));
        $this->Set('comentarios', $this->Artigo->Comentario->find('all', array('conditions' => array('Comentario.artigo_id' => $id))));
    }

}

?>
