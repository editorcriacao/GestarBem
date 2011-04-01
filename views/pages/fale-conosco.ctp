<?php $this->set('title_for_layout', 'Fale Conosco')?>
<div id="revista-digital">
    <h1 style="color: #ef851d; margin-left: -2px">Fale Conosco</h1>
    <br />
    <br />
    <p>Preencha os campos abaixo para em contato com o site GestarBem.</p>
    <br>
    <div id="colunas-formulario">
        <div id="coluna-um">
            <?php echo $this->Form->create('Sac', array('action' => 'contato', 'id' => 'faleConosco')) ?>
            <?php echo $this->Form->input('nomeCompleto', array('label' => 'Nome Completo:', 'size' => '26')) ?>
            <?php echo $this->Form->input('email', array('label' => 'E-mail:', 'size' => '38')) ?>
            <?php echo $this->Form->input('endereço', array('label' => 'Endereço:', 'size' => '34')) ?>
            <?php echo $this->Form->input('estado', array('label' => 'Estado:', 'size'=>'37')) ?>
            <?php echo $this->Form->input('cidade', array('label' => 'Cidade:', 'size'=>'37')) ?>
            <ul id="telefone-vagas">
                <li>
                    <?php echo $this->Form->input('ddd', array('label' => 'DDD:', 'size' => '2')) ?>
                </li>
                <li>
                    <?php echo $this->Form->input('telefone', array('label' => 'Telefone:', 'size' => '15')) ?>
                </li>
            </ul>
        </div>
        <div id="coluna-dois">
            <?php echo $this->Form->input('mensagem', array('label' => 'Sua Mensagem:', 'type' => 'textarea')) ?>
            <?php echo $this->Form->submit('ENVIAR', array('style'=>'float:right; margin-right: 70px; margin-top: 5px;'))?>
        </div>

        <?php echo $this->Form->end() ?>
    </div>
    <br>
</div>

