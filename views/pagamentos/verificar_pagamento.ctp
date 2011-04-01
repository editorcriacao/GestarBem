<div id="textoConteudo" style="margin-left: 540px; margin-top: -80px"><?php echo $this->Html->image('../img/imagens/pagamentos.png')?></div>
<div id="conteudo" style="margin-top: -20px;">
<?php if (empty($pagamentos)) {
 ?>
    <p style="margin-left: 15px; font-family: arial, verdana, sans-serif; font-size: 16px; ">Não há nenhum registro de pagamento!</p>
<?php } else {?>

<?php foreach ($pagamentos as $dadosCompra) { ?>
        <div id="dadosConfirma">
            <p>Transação ID: <b><?php echo $dadosCompra['Pagamento']['id'] ?></b></p>
            <p>Status Transaçao: <b><?php echo $dadosCompra['Pagamento']['StatusTransacao'] ?></b></p>
             <p>Data da Transaçao: <b><?php
                        $ano = substr ($dadosCompra['Pagamento']['DataTransacao'], 0, 4);
                        $mes = substr ($dadosCompra['Pagamento']['DataTransacao'], 5,2);
                        $dia = substr ($dadosCompra['Pagamento']['DataTransacao'],8,2);
                        $hora = substr ($dadosCompra['Pagamento']['DataTransacao'], 11,2);
                        $minuto = substr ($dadosCompra['Pagamento']['DataTransacao'], 14,2);
                        $segundo = substr ($dadosCompra['Pagamento']['DataTransacao'], 17,2);
                       echo $dia.'/'.$mes.'/'.$ano.' '.$hora.':'.$minuto.':'.$segundo;
                 ?>

                 </b></p>
            <p>Revista: <b><?php echo $dadosCompra['Pagamento']['ProdDescricao'] ?></b></p>
            <p>Valor da Assinatura: <b>R$<?php echo $dadosCompra['Pagamento']['ProdValor'] ?></b></p>
        </div>
    <br><br>
<?php } ?>
<?php } ?>
     <br><br>
</div>