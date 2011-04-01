<?php
    Class Comentario extends AppModel{
        var $name = 'Comentario';

        var $belongsTo = array('Artigo');
    }
?>
