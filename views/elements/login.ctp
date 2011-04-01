<?php if ($session->read('Usuario.logado') == 1) { ?>
    <table width="560px" border="0" cellspacing="0" cellpadding="0" style="height: 40px; _height: 63px; margin-top: -20px;">
        <tr>
            <td class="link"><span class="textoLogin"><?php echo 'Bem-vindo(a) ' . $session->read('Usuario.primeiroNome') ?></span></td>
            <td id="topo_login" class="textoLogin">&nbsp;&nbsp; <a href="<?php echo $html->url('/central-do-assinante') ?>" class="textoLogin">Central do <?php if ($session->read('Usuario.assinante') == 1) {
        echo 'Assinante';
    } else {
        echo 'Usuario';
    } ?></a>&nbsp;|&nbsp;<a href="<?php echo $html->url('/recuperar-senha') ?>" class="textoLogin">Esqueci minha senha</a> &nbsp;|&nbsp; <a href="<?php echo $html->url('/fale-conosco') ?>" class="textoLogin">Fale conosco</a>&nbsp; |&nbsp; <?php echo $html->link('Sair', array('controller' => 'usuarios', 'action' => 'sair'), array('class' => 'textoLogin')) ?></td>
        </tr>
    </table>
    <br>
<?php echo $this->Form->create('Busca', array('controller' => 'buscas', 'action' => 'pesquisa')) ?>
    <div id="buscar">Busca: <?php echo $this->Form->input('busca', array('style' => 'position: relative; margin-left: 40px; margin-top: -29px', 'label' => '', 'size' => '18')) ?></div><?php echo $this->Form->submit('OK', array('class' => 'botao', 'style' => 'position: absolute; margin-left: 580px; margin-top: -40px;')) ?>
<?php echo $this->Form->end() ?>
<?php } else { ?>
    <div id="textoentrebanners"> <a href="<?php echo $html->url('/cadastro') ?>" class="textoLogin">Cadastre-se</a> |  <a href="<?php echo $html->url('/esqueci-senha') ?>" class="textoLogin">Esqueci minha senha</a></div>
<?php echo $this->Form->create('Usuario', array('controller' => 'usuarios', 'action' => 'login')) ?>
    <div id="login">Login: <?php echo $this->Form->input('login_usuario', array('label' => '', 'style' => 'margin-top: -25px; margin-left: 37px; width: 130px;')) ?></div>
    <div id="senha">Senha: <?php echo $this->Form->input('senha_usuario', array('type' => 'password', 'label' => '', 'style' => 'width: 130px; margin-top: -25px; margin-left: 39px;')) ?></div>
<?php echo $this->Form->submit('OK', array('class' => 'botao', 'style' => 'margin-left: 340px; margin-top: 3px;')) ?>
<?php echo $this->Form->end() ?>
<?php echo $this->Form->create('Busca', array('controller' => 'buscas', 'action' => 'pesquisa')) ?>
    <div id="buscar">Busca: <?php echo $this->Form->input('busca', array('style' => 'position: relative; margin-left: 40px; margin-top: -29px;', 'label' => '', 'size' => '18')) ?></div><?php echo $this->Form->submit('OK', array('class' => 'botao', 'style' => 'position: absolute; margin-left: 570px; margin-top: -41px;')) ?>
<?php echo $this->Form->end() ?>
<?php } ?>