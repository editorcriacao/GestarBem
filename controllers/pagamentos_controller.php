<?php
    class PagamentosController extends AppController{
        var $name = 'Pagamentos';
        var $paginate = array('limit'=>'7');

        function verificarPagamento(){
            $id = $this->Session->read('Usuario.id');
            $this->set('pagamentos', $this->paginate('Pagamento', array('Pagamento.usuario_id'=>$id)));
        }
    }
?>
