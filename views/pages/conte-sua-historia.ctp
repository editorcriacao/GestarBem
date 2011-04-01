<?php $this->set('title_for_layout', 'Conte sua historia')?>
<div id="revista-digital">
    <h1 style="color: #059ce2; margin-left: -2px">Conte sua historia</h1>
    <br />
    <br />
    <p>Este espaço é dedicado à leitora que tenha vontade de dividir informações, se expressar e contar fatos de sua vida. Sua história poderá, até mesmo, fazer parte de nossa publicação GestarBem. Envie-nos seu relato.</p>
    <br>
    <br>
     <div id="colunas-formulario">
        <div id="coluna-um">
            <?php echo $this->Form->create('Sac', array('action' => 'conteSuaHistoria', 'id' => 'formulario-vagas')) ?>
            <?php echo $this->Form->input('nomeCompleto', array('label' => 'Nome Completo:', 'size' => '26')) ?>
            <?php echo $this->Form->input('email', array('label' => 'E-mail:', 'size' => '38')) ?>
            <?php echo $this->Form->input('endereço', array('label' => 'Endereço:', 'size' => '34')) ?>
            <?php echo $this->Form->input('estado', array('label' => 'Estado:', 'type' => 'select', 'empty' => ' ', 'options' => array('1' => 'Acre'))) ?>
            <?php echo $this->Form->input('cidade', array('label' => 'Cidade:', 'type' => 'select', 'empty' => ' ', 'options' => array('1' => 'Abadia de Goiás'))) ?>
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
            <?php echo $this->Form->input('titulo', array('label' => 'Titulo:', 'size' => '43')) ?>
            <br />
            <?php echo $this->Form->input('mensagem', array('label' => 'Sua Mensagem:', 'type' => 'textarea')) ?>
            <br />
            <?php echo $this->Form->submit('ENVIAR', array('style'=>'float: right; margin-right: 70px;'))?>
        </div>

        <?php echo $this->Form->end() ?>
    </div>
    <br>
</div>