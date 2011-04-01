<div id="textoConteudo" style="margin-left: 450px;"><?php echo $this->Html->image('../img/imagens/central_do_assinante.png') ?></div>
<div id="conteudo">
<br>
<h1>Altere seus dados</h1>
<br><br>
<div id="textoCadastro">
            <span style="color: #003552; float: left; margin-top: -30px;">*Preenchimento obrigatório.</span>
             <?php echo $this->Form->create('Usuario', array('controller'=>'usuarios', 'action'=>'alterar'))?>
            <span class="formularioContato">Nome Completo:*</span>
            <?php echo $this->Form->input('nome_usuario', array('label'=>'', 'size'=>'40','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Email:*</span>
            <?php echo $this->Form->input('email_usuario', array('label'=>'', 'size'=>'40','class'=>'campoTexto'))?><br>
         
             <span class="formularioContato">Deseja receber newsletters com novidades, promoções,
eventos e outras informações.</span><br><br>
            <?php echo $this->Form->input('email_marketing_usuario', array('options'=>array('1'=>'Sim', '0'=>'Não'),'div'=>'', 'label'=>'', 'type'=>'radio', 'legend'=>false))?><br><br><br><br>
            <?php echo $this->Form->input('id', array('label'=>'', 'type'=>'hidden'))?>
            <?php echo $this->Form->input('assinante_usuario', array('label'=>'', 'type'=>'hidden'))?>
            <?php echo $this->Form->input('login_usuario', array('label'=>'', 'type'=>'hidden'))?>
            <?php echo $this->Form->input('senha_usuario', array('label'=>'', 'type'=>'hidden'))?>

            <span class="formularioContato">Endereço:</span>
            <?php echo $this->Form->input('endereco_usuario', array('label'=>'', 'size'=>'70','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Numero:</span>
            <?php echo $this->Form->input('numero_usuario', array('label'=>'', 'size'=>'20','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Complemento:</span>
            <?php echo $this->Form->input('complemento_usuario', array('label'=>'', 'size'=>'10','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Bairro:</span>
            <?php echo $this->Form->input('bairro_usuario', array('label'=>'', 'size'=>'50','class'=>'campoTexto'))?><br>
            <span class="formularioContato">CEP:</span>
            <?php echo $this->Form->input('cep_usuario', array('label'=>'', 'size'=>'50','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Cidade:</span>
            <?php echo $this->Form->input('cidade_usuario', array('label'=>'', 'size'=>'50','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Estado:</span>
            <?php echo $this->Form->input('estado_usuario', array('label'=>'', 'type'=>'select', 'options'=> $uf,'class'=>'campoTexto'))?><br>
            <span class="formularioContato">Pais:</span>
            <?php echo $this->Form->input('pais_usuario', array('label'=>'', 'size'=>'50','class'=>'campoTexto'))?><br>
            <span class="formularioContato">DDD:</span>
            <?php echo $this->Form->input('ddd_usuario', array('label'=>'', 'size'=>'2','class'=>'campoTexto'))?><br>
            <span class="formularioContato">Telefone:</span>
            <?php echo $this->Form->input('telefone_usuario', array('label'=>'', 'size'=>'50','class'=>'campoTexto'))?><br>
    <br><br>
            <?php echo $this->Form->submit('Alterar Cadastro', array('class'=>'botao'))?>
            <?php echo $this->Form->end()?>
</div>

</div>