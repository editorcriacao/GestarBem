<div id="revista-digital">

<p>Cadastre-se e receba a newsletter da Editor Criação com nossas novidades e principais matérias publicadas.</p>
<br><br><br>
<div id="textoCadastro">
            <span style="color: #81add5; float: left; margin-top: -30px;">*Preenchimento obrigatório.</span>
            <?php echo $this->Form->create('Usuario', array('controller'=>'usuarios', 'action'=>'cadastro'))?>
            <span>Nome Completo:*</span>
            <?php echo $this->Form->input('nome_usuario', array('label'=>'', 'size'=>'40'))?><br>
            <span>E-mail:*</span>
            <?php echo $this->Form->input('email_usuario', array('label'=>'', 'size'=>'40'))?><br>
            <span>Login:*</span>
            <?php echo $this->Form->input('login_usuario', array('label'=>'', 'size'=>'40'))?>
            <span style="font-size: 9px; font-family: verdana, arial, sans-serif; color: #5d5d5d; margin-left: 10px; padding-top: 5px">O login deve conter entre 5 a 15 caracteres</span><br>
            <span>Senha:*</span>
            <?php echo $this->Form->input('senha_usuario', array('label'=>'', 'size'=>'40', 'type'=>'password'))?>
            <span style="font-size: 9px; font-family: verdana, arial, sans-serif; color: #5d5d5d; margin-left: 10px; padding-top: 5px">A senha deve conter no minimo 6 caracteres</span><br>
            <span>Confirmar Senha:*</span><br>
            <?php echo $this->Form->input('confirmar_senha_usuario', array('label'=>'', 'size'=>'40', 'type'=>'password'))?><br><br>
             <span>Deseja receber newsletters com novidades, promoções,
eventos e outras informações.</span><br><br>
            <?php echo $this->Form->input('email_marketing_usuario', array('options'=>array('1'=>'Sim', '0'=>'Não'), 'value'=>'0','div'=>'', 'label'=>'', 'type'=>'radio', 'legend'=>false))?><br><br><br><br>
            <?php echo $this->Form->submit('Cadastrar-se', array('class'=>'botao'))?>
            <?php echo $this->Form->end()?>
</div>
</div>