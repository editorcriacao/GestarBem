<div id="textoConteudo" style="margin-left: 450px;"><?php echo $this->Html->image('../img/imagens/central_do_assinante.png') ?></div>
<div id="conteudo">
<br/>
<h1>Alterar sua senha</h1>
<div id="textoCadastro">
    <?php echo $form->create('Usuario', array('controller'=>'usuarios', 'action'=>'alterarSenha'))?>
         <span class="formularioContato">Senha:*</span>
            <?php echo $this->Form->input('senha_usuario', array('label'=>'', 'size'=>'40', 'type'=>'password', 'class'=>'campoTexto'))?>
            <span style="font-size: 9px; font-family: verdana, arial, sans-serif; color: #5d5d5d; margin-left: 10px; padding-top: 5px">A senha deve conter no minimo 6 caracteres</span><br>
            <span class="formularioContato">Confirmar senha:*</span><br>
            <?php echo $this->Form->input('confirmar_senha_usuario', array('label'=>'', 'size'=>'40', 'type'=>'password', 'class'=>'campoTexto'))?><br><br>
         <?php echo $this->Form->submit('Alterar Senha', array('class'=>'botao'))?>
    <?php echo $form->end()?>
    </div>
</div>