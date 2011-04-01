<div id="textoConteudo" style="margin-left: 450px;"><?php echo $this->Html->image('../img/imagens/central_do_assinante.png') ?></div>
<div id="conteudo">
    <div>
        <?php if ($session->read('Usuario.logado') == 1) {
        ?>
        <?php if ($session->read('Usuario.assinante') == 1) {
 ?>
                <div style="float: left; width: 330px">
                    <br>
                    <h5 style="color:#3da3db; font-family: verdana, arial, sans-serif; font-size: 14px;">SERVIÇOS</h5>
                    <br>
                    <div class="listaAcesse1">
                        <li><?php echo $html->link('Revistas Assinadas', array('controller' => 'assinaturas', 'action'=>'suasRevistas')) ?></li>
                        <li><?php echo $html->link('Alterar dados pessoais', array('controller' => 'usuarios', 'action' => 'alterar')) ?></li>
                        <li><?php echo $html->link('Alterar senha', array('controller' => 'usuarios', 'action' => 'alterarSenha')) ?></li>
                        <li><?php echo $html->link('Verificar pagamentos', array('controller' => 'pagamentos', 'action' => 'verificarPagamento')) ?></li>
                        <li>Renovar assinatura</li>
                        <li><?php echo $html->link('SAC', array('sac/')) ?></li>

                    </div>
                </div>
<?php } else { ?>
                <div style="float: left; width: 330px; margin-left: 20px;">
                    <br>
                    <h5 style="color:#3da3db; font-family: verdana, arial, sans-serif; font-size: 14px;">SERVIÇOS</h5>
                    <br>
                    <div class="listaAcesse1">
                        <li><?php echo $html->link('Verificar pagamentos', array('controller' => 'pagamentos', 'action' => 'verificarPagamento'), array('class' => 'li')) ?></li>
                        <li><?php echo $html->link('Alterar dados pessoais', array('controller' => 'usuarios', 'action' => 'alterar'), array('class' => 'li')) ?></li>
                        <li><?php echo $html->link('Alterar senha', array('controller' => 'usuarios', 'action' => 'alterarSenha'), array('class' => 'li')) ?></li>
                        <li><?php echo $html->link('SAC', array('/sac'), array('class' => 'li')) ?></li>
                    </div>
                </div>
<?php } ?>
            <br><br>                             <br><br>
<?php } else { ?>

            <div style="float: left; width: 290px">
                <h5 style="color:#3da3db; font-family: verdana, arial, sans-serif; font-size: 14px;"><?php if ($session->read('Usuario.logado') == 1 && $session->read('Usuario.assinante') == 1) { ?> ASSINANTES <?php } else { ?> USUÁRIOS <?php } ?></h5>
                <br><br>
                <p style="font-size: 11px;">Para ter acesso a nossos serviços faça seu login ou <a href="<?php echo $this->Html->url('/cadastro') ?>" class="textoLogin">cadastre-se</a></p>
                <br>
<?php echo $this->Form->create('Usuario', array('controller' => 'usuarios', 'action' => 'login')) ?>
            <span>Login: </span><?php echo $this->Form->input('login_usuario', array('class' => 'login', 'label' => '')) ?><br>
            <span>Senha: </span><?php echo $this->Form->input('senha_usuario', array('type' => 'password', 'class' => 'senha', 'label' => '')) ?>
            <?php echo $this->Form->submit('OK', array('class' => 'botao', 'style' => 'margin-left: 340px;')) ?>
<?php echo $this->Form->end() ?>
        </div>
        <br><br><br><br><br><br><br><br>
<?php } ?>
    </div>

    <br><br><br><br><br><br><br><br><br>
    <div id="tituloConteudo2">
        <p>PESQUISA DE SATISFAÇÃO</p>
    </div>
    <br/>
    <div id="itens2">
        <div id="textoItens2">
            <h5 style="color:#3da3db; font-family: verdana, arial, sans-serif; font-size: 14px; margin-top: -20px; padding-bottom: 20px;">Sua opinião é muito importante para nós</h5>
            <p>O que você acha de nossos serviços e atendimento?</p>
            <br>
            <?php echo $form->create('Usuario', array('/usuarios/enquete/1')) ?>
            <?php echo $form->input('enquete', array('type' => 'radio', 'options' => array('1' => 'Muito Bom', '2' => 'Bom', '3' => 'Regular', '4' => 'Ruim'), 'legend' => false, 'style' => 'margin-left: 10px;')) ?><br><br>
            <?php echo $form->submit('Votar', array('class' => 'botao')) ?>
<?php echo $form->end() ?>
        </div>
    </div>

</div>