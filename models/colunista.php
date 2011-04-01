<?php
    class Colunista extends AppModel{
        var $name = 'Colunista';

        var $hasMany = array('Artigo');
    }
?>
