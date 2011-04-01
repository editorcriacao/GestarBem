<?php
$cor = null;
switch ($editoria['Editoria']['id']) {
    case 21:
        $cor = '63add5';
        break;
    case 24:
        $cor = '81ba4e';
        break;
    case 25:
        $cor = 'a970a5';
        break;
    case 28:
        $cor = 'cb5f5f';
        break;
}
?>
<div id="landing-page">
    <span style="color: #666; font-size: 11px;"><?php echo Inflector::stringToUpper($editoria['Editoria']['nomeEditoria']) ?></span>
    <div class="linha-divisao-2"></div>
    <?php foreach ($artigos as $i) {
 ?>
        <div id="materia-landingpage">
            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $i['Artigo']['id'], Inflector::slug($i['Artigo']['titulo']))) ?>"><div id="imagem-lp" style="border: 2px solid #<?php echo $cor ?>"> <?php echo $this->Html->image('http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/fotos_artigos/' . $i['Artigo']['foto']) ?></div></a>
            <h3><a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $i['Artigo']['id'], Inflector::slug($i['Artigo']['titulo']))) ?>" style="color: #<?php echo $cor ?>"><?php echo $i['Artigo']['titulo'] ?></a></h3>
            <p><a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $i['Artigo']['id'], Inflector::slug($i['Artigo']['titulo']))) ?>"><?php echo $i['Artigo']['subTitulo'] ?></a></p>
        </div>
<?php } ?>
</div>

<!--/*PASSAR PAGINAS*/-->
<br>