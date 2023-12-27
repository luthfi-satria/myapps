<?php 
    helper('form');
    $inputClass = 'mt-2 flex h-10 w-full items-center justify-center rounded-xl border bg-white p-3 text-sm outline-none border-gray-200';
    $input = [
        [
            'type' => 'form_input',
            'attr' => [
                'id' => 'inp_key',
                'name' => 'ckey',
                'type' => 'hidden'
            ],
        ],
        [
            'type' => 'form_input',
            'label' => 'name',
            'attr' => [
                'id' => 'inp_name',
                'name' => 'name',
                'class' => $inputClass,
                'value' => '',
                'placeholder' => 'setting name'
            ],
        ],
        [
            'type' => 'form_input',
            'label' => 'value',
            'attr' => [
                'id' => 'inp_value',
                'name' => 'cval',
                'class' => $inputClass,
                'value' => '',
                'placeholder' => 'setting value'
            ]
        ],
        [
            'type' => 'form_textarea',
            'label' => 'description',
            'attr' => [
                'id' => 'inp_desc',
                'name' => 'description',
                'class' => str_replace('h-10','h-20', $inputClass),
                'value' => '',
                'placeholder' => 'setting description'
            ]
        ],
    ];
?>

<form id="setting_form">
    <?php
        foreach($input as $value){
            $forminp = call_user_func($value['type'], $value['attr']);
            
            echo '<div class="grid grid-cols-3 mb-2">';
                if(key_exists('label', $value)){
                    echo '<label class="col-span-1 leading-10">'.$value['label'].'</label>';
                }
                echo '<div class="w-full col-span-2">';
                    echo call_user_func($value['type'], $value['attr']);
                echo '</div>';
            echo '</div>';
        }
    ?>
</form>