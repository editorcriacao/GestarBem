        <!--COMEÇO - Destaques -->
        <?php echo $this->Html->script('slides') ?>
        <?php echo $this->Html->css('slides') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#destaques_box_strip').cycle({
                    timeout:       8000,  // milliseconds between slide transitions (0 to disable auto advance)
                    speed:         250,  // speed of the transition (any valid fx speed value)
                    next:          '#destaques_box_next_button',  // id of element to use as click trigger for next slide
                    prev:          '#destaques_box_prev_button',  // id of element to use as click trigger for previous slide
                    //before:        null,  // transition callback (scope set to element to be shown)
                    //after:         null,  // transition callback (scope set to element that was shown)
                    //height:       'auto', // container height
                    sync:          1,     // true if in/out transitions should occur simultaneously
                    fit:           0,     // force slides to fit container
                    pause:         1,     // true to enable "pause on hover"
                    delay:         0,     // additional delay (in ms) for first transition (hint: can be negative)
                    slideExpr:     null  // expression for selecting slides (if something other than all children is required)
                });

            });
        </script>
        <div id="destaques-home">
            <div id="destaques_box">

                <div id="destaques_box_content">

                    <div id="destaques_box_prev_button" class="destaques_box_prev_button_on"><!-- --></div>
                    <div id="destaques_box_next_button" class="destaques_box_next_button_on"><!-- --></div>

                    <div id="destaques_box_viewport">

                        <div id="destaques_box_strip">

                            <?php $destaque = $this->requestAction(array('controller' => 'artigos', 'action' => 'destaques')) ?>
                            <?php foreach ($destaque as $i) {
                            ?>
                                <div class="destaques_box_item">
                                    <div class="destaques_box_thumb" style="background: url(<?php echo $this->Html->url("http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/img-materia/" . $i['Artigo']['imagemMateria']) ?>) no-repeat;"><a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $i['Artigo']['id'], Inflector::slug($i['Artigo']['titulo']))) ?>"></a></div>
                                    <div id="destaques-box-title" class="destaques_box_title"><a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $i['Artigo']['id'], Inflector::slug($i['Artigo']['titulo']))) ?>"><?php echo $i['Editoria']['nomeEditoria'] ?>: <?php echo $i['Artigo']['titulo'] ?></a></div>
                                    <div class="destaques_box_text"><!-- --></div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <br />
        <br />
        <br />
         <!--COMEÇO - Ultimas noticias -->

        <ul id="ultimas-materias">

            <?php $recente = $this->requestAction(array('controller' => 'artigos', 'action' => 'recentes')) ?>
            <?php foreach ($recente as $j) {
            ?>
                                <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $j['Artigo']['id'], Inflector::slug($j['Artigo']['titulo']))) ?>"> <?php echo $this->Html->image('http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/fotos_artigos/' . $j['Artigo']['foto']) ?></a>
                                <h5><?php echo Inflector::stringToUpper($j['Editoria']['nomeEditoria']) ?></h5>
                                <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $j['Artigo']['id'], Inflector::slug($j['Artigo']['titulo']))) ?>"><?php echo $j['Artigo']['titulo'] ?></a>
                            </li>
            <?php } ?>

                        </ul>

                        <!--FIM - Ultimas noticias -->
                                <br />
        <br />
        <br />
