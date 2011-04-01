<?php
    Class Usuario extends AppModel{
        var $name = 'Usuario';
        var $hasMany = array('Pagamento');
        var $validate = array(
                 'login_usuario' => array(
                    'alphanumeric' => array(
                    'rule' => 'alphaNumeric',
                    'required' => true,
                    'message' => 'Letras e números somente'
                                            ),
                    'between' => array(
                    'rule' => array('between', 5, 15),
                    'required' => true,
                    'message' => 'Entre 5 e 15 caracteres'
                     )
                  ),
            
                  'senha_usuario' => array(
                    'rule' => array('minLength', '6'),
                    'required' => true,
                    'message' => 'Mínimo de 6 caracteres'
                  ),
           );


    function beforeSave(){
        if(isset($this->data['Usuario']['senha_usuario'])) {
            $this->data['Usuario']['senha_usuario'] = md5($this->data['Usuario']['senha_usuario']);
        }
        foreach ($this->data['Usuario'] as $key => $row) {
            $this->data['Usuario'][$key] = strip_tags($row);
        }
        return true;
    }
    }
?>
