<div id="textoConteudo" style="margin-left: 670px; margin-top: -70px;"><?php echo $this->Html->image('../img/imagens/busca.png')?></div>
<div id="conteudo" style="margin-top: -20px;">
<br>
    <h2>Sua pesquisa</h2>
    <p><?php echo count($resultado)?> resultado(s) foram encontrado(s)</p>
<br><br><br>
<div style="padding-left: 15px;">
<div id="titulos">
    <?php if(!empty($resultado)){?>
    <?php foreach ($resultado as $artigo) {?>
            <a href="<?php echo $html->url(array('controller'=>'artigos', 'action'=>'ver', $artigo['Artigo']['id'], Inflector::slug($artigo['Artigo']['titulo']))) ?>" class="linkH1Mais"><?php echo $artigo['Artigo']['titulo'] ?></a><br>
            <a href="<?php echo $html->url(array('controller'=>'artigos', 'action'=>'ver', $artigo['Artigo']['id'], Inflector::slug($artigo['Artigo']['titulo']))) ?>" class="linkPMais"><?php echo $artigo['Artigo']['subTitulo'] ?></a><br><br>
<?php } ?>
            <?php }else{?>
            <p>Nenhum resultado foi achado com esse termo "<i><?php echo $this->data['Busca']['busca']?></i>"</p>
            <?php }?>
</div>
</div>
</div>
<br><br>