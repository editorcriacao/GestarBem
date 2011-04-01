<?php $this->set('title_for_layout', 'Revista Digital')?>
<div id="revista-digital">
    <h1 style="color: #123ba4">Revista Digital</h1>
<br />
<p>A GestarBem é uma publicação voltada às mulheres que pretendem engravidar, às gestantes, às mães e aos seus familiares. Com enfoque na saúde e bem-estar da gestante e do bebê. As gestantes, os recém-nascidos e o desenvolvimento infantil são o foco das reportagens, com matérias informativas. O objetivo é trazer matérias atuais e sempre embasadas em entrevistas com especialistas.</p>
    <br>
    <br>
    <div id="revista">
       <a href="<?php echo $this->Html->url(array('controller'=>'revistas', 'action'=>'ler', 'gestarbem1'))?>"><?php echo $this->Html->image('../img/imagens/capa_gestarbem1.png', array('border'=>'0'))?></a>
        <p>Edição 1 - Leitura Online</p>

    </div>
</div>
