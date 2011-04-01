<?php
    Class BuscasController extends AppController{
        var $name = 'Buscas';
        var $uses = array('Artigo', 'Revista');

        function pesquisa(){
                        $this->set('resultado', $this->Artigo->find('all', array('conditions'=> array('MATCH(Artigo.titulo, Artigo.subTitulo, Artigo.texto)AGAINST("'.$this->data['Busca']['busca'].'" in boolean mode)', 'Artigo.site' => '3'))));
        }
    }
?>
