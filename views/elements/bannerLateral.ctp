            
<div id="banner-lateral">
    <div style="width: 150px;">
        <?php
        $banner = mt_rand(0, 10);
        if (($banner % 2) == 0) {
 ?>
            <div id="informacoes-home2">
                <h1>Enquetes</h1>
                <h2 style="font-size: 11px; text-align: left;"><b>Como será seu parto?</b></h2>
            <?php echo $form->create('Usuario', array('url' => '/usuarios/enquete/4')) ?>
            <?php echo $form->input('enquete', array('type' => 'radio', 'options' => array('1' => 'Cesárea<br />', '2' => 'Natural<br />', '3' => 'Outros<br />'), 'legend' => false, 'style' => 'margin-left: 10px;')) ?><br><br>
            <?php echo $form->submit('Votar', array('class' => 'botao')) ?>
            <a href="<?php echo $this->Html->url(array('controller'=>'usuarios', 'action'=>'resultadosEnquete', 4))?>">Resultado</a>
<?php echo $form->end() ?>
        </div>
<?php } else if ($banner % 3) { ?>
            <div id="informacoes-home2">
                <h1>Enquetes</h1>
                <h2 style="font-size: 11px; text-align: left;"><b>Por quanto você pretende amamentar?</b></h2>
            <?php echo $form->create('Usuario', array('url' => '/usuarios/enquete/5')) ?>
            <?php echo $form->input('enquete', array('type' => 'radio', 'options' => array('1' => 'Menos de seis meses<br />', '2' => 'Seis meses<br />', '3' => 'Acima de seis meses<br />'), 'legend' => false, 'style' => 'margin-left: 10px;')) ?><br><br>
            <?php echo $form->submit('Votar', array('class' => 'botao')) ?>
            <a href="<?php echo $this->Html->url(array('controller'=>'usuarios', 'action'=>'resultadosEnquete', 5))?>">Resultado</a>
<?php echo $form->end() ?>
        </div>
<?php } else if ($banner % 4) { ?>
            <div id="informacoes-home2">
                <h1>Enquetes</h1>
                <h2 style="font-size: 11px; text-align: left;"><b>Você sabe quando surgem as primeiras palavras da maioria dos bebês?</b></h2>
            <?php echo $form->create('Usuario', array('url' => '/usuarios/enquete/6')) ?>
            <?php echo $form->input('enquete', array('type' => 'radio', 'options' => array('1' => '1º mês<br />', '2' => '6º Mês<br />', '3' => '12º mês<br />', '4' => '18º Mês<br />'), 'legend' => false, 'style' => 'margin-left: 10px;')) ?><br><br>
            <?php echo $form->submit('Votar', array('class' => 'botao')) ?>
            <a href="<?php echo $this->Html->url(array('controller'=>'usuarios', 'action'=>'resultadosEnquete', 6))?>">Resultado</a>
<?php echo $form->end() ?>
        </div>
<?php } ?>
    </div>
    <br /><br />
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="120" height="600" id="FlashID" title="banner-lateral">
        <param name="movie" value="<?php echo $html->url('../img/imagens/skyscraper.swf') ?>" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="<?php echo $html->url('../img/imagens/skyscraper.swf') ?>" width="120" height="600">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <param name="expressinstall" value="Scripts/expressInstall.swf" />
            <!-- O navegador exibe o seguinte conteúdo alternativo para usuários que tenham o Flash Player 6.0 e versões anteriores. -->
            <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
    </object>
</div>