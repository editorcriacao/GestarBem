<?php echo $this->Html->docType() ?>
<html>

    <head>

        <title>GestarBem - <?php echo $title_for_layout ?></title>
        <?php echo $this->Html->charset() ?>
        <?php echo $this->Html->css(array('estrutura', 'tipografia', 'reset', 'icon')) ?>
        <?php echo $this->Html->script(array('jquery')) ?>
        <link href='http://fonts.googleapis.com/css?family=Mountains+of+Christmas' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#alertBAD span").click(function(){
                    $(".box-msg").fadeOut();
                    $("#cover").fadeOut();
                });

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('input[type=text], textarea, input[type=password]').focus(function(){
                    if($(this).val() == $(this).attr('defaultValue'))
                    {
                        $(this).val('');
                    }
                });

                $('input[type=text], textarea, input[type=password]').blur(function(){
                    if($(this).val() == '')
                    {
                        $(this).val($(this).attr('defaultValue'));
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("#educacao-img").css({width: "57px"});

                $("#educacao-img").mouseover(function(){
                    $("#educacao-faixa").stop(true, true);
                    $("#educacao-img").animate({width: "114px", top: "25px"}, function(){
                        $("#educacao-faixa").animate({width: "130px", opacity: 100}, 150);
                    });
                });

                $("#educacao-img").mouseout(function(){
                    $("#educacao-faixa").stop(true, false);
                    $("#educacao-img").stop(true, false);
                    $("#educacao-faixa").animate({width: "0px", opacity: "0"},function(){
                        $("#educacao-img").animate({width: "57px", top: "48px"}, 200);
                    });
                });

            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#nutricao-img").css({width: "57px"});

                $("#nutricao-img").mouseover(function(){
                    $("#nutricao-faixa").stop(true, true);
                    $("#nutricao-img").animate({width: "114px", top: "110px"}, function(){
                        $("#nutricao-faixa").animate({width: "130px", opacity: 100}, 150);
                    });
                });

                $("#nutricao-img").mouseout(function(){
                    $("#nutricao-faixa").stop(true, false);
                    $("#nutricao-img").stop(true, false);
                    $("#nutricao-faixa").animate({width: "0px", opacity: "0"},function(){
                        $("#nutricao-img").animate({width: "57px", top: "135px"}, 200);
                    });
                });

            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#vestuario-img").css({width: "57px"});

                $("#vestuario-img").mouseover(function(){
                    $("#vestuario-faixa").stop(true, true);
                    $("#vestuario-img").animate({width: "114px", top: "200px"}, function(){
                        $("#vestuario-faixa").animate({width: "130px", opacity: 100}, 150);
                    });
                });

                $("#vestuario-img").mouseout(function(){
                    $("#vestuario-faixa").stop(true, false);
                    $("#vestuario-img").stop(true, false);
                    $("#vestuario-faixa").animate({width: "0px", opacity: "0"},function(){
                        $("#vestuario-img").animate({width: "57px", top: "222px"}, 200);
                    });
                });

            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#especial-img").css({width: "57px"});

                $("#especial-img").mouseover(function(){
                    $("#especial-faixa").stop(true, true);
                    $("#especial-img").animate({width: "114px", top: "280px"}, function(){
                        $("#especial-faixa").animate({width: "130px", opacity: 100}, 150);
                    });
                });

                $("#especial-img").mouseout(function(){
                    $("#especial-faixa").stop(true, false);
                    $("#especial-img").stop(true, false);
                    $("#especial-faixa").animate({width: "0px", opacity: "0"},function(){
                        $("#especial-img").animate({width: "57px", top: "305px"}, 200);
                    });
                });

            });
        </script>
    </head>

    <body>

        <div id="todo">

            <div id="header">
                <div id="caixa-header">
                    <a href="<?php echo $this->Html->url('/') ?>"><?php echo $this->Html->image('logo.png') ?></a>

                    <ul id="busca-div">
                        <?php echo $this->Form->create('Busca', array('action' => 'pesquisa')) ?>
                        <li><?php echo $this->Form->input('busca', array('label' => '', 'value' => 'o que você procura?')) ?></li>
                        <li><?php echo $this->Form->submit(' ') ?></li>
                        <?php echo $this->Form->end() ?>
                    </ul>
                    <ul id="menu-superior-header">
                        <li style="margin-left: -10px; margin-top:2px; font-weight: bold; *margin-left: -17px;"><a href="">CENTRAL DO USUÁRIO</a> </li>
                        <li style="font-size:14px; margin-top:1px; font-weight: bold;">|</li>
                        <li style="margin-top:2px; font-weight: bold;"><a href="<?php echo $this->Html->url('http://www.editorcriacao.com.br/assinaturas/check/3/gestar-bem') ?>">ASSINE</a></li>
                        <li>
                            <ul id="icon">
                                <li><span class="mail"></span></li>
                                <li><span class="linkendin"></span></li>
                                <li><span class="twitter"></span></li>
                                <li><span class="rss"></span></li>
                            </ul>
                        </li>
                    </ul>

                    <?php if ($this->Session->read('Usuario.logado') == 1) {
                    ?>
                            <ul id="menu-inferior-header-2">
                                <li>Bem-vindo <?php echo $this->Session->read('Usuario.primeiroNome') ?> |</li>
                                <li><a href="">Alterar Cadastro</a> |</li>
                                <li><a href="">Alterar Senha</a> |</li>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'usuarios', 'action' => 'sair')) ?>">Sair</a></li>

                            </ul>
                    <?php } else {
                    ?>
                            <ul id="login">
                        <?php echo $this->Form->create('Usuario', array('action' => 'login')) ?>
                            <li><?php echo $this->Form->input('login_usuario', array('label' => '', 'value' => 'login')) ?></li>
                            <li><?php echo $this->Form->input('senha_usuario', array('label' => '', 'value' => 'senha', 'type' => 'password')) ?></li>
                            <li><?php echo $this->Form->submit('ENTRAR') ?></li>
                        <?php echo $this->Form->end() ?>
                        </ul>

                    <?php } ?>
                    </div>

                </div>
                <div class="linha-verde">
                </div>
                <ul id="menu-superior">

                    <li><a href="<?php echo $this->Html->url('/') ?>" style="color: #c36567">Home</a></li>
                    <li><a href="<?php echo $this->Html->url('/revista-digital') ?>" style="color: #123ba4">Revista Digital</a></li>
                    <li><a href="<?php echo $this->Html->url('/perguntas') ?>" style="color: #e210c2">Perguntas</a></li>
                    <li><a href="<?php echo $this->Html->url('/conte-sua-historia') ?>" style="color: #059ce2">Conte sua história</a></li>
                    <li><a href="<?php echo $this->Html->url('/fale-conosco') ?>" style="color: #ef851d">Fale conosco</a></li>
                    <li><a href="<?php echo $this->Html->url('/fale-conosco') ?>" style="color: #9142ae">Cadastre-se</a></li>

                </ul>

                <div id="content">
                <?php echo $session->flash(); ?>
                        <ul id="menu-bolas">
                            <span id="educacao"></span>
                            <div id="educacao-faixa" class="faixa-menu">Educação</div>
                    <a href="<?php echo $this->Html->url(array('controller'=>'editorias', 'action'=>'ver', '21', 'educacao'))?>"><?php echo $this->Html->image('bolinhas-menu/bola-educacao.png', array('id' => 'educacao-img')) ?></a>

                        <!-- NUTRIÇÃO -->
                        <span id="nutricao"></span>
                        <div id="nutricao-faixa" class="faixa-menu">Nutrição</div>
                    <a href="<?php echo $this->Html->url(array('controller'=>'editorias', 'action'=>'ver', 24, 'alimentacao'))?>"><?php echo $this->Html->image('bolinhas-menu/bola-alimentacao.png', array('id' => 'nutricao-img')) ?></a>

                        <!-- VESTUARIO -->
                        <span id="vestuario"></span>
                        <div id="vestuario-faixa" class="faixa-menu">Vestuário</div>
                    <a href="<?php echo $this->Html->url(array('controller'=>'editorias', 'action'=>'ver', 25, 'vestuario'))?>"><?php echo $this->Html->image('bolinhas-menu/bola-vestuario.png', array('id' => 'vestuario-img')) ?></a>

                        <!-- ESPECIAL -->
                        <span id="especial"></span>
                        <div id="especial-faixa" class="faixa-menu">Especial</div>
                    <a href="<?php echo $this->Html->url(array('controller'=>'editorias', 'action'=>'ver', 28, 'especial'))?>"><?php echo $this->Html->image('bolinhas-menu/bola-especial.png', array('id' => 'especial-img')) ?></a>

                        </ul>
                    <div id="conteudo">
                        <div id="banner"><?php echo $this->element('banner') ?></div>
                    <?php echo $content_for_layout ?>
                    </div>

                </div>
                <div id="encaixe-bg"></div>
                <div id="conteudo-verde">

                    <div id="caixa-news">
                        <h2>Mantenha-se Informado</h2>
                        <p>Saiba antes que todo mundo do lançamento das novas publicações da GestarBem.</p>
                        <ul id="enviar-news">
                            <?php echo $this->Form->create('Newsletter', array('action' => 'cadastreEmail')) ?>
                            <li style="margin:10px 0 0 22px;"><?php echo $this->Form->input('nome_newsletter', array('label' => '', 'value' => 'coloque seu nome e sobrenome ', 'size' => '31')) ?></li>
                            <li style="margin:5px 0 0 22px;"><?php echo $this->Form->input('email_newsletter', array('label' => '', 'value' => 'coloque seu e-mail', 'size' => '17')) ?></li>
                            <li style="margin-top: -2px;"><?php echo $this->Form->submit('AVISE-ME') ?></li>
                            <?php echo $this->Form->end() ?>
                        </ul>
                    </div>


                    <ul id="noticias-por-secao">
                    <?php $ultimasEducacao = $this->requestAction(array('controller' => 'artigos', 'action' => 'ultimasEducacao')) ?>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasEducacao['Artigo']['id'], Inflector::slug($ultimasEducacao['Artigo']['titulo']))) ?>"><?php echo $this->Html->image('http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/fotos_artigos/' . $ultimasEducacao['Artigo']['foto']) ?></a>
                            <p><?php echo Inflector::stringToUpper($ultimasEducacao['Editoria']['nomeEditoria']) ?></p>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasEducacao['Artigo']['id'], Inflector::slug($ultimasEducacao['Artigo']['titulo']))) ?>"><h4><?php echo $ultimasEducacao['Artigo']['titulo'] ?></h4></a>

                        </li>
                    <?php $ultimasNutricao = $this->requestAction(array('controller' => 'artigos', 'action' => 'ultimasNutricao')) ?>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasNutricao['Artigo']['id'], Inflector::slug($ultimasNutricao['Artigo']['titulo']))) ?>"><?php echo $this->Html->image('http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/fotos_artigos/' . $ultimasNutricao['Artigo']['foto']) ?></a>
                            <p><?php echo Inflector::stringToUpper($ultimasNutricao['Editoria']['nomeEditoria']) ?></p>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasNutricao['Artigo']['id'], Inflector::slug($ultimasNutricao['Artigo']['titulo']))) ?>"><h4><?php echo $ultimasNutricao['Artigo']['titulo'] ?></h4></a>

                        </li>
                    </ul>


                    <ul id="noticias-por-secao">
                    <?php $ultimasVestuario = $this->requestAction(array('controller' => 'artigos', 'action' => 'ultimasVestuario')) ?>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasVestuario['Artigo']['id'], Inflector::slug($ultimasVestuario['Artigo']['titulo']))) ?>"><?php echo $this->Html->image('http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/fotos_artigos/' . $ultimasVestuario['Artigo']['foto']) ?></a>
                            <p><?php echo Inflector::stringToUpper($ultimasVestuario['Editoria']['nomeEditoria']) ?></p>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasVestuario['Artigo']['id'], Inflector::slug($ultimasVestuario['Artigo']['titulo']))) ?>"><h4><?php echo $ultimasVestuario['Artigo']['titulo'] ?></h4></a>

                        </li>
                    <?php $ultimasEspecial = $this->requestAction(array('controller' => 'artigos', 'action' => 'ultimasEspecial')) ?>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasEspecial['Artigo']['id'], Inflector::slug($ultimasEspecial['Artigo']['titulo']))) ?>"><?php echo $this->Html->image('http://www.editorcriacao.com.br/gerenciadorEditor/app/webroot/img/fotos_artigos/' . $ultimasEspecial['Artigo']['foto']) ?></a>
                            <p><?php echo Inflector::stringToUpper($ultimasEspecial['Editoria']['nomeEditoria']) ?></p>
                            <a href="<?php echo $this->Html->url(array('controller' => 'artigos', 'action' => 'ver', $ultimasEspecial['Artigo']['id'], Inflector::slug($ultimasEspecial['Artigo']['titulo']))) ?>"><h4><?php echo $ultimasEspecial['Artigo']['titulo'] ?></h4></a>

                        </li>
                    </ul>    
                </div>
                <div id="footer-verde-bg"></div>
            </div>
            <br/>
            <br />
            <div id="footer">
                <div id="cima-footer"></div>
                <ul id="copy">
                    <li>&copy; Copyrights - 2011 - Editor Criação Marketing e Comunicação Ltda.</li>
                </ul>

                <ul id="rodape-conteudo">

                    <li><a href="<?php echo $this->Html->url('http://www.editorcriacao.com.br/assinaturas/check/3/gestar-bem') ?>" style="color:#cb5f5f; font-weight: bold;">ASSINE</a> |</li>
                    <li><a href="">CENTRAL DO USUÁRIO</a> | </li>
                    <li><a href="<?php echo $this->Html->url('http://www.editorcriacao.com.br/publicidade') ?>">ANUNCIE</a> | </li>
                    <li><a href="<?php echo $this->Html->url('/contato') ?>">CONTATO</a></li>
            </ul>
        </div>

    </body>

</html>