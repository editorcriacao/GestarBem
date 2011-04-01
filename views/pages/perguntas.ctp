<div id="revista-digital">
<h1 style="color: #e210c2; margin-left: -2px">Envie suas perguntas</h1>
<br />
<br />
<p>Responderemos sua mensagem o mais rápido possível</p>
<br><br>
<?php if ($session->read('Usuario.logado') == 1) {
 ?>
<?php echo $this->Form->create('Sac', array('action' => 'pergunta')) ?>
<?php echo $this->Form->input('pergunta', array('type' => 'textarea', 'label' => '', 'style' => 'width: 600px; height: 300px;')) ?>
    <br><br>
<?php echo $this->Form->submit('Enviar', array('class' => 'botao')) ?>
<?php echo $this->Form->end() ?>
<?php } else { ?>
    <p>Precisa estar logado!</p>
<?php echo $this->Form->create('Usuario', array('action' => 'login')) ?>
    <span>Login</span>
<?php echo $this->Form->input('login_usuario', array('label' => '')) ?>

<br />
    <span>Senha</span>
<?php echo $this->Form->input('senha_usuario', array('type' => 'password', 'label' => '')) ?>
<br />
<?php echo $this->Form->submit('OK', array('class' => 'botao')) ?>

<?php echo $this->Form->end() ?>

    <p>Se ainda não tiver um cadastro, <a href="<?php echo $this->Html->url('/cadastro') ?>">faça agora</a></p>
<?php } ?>

</div>


