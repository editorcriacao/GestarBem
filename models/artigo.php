<?php
    Class Artigo extends AppModel{
        var $name = 'Artigo';
        var $hasMany = array('Comentario');
        var $belongsTo = array('Editoria', 'Colunista');
    }
?>
