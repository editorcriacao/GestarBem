<div id="textoConteudo" style="margin-left: 540px; margin-top: -80px"><?php echo $this->Html->image('../img/imagens/minhasRevistas.png')?></div>
<div id="conteudo" style="margin-top: -20px;">
<br /><br />
<div id="conteudoBaixo">
    <div id="setaEsquerda2">
    </div>
    <div id="carousel2">
     <div id="carouseldiv1">
            <div class="set">
                <div id="boxCarrosel">
                    <?php foreach($revistas as $revista){?>
                    <div id="frameBoxCarrosel">
                        <div id="imagenReduzida">
                            <?php echo $html->image('/img/imagens/capas/'.$revista['Revista']['capa'], array('width'=>'139'))?>
                        </div>
                        <div id="boxCarroselTexto">
                            <span style="color: #00719B; font-family: arial; margin-left: 5px; font-size: 14px;"><?php echo $revista['Revista']['titulo']?></span><br>
                            <span style="color: #ce8005; font-family: arial; font-size: 10px; margin-left: 20px"><?php echo 'V.'.$revista['Revista']['volume'].' N.'.$revista['Revista']['numero'].' ANO '.$revista['Revista']['ano']?></span><br>
                            <span style="color: #ce8005; font-family: arial; font-size: 10px; margin-left: 10px">Válidade até <?php $data = explode('-', substr($assinaturas['Assinatura']['data_termino'], 0, 10)); echo $data[2].'/'.$data[1].'/'.$data[0];?></span>
                            <div style="margin-top: 30px; margin-left: 5px"><a href="<?php echo $this->Html->url(array('controller'=>'revistas', 'action'=>'ler', $revista['Revista']['link']))?>" style="font-size: 10px; color:#ce8005; font-family: arial, verdana, sans-serif; text-decoration: none;">LEIA A REVISTA DIGITAL</a></div>
                        </div>
                    </div>
                    <?php }?>
                </div>

            </div>
        </div>
    </div>
    <div id="setaDireita2">
    </div>
</div>
<br><br>