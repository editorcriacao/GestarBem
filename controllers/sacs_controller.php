<?php
    Class SacsController extends AppController{
        var $name = 'Sacs';
        var $uses = array('UF');

        function newsletter(){
            if(isset($this->data)){
                $this->Newsletter->save($this->data);
                $this->Session->setFlash('Seus dados foram cadastrados na nossa base de emails', 'msg_good');
                $this->redirect('/');
            }
        }

        function faleConosco(){
            $this->Email->from = $this->Session->read('Usuario.email');
            $this->Email->to = 'sac@editorcriacao.com.br';
            $this->Email->subject = 'GestarBem - Fale Conosco';
            $this->Email->smtpOptions = array(
                                                    'port' => '25',
                                                    'timeout' => '120',
                                                    'host' => 'smtp.editorcriacao.com.br',
                                                    'username' => 'sac@editorcriacao.com.br',
                                                    'password' => 'farma45');
            $this->Email->delivery = 'smtp';
            $this->Email->sendAs = 'html';
            $this->Email->send('
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Nome:'.$this->data['Sac']['nome'].'<br/><br/></span>
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Telefone:'.$this->data['Sac']['telefone'].'<br/><br/></span>
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">E-mail:'.$this->data['Sac']['email'].'<br/><br/></span>
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Mensagem:'.$this->data['Sac']['msg'].'</span><br><br><br>
                    ');

            $this->Session->setFlash('Sua mensagem foi enviada com sucesso! Entraremos em contato o mais rapido possivel. A Editor Criação agradece!', 'msg_good');
            $this->redirect('/fale-conosco');
        }

        function pergunta(){
            $this->Email->from = $this->Session->read('Usuario.email');
            $this->Email->to = 'sac@editorcriacao.com.br';
            $this->Email->subject = 'GestarBem - Pergunta';
            $this->Email->smtpOptions = array(
                                                    'port' => '25',
                                                    'timeout' => '120',
                                                    'host' => 'smtp.editorcriacao.com.br',
                                                    'username' => 'sac@editorcriacao.com.br',
                                                    'password' => 'farma45');
            $this->Email->delivery = 'smtp';
            $this->Email->sendAs = 'html';
            $this->Email->send('<span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Nome:'.$this->Session->read('Usuario.nome').'<br/><br/></span>
                                <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Email:'.$this->Session->read('Usuario.email').'<br/><br/></span>
                                <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Pergunta:'.$this->data['Sac']['pergunta'].'</span><br><br><br>');

            $this->Session->setFlash('Sua mensagem foi enviada com sucesso! Entraremos em contato o mais rapido possivel. A Editor Criação agradece!', 'msg_good');
            $this->redirect('/pergunta');
        }

        function conteSuaHistoria(){
            $this->Email->from = $this->Session->read('Usuario.email');
            $this->Email->to = 'sac@editorcriacao.com.br';
            $this->Email->subject = 'GestarBem - Conte sua Historia';
            $this->Email->smtpOptions = array(
                                                    'port' => '25',
                                                    'timeout' => '120',
                                                    'host' => 'smtp.editorcriacao.com.br',
                                                    'username' => 'sac@editorcriacao.com.br',
                                                    'password' => 'farma45');
            $this->Email->delivery = 'smtp';
            $this->Email->sendAs = 'html';
            $this->Email->send('
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Nome:'.$this->data['Sac']['nome'].'<br/><br/></span>
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Telefone:'.$this->data['Sac']['telefone'].'<br/><br/></span>
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">E-mail:'.$this->data['Sac']['email'].'<br/><br/></span>
                        <span style="font-size: 14px; font-family: arial, verdana, sans-serif; color: #000;">Mensagem:'.$this->data['Sac']['msg'].'</span><br><br><br>
                    ');

            $this->Session->setFlash('Sua mensagem foi enviada com sucesso! Entraremos em contato o mais rapido possivel. A Editor Criação agradece!', 'msg_good');
            $this->redirect('/conte-sua-historia');
        }
    }
?>
