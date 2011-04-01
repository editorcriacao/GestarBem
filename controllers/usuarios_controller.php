<?php

Class UsuariosController extends AppController {

    var $name = 'Usuarios';
    var $uses = array('Enquete', 'Usuario', 'UF');

    //Função para fazer o login no site
    function login() {
        if (isset($this->data)) {
            $error = false;
            $data = $this->Usuario->find('first', array('conditions' => array('Usuario.login_usuario' => $this->data['Usuario']['login_usuario'])));
            if (!$data) {
                $error = true;
            } else {
                if ($data['Usuario']['senha_usuario'] != md5($this->data['Usuario']['senha_usuario'])) {
                    $error = true;
                }
            }
            if (!$error) {
                $this->Usuario->id = $data['Usuario']['id'];
                $this->Usuario->updateAll(array('Usuario.logado_usuario' => 1), array('Usuario.id' => $data['Usuario']['id']));
                $this->sessionUsuario($data);
                $this->redirect('/');
            } else {
                $this->Session->setFlash('Não foi possivel logar, verifique o login ou a senha ou então se você ainda nao for cadastrado se cadastre clicando ' . '<a href="cadastro/" class="linkErro">aqui</a>', 'msg_bad');
                $this->redirect('/');
            }
        }
    }

    function sair() {
        if ($this->Session->check('Usuario.logado') == 1) {
            $id = $this->Session->read('Usuario.id');
            $this->Usuario->id = $id;
            $this->Usuario->saveField('logado_usuario', '0');
            $this->Session->delete('Usuario');
            $this->redirect('/');
        } else {
            $this->Session->setFlash('Erro, essa operação não pode ser concluida!', 'msg_bad');
            $this->redirect('/');
        }
    }

    function cadastro() {
        $email = $this->Usuario->find('first', array('conditions' => array('Usuario.email_usuario' => $this->data['Usuario']['email_usuario'])));
        $login = $this->Usuario->find('first', array('conditions' => array('Usuario.login_usuario' => $this->data['Usuario']['login_usuario'])));
        if (!$email || !$login) {
            if (!empty($this->data)) {
                if ($this->data['Usuario']['senha_usuario'] == $this->data['Usuario']['confirmar_senha_usuario']) {
                    if ($this->Usuario->save($this->data)) {
                        /*                         * if(isset($this->Session->check('history.current'))){
                          $this->redirect($this->Session->read('history.current'));
                          $this->Session->delete('history.current');
                          }* */
                        $this->Session->setFlash('Cadastro realizado com sucesso! Faça agora seu login!', 'msg_good');
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('Não foi possivel fazer o cadastro! Favor digitar os dados necessários para efetuar o cadastro.', 'msg_bad');
                        $this->redirect('/cadastro');
                    }
                } else {
                    $this->Session->setFlash('A senha deve ser a mesma nos dois campos!', 'msg_bad');
                    $this->redirect('/cadastro');
                }
            }
        } else {
            $this->Session->setFlash('Esse email ou login digitado já existem em nosso banco dados!', 'msg_bad');
            $this->redirect('/cadastro');
        }
    }

    function alterar() {
        $this->Usuario->id = $this->Session->read('Usuario.id');
        $this->set('usuario', $this->Usuario->find('first', array('conditions' => array('Usuario.id' => $this->Session->read('Usuario.id')))));
        $this->set('uf', $this->UF->find('list', array('fields' => array('UF.uf'))));
        if (empty($this->data)) {
            $this->data = $this->Usuario->read();
        } else {
            if ($this->Usuario->save($this->data)) {
                $this->sessionUsuario($this->data);
                $this->Session->setFlash('Seus dados cadastrais foram atualizados com sucesso.', 'msg_good');
                $this->redirect('/central-do-assinante');
            } else {
                $this->Session->setFlash('Não foi possivel atualizar seu cadastro.', 'msg_bad');
                $this->redirect('/central-do-assinante');
            }
        }
    }

    function alterarSenha() {
        if (!empty($this->data)) {
            if ($this->data['Usuario']['senha_usuario'] == $this->data['Usuario']['confirmar_senha_usuario']) {
                $senha = md5($this->data['Usuario']['senha_usuario']);
                if ($this->Usuario->updateAll(array('Usuario.senha_usuario' => '"' . $senha . '"'), array('Usuario.id' => $this->Session->read('Usuario.id')))) {
                    $this->Session->setFlash('Sua senha foi alterada com sucesso!', 'msg_good');
                    $this->redirect('/central-do-assinante');
                } else {
                    $this->Session->setFlash('Não foi possivel fazer a alteração da senha!', 'msg_bad');
                    $this->redirect('/usuarios/alterarSenha');
                }
            } else {
                $this->Session->setFlash('A senha deve ser a mesma nos dois campos!', 'msg_bad');
                $this->redirect('/usuarios/alterarSenha');
            }
        }
    }

    function enquete($id) {
        if (!$this->Session->read('Usuario.votacao') == 1 && $this->Session->read('Usuario.idEnquete') != $id) {
            $votos = $this->Enquete->find('first', array('conditions' => array('Enquete.id' => $id)));
            switch ($this->data['Usuario']['enquete']) {
                case 1:
                    $this->Enquete->updateAll(array('Enquete.muitoBom' => $votos['Enquete']['muitoBom']+=1), array('Enquete.id' => $id));
                    break;
                case 2:
                    $this->Enquete->updateAll(array('Enquete.bom' => $votos['Enquete']['bom']+=1), array('Enquete.id' => $id));
                    break;
                case 3:
                    $this->Enquete->updateAll(array('Enquete.regular' => $votos['Enquete']['regular']+=1), array('Enquete.id' => $id));
                    break;
                case 4:
                    $this->Enquete->updateAll(array('Enquete.ruim' => $votos['Enquete']['ruim']+=1), array('Enquete.id' => $id));
                    break;
            }
            $this->Session->write('Usuario.idEnquete', $id);
            $this->Session->write('Usuario.votacao', '1');
            $this->Session->setFlash('Obrigado pelo seu voto! Com seu voto nossos serviços de atendimento serão melhorados!', 'msg_good');
            $this->redirect('/');
        } else {
            $this->Session->setFlash('Você já contribuiu com a enquete! A Editor Criação agradece pelo seu voto.', 'msg_bad');
            $this->redirect('/');
        }
    }

    function resultadosEnquete($id) {
        $this->set('id', $id);
        $enquete = $this->Enquete->find('first', array('conditions' => array('Enquete.id' => $id)));
        $total;

        if ($id == 4 && $id == 5) {
            $total = $enquete['Enquete']['muitoBom'] + $enquete['Enquete']['bom'] + $enquete['Enquete']['regular'];
        } else {
            $total = $enquete['Enquete']['muitoBom'] + $enquete['Enquete']['bom'] + $enquete['Enquete']['regular'] + $enquete['Enquete']['ruim'];
        }

        if ($total == 0) {
            $this->set('opcao1', 0);
            $this->set('opcao2', 0);
            $this->set('opcao3', 0);
            $this->set('opcao4', 0);
        } else {

            $opcao1 = $enquete['Enquete']['muitoBom'] / $total;
            $opcao2 = $enquete['Enquete']['bom'] / $total;
            $opcao3 = $enquete['Enquete']['regular'] / $total;
            $opcao4 = $enquete['Enquete']['ruim'] / $total;

            $this->set('opcao1', $opcao1);
            $this->set('opcao2', $opcao2);
            $this->set('opcao3', $opcao3);
            $this->set('opcao4', $opcao4);
        }
    }

    function novaSenha() {
        $email = $this->Usuario->find('first', array('conditions' => array('Usuario.email_usuario' => $this->data['Usuario']['email_recuperar_senha'])));
        if (!$email) {
            $this->Session->setFlash('Esse email não consta nos nossos registros', 'msg_bad');
            $this->redirect('/recuperar-senha');
        } else {
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $max = strlen($caracteres) - 1;
            $password = null;

            for ($i = 0; $i < 6; $i++) {
                $password .= $caracteres{mt_rand(0, $max)};
            }

            $senha = md5($password);

            $this->Usuario->updateAll(array('Usuario.senha_usuario' => '"' . $senha . '"'), array('Usuario.id' => $email['Usuario']['id']));

            $this->Session->write('Usuario.novaSenha', $password);

            $this->Email->from = 'Suporte Editor Criação<suporte@editorcriacao.com.br>';
            $this->Email->to = $email['Usuario']['email_usuario'];
            $this->Email->subject = 'Sua nova senha';
            $this->Email->smtpOptions = array(
                'port' => '25',
                'timeout' => '120',
                'host' => 'smtp.editorcriacao.com.br',
                'username' => 'suporte@editorcriacao.com.br',
                'password' => 'farma45');
            $this->Email->delivery = 'smtp';
            $this->Email->sendAs = 'html';
            $this->Email->send('<p style="color: #4d4d4d;  font-family:Verdana, Geneva, sans-serif; font-size:26px">Sua nova senha é:<span style="color: #ce8005; font-family:Verdana, Geneva, sans-serif; font-size:26px"> ' . $this->Session->read('Usuario.novaSenha') . '</span></p>');

            $this->Session->setFlash('Sua nova senha foi envia para seu endereço de email', 'msg_good');
            $this->redirect('/central-do-assinante');
        }
    }

}

?>
