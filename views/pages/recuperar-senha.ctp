<div id="conteudo" style="margin-top: -20px;">
<div id="resumo">
    <p>Insira o e-mail que você usou para criar sua conta do portal Editor Criação, e nós enviaremos uma nova senha temporaria para poder usar os nossos serviços.</p>
</div>
<div class="container">

            <?php echo $this->Form->create('Usuario', array('controller'=>'usuarios', 'action'=>'novaSenha'))?>
            <span class="formularioContato">Email</span>
            <?php echo $this->Form->input('email_recuperar_senha', array('label'=>'', 'size'=>'40'))?><br>
            <?php echo $this->Form->submit('Enviar', array('class'=>'botao'))?>
            <?php echo $this->Form->end()?>

</div>
</div>