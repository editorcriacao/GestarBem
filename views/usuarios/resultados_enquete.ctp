<div id="textoConteudo" style="margin-left: 540px; margin-top: -85px;"><?php echo $this->Html->image('../img/imagens/resultado.png')?></div>
<div id="conteudo" style="margin-top: -20px;">
    <br />
    <p>Confira o resultado da seguinte enquente:</p>
    <?php
        switch($id){
            case 4:
                echo '<h3>Como será seu parto?</h3>';
                echo '<p>Cesárea: '.number_format(substr($opcao1,2,2), 0, '', '.').'%</p>';
                echo '<p>Natural: '.number_format(substr($opcao2,2,2), 0, '', '.').'%</p>';
                echo '<p>Outros: '.number_format(substr($opcao3,2,2), 0, '', '.').'%</p>';
                break;
            case 5:
                echo '<h3>Por quanto você pretende amamentar?</h3>';
                echo '<p>Menos de seis meses: '.number_format(substr($opcao1,2,2), 0, '', '.').'%</p>';
                echo '<p>Seis meses: '.number_format(substr($opcao2,2,2), 0, '', '.').'%</p>';
                echo '<p>Acima de seis meses: '.number_format(substr($opcao3,2,2), 0, '', '.').'%</p>';
                break;
            case 6:
                echo '<h3>Você sabe quando surgem as primeiras palavras da maioria dos bebês?</h3>';
                echo '<p>1º mês: '.number_format(substr($opcao1,2,2), 0, '', '.').'%</p>';
                echo '<p>6º Mês: '.number_format(substr($opcao2,2,2), 0, '', '.').'%</p>';
                echo '<p>12º mês: '.number_format(substr($opcao3,2,2), 0, '', '.').'%</p>';
                echo '<p>18º Mês: '.number_format(substr($opcao4,2,2), 0, '', '.').'%</p>';
                break;
        }
    ?>
    <br>
    <div id="revista">
       
    </div>
</div>
<br><br>