<?php
helper('form');

function setProperties($properties){
    $prop = [];
    if(!empty($properties)){
        foreach($properties as $key => $value){
            $prop[] = $key .'="'.$value.'"';
        }
    }
    return $prop;
}

function gradientBlueButton($properties, $label='', $icon=''){
    $defaultClass = 'bg-gradient-to-b from-blue-500 to-blue-700 rounded-md text-white box-border text-center whitespace-nowrap px-4 py-1 font-bold border border-blue-700 hover:bg-gradient-to-r';
    if(array_key_exists('class', $properties)){
        $properties['class'] .= $defaultClass;
    }else{
        $properties['class'] = $defaultClass;
    }
    $prop = setProperties($properties);
    
    $html ='<button '.implode(' ',array_values($prop)).'>';
    if(!empty($icon)){
        $html .= '<i class="fa '.$icon.'"></i>';
    }
    $html .= !empty($label) ? '<span class="ml-2">'.$label.'</span>' : '';
    $html .= '</button>';
    return $html;
}

function clearButton($properties, $label='', $icon=''){
    $defaultClass = 'bg-gradient-to-b from-emerald-500 to-emerald-700 rounded-md text-white box-border text-center whitespace-nowrap px-4 py-1 font-bold border border-emerald-700 hover:bg-gradient-to-r';
    if(array_key_exists('class', $properties)){
        $properties['class'] .= $defaultClass;
    }else{
        $properties['class'] = $defaultClass;
    }
    $prop = setProperties($properties);
    
    $html ='<button '.implode(' ',array_values($prop)).'>';
    if(!empty($icon)){
        $html .= '<i class="fa '.$icon.'"></i>';
    }
    $html .= !empty($label) ? '<span class="ml-2">'.$label.'</span>' : '';
    $html .= '</button>';
    return $html;
}

function inputText($prop){
    $inputClass = 'flex h-10 w-full items-center justify-center rounded-xl border bg-white p-3 text-sm outline-none border-gray-200';
    if(array_key_exists('class', $prop)){
        $prop['class'] .= $inputClass;
    }else{
        $prop['class'] = $inputClass;
    }

    return form_input($prop);
}
