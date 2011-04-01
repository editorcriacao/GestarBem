<?php

Class AssinaturasController extends AppController {

    var $name = 'Assinaturas';
    var $uses = array('Assinatura', 'Revista', 'Plano', 'Usuario', 'UF', 'Pagamento', 'Promocao');
    var $components = array('RequestHandler');

    function check($id = null) {
        $current = $this->params['url']['url'];
        if ($this->Session->read('history.current') != $current) {
            $this->Session->write('history.previous', $this->Session->read('history.current'));
            $this->Session->write('history.current', $current);
        }
        if ($id == null) {
            $this->Session->setFlash('Erro, operação inválida!', 'msg_bad');
            $this->redirect('/assine');
        } else {
            $this->set('revista', $this->Revista->find('first', array('conditions' => array('Revista.id' => $id))));
        }
    }

    function suasRevistas() {
        $assinaturas = $this->Assinatura->find('first', array('conditions' => array('Assinatura.usuario_id' => $this->Session->read('Usuario.id'))));
        $revistas = $this->Revista->find('all', array('conditions' => array('Revista.id' => $assinaturas['Assinatura']['revista_id'])));
        $this->set('assinaturas', $assinaturas);
        $this->set('revistas', $revistas);
    }

    function checkPromocao($id) {
        $dados = null;
        $doisMeses = strtotime('+2 months');
        $dataFinal = date('Y-m-d H:m:s', $doisMeses);
        $dataAtual = date('Y-m-d H:m:s');
        $dados = $this->Promocao->find('first', array('conditions' => array('Promocao.codigoPromocao' => $this->Session->read('Promocao.id'))));
        $this->Usuario->updateAll(array('Usuario.assinante_usuario' => 1), array('Usuario.id' => $dados['Promocao']['usuario_id']));
        $this->Assinatura->set(array('pagamento_id' => 0, 'revista_id' => $id, 'usuario_id' => $dados['Promocao']['usuario_id'], 'data_assinatura' => $dataAtual, 'data_termino' => $dataFinal));
        $this->Assinatura->save();
        $this->Session->delete(array('Promocao.id'));
        $this->Session->setFlash('Parabéns! Agora você tem o melhor conteúdo das bancas direto na sua tela', 'msg_good');
        $this->redirect('/central-do-assinante');
    }

    function finalizarAssinatura() {
        if (empty($this->data['Assinatura']['opcao']) || empty($this->data['Assinatura']['email_usuario']) || empty($this->data['Assinatura']['login_usuario'])) {
            $this->Session->setFlash('Você deve escolher uma opção de assinatura e digitar seu email, login e senha para finalizar a assinatura. Se você não tem um cadastro na editor, favor clique aqui!', 'msg_bad');
            $this->redirect($this->Session->read('history.current'));
        } else {
            $this->set('revista', $this->Revista->find('first', array('conditions' => array('Revista.id' => $this->data['Assinatura']['revista_id']))));
            $this->set('plano', $this->Plano->find('first', array('conditions' => array('Plano.id' => $this->data['Assinatura']['opcao']))));
            $this->set('usuario', $this->Usuario->find('first', array('conditions' => array('Usuario.email_usuario' => $this->data['Assinatura']['email_usuario']))));
            $data = $this->Usuario->find('first', array('conditions' => array('Usuario.login_usuario' => $this->data['Assinatura']['login_usuario'])));
            $this->set('uf', $this->UF->find('first', array('conditions' => array('UF.id' => $data['Usuario']['estado_usuario']))));
            if (isset($this->data)) {
                $error = false;
                $uf = $this->UF->find('first', array('conditions' => array('UF.id' => $data['Usuario']['estado_usuario'])));
                $plano = $this->Plano->find('first', array('conditions' => array('Plano.id' => $this->data['Assinatura']['opcao'])));
                $revista = $this->Revista->find('first', array('conditions' => array('Revista.id' => $this->data['Assinatura']['revista_id'])));
                $total = $plano['Plano']['valor'] * $plano['Plano']['edicao'];
                if (!$data && $data['Usuario']['email'] != $this->data['Assinatura']['email_usuario']) {
                    $error = true;
                } else {
                    if (!$this->Session->read('Usuario.logado') == 1) {
                        if ($data['Usuario']['senha_usuario'] != md5($this->data['Assinatura']['senha_usuario'])) {
                            $error = true;
                        }
                    }
                }
                if (!$error) {
                    $this->PagSeguro->init(array(
                        'pagseguro' => array(
                            'email' => 'editor@editorcriacao.com.br',
                            'reference' => $this->Session->read('Usuario.id'),
                            'freight_type' => 'EN',
                            'theme' => 1,
                            'currency' => 'BRL',
                            'extra' => '',
                            'anotacoes' => $plano['Plano']['id']
                        ),
                        'definitions' => array(
                            'currency_type' => 'real',
                            'weight_type' => 'kg',
                            'encode' => 'utf-8'
                        ),
                        'customer' => array(
                            'cliente_nome' => $data['Usuario']['nome_usuario'],
                            'cliente_cep' => $data['Usuario']['cep_usuario'],
                            'cliente_end' => $data['Usuario']['endereco_usuario'],
                            'cliente_num' => $data['Usuario']['numero_usuario'],
                            'cliente_compl' => $data['Usuario']['complemento_usuario'],
                            'cliente_bairro' => $data['Usuario']['bairro_usuario'],
                            'cliente_cidade' => $data['Usuario']['cidade_usuario'],
                            'cliente_uf' => $uf['UF']['uf'],
                            'cliente_pais' => $data['Usuario']['pais_usuario'],
                            'cliente_ddd ' => $data['Usuario']['ddd_usuario'],
                            'cliente_tel' => $data['Usuario']['telefone_usuario'],
                            'cliente_email' => $data['Usuario']['email_usuario']
                        ),
                    ));
                    $this->PagSeguro->create(array(
                        'format' => array(
                            'item_id' => $revista['Revista']['id'],
                            'item_descr' => $revista['Revista']['titulo'],
                            'item_quant' => '1',
                            'item_valor' => number_format($total, 2, ',', ' '),
                            'item_frete' => '0.00',
                            'item_peso' => '000'
                            )));
                    $this->set('data', $this->PagSeguro->render());
                }
            } else {
                $this->Session->setFlash('Não foi possivel acessar, verifique se seu email, login ou senha estão corretos!', 'msg_bad');
                $this->redirect('/');
            }
        }
    }

}

function retorno() {
    if ($this->PagSeguro->isConfirmation()) {
        $this->PagSeguro->init(array(
            'pagseguro' => array(
                'email' => 'editor@editorcriacao.com.br',
                'token' => '6A6EC3696E1F40BFADD179C98CB6D45C'
            ),
            'format' => array(
                'item_id' => 'id',
                'item_descr' => 'description',
                'item_quant' => 'amount',
                'item_valor' => 'price'
                )));
        $verificado = $this->PagSeguro->confirm();
        if ($verificado == 'VERIFICADO') {
            $venda = $this->PagSeguro->getDataPayment();

            $dados = array();
            $dados['Pagamento']['id'] = $venda['pagseguro']['transaction_id'];
            $dados['Pagamento']['VendedorEmail'] = $venda['pagseguro']['email'];
            $dados['Pagamento']['usuario_id'] = $venda['pagseguro']['reference'];
            $dados['Pagamento']['Referencia'] = $venda['pagseguro']['reference'];
            $dados['Pagamento']['TipoFrete'] = $venda['pagseguro']['freight_type'];
            $dados['Pagamento']['ValorFrete'] = $venda['pagseguro']['freight_price'];
            $dados['Pagamento']['Anotacao'] = $venda['pagseguro']['anotacao'];
            $ano = substr($venda['pagseguro']['data_transaction'], 6, 4);
            $mes = substr($venda['pagseguro']['data_transaction'], 3, 2);
            $dia = substr($venda['pagseguro']['data_transaction'], 0, 2);
            $hora = substr($venda['pagseguro']['data_transaction'], 11, 2);
            $minuto = substr($venda['pagseguro']['data_transaction'], 14, 2);
            $segundo = substr($venda['pagseguro']['data_transaction'], 17, 2);
            $dados['Pagamento']['DataTransacao'] = $ano . '-' . $mes . '-' . $dia . ' ' . $hora . ':' . $minuto . ':' . $segundo;
            $dados['Pagamento']['Anotacao'] = $venda['pagseguro']['annotation'];
            $dados['Pagamento']['TipoPagamento'] = $venda['pagseguro']['type_payment'];
            $dados['Pagamento']['StatusTransacao'] = $venda['pagseguro']['status_transaction'];
            $dados['Pagamento']['revista_id'] = $venda['pagseguro']['item_id'];
            $dados['Pagamento']['ProdDescricao'] = $venda['pagseguro']['item_descr'];
            $dados['Pagamento']['ProdValor'] = $venda['pagseguro']['item_valor'];
            $dados['Pagamento']['ProdQuantidade'] = $venda['pagseguro']['item_quant'];
            $dados['Pagamento']['ProdFrete'] = $venda['pagseguro']['item_frete'];
            $dados['Pagamento']['ProdExtras'] = $venda['pagseguro']['extra'];


            $assinatura = array();
            $assinatura['Assinatura']['id'] = $venda['pagseguro']['transaction_id'];
            $assinatura['Assinatura']['revista_id'] = $dados['Pagamento']['revista_id'];
            $assinatura['Assinatura']['usuario_id'] = $dados['Pagamento']['usuario_id'];
            $assinatura['Assinatura']['data_assinatura'] = $dados['Pagamento']['DataTransacao'];
            $plano = $this->Plano->find('first', array('conditios'=>array('Plano.id'=>$dados['Pagamento']['Anotacao'])));
            $numero = 2*$plano['Plano']['edicao'];
            $doisMeses = strtotime('+'.$numero.' months' );
            $dataFinal = date($dados['Pagamento']['ProdExtras'], $doisMeses);
            $assinatura['Assinatura']['data_termino'] = $dataFinal;
            if (!empty($dados)) {
                if ($dados['Pagamento']['StatusTransacao'] == 'COMPLETO') {
                    $this->Usuario->updateAll(
                            array('Usuario.assinante_usuario' => 1),
                            array('Usuario.id' => $dados['Pagamento']['Referencia'])
                    );
                    $this->Assinatura->save($assinatura);
                    $this->Session->setFlash('Parabéns! Agora você tem o melhor conteúdo das bancas direto na sua tela', 'msg_good');
                }
                $this->Pagamento->saveAll($dados);
            }
        } else if ($verificado == 'FALSO') {
            
        } else {

        }
    }
}

?>
