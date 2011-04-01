<?php
    Class Editoria extends AppModel{
        var $name = 'Editoria';

        var $hasMany = array('Artigo');
    }
?>
