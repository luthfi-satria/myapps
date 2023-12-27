<?php
namespace App\Helpers;

class LogicalHelper{

    static function NumberToRoman($number){
        $result = '';
        $divider = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        ];

        foreach($divider as $key => $val){
            $matches = intval($number / $key);
            $result .= str_repeat($val, $matches);
            $number = $number % $key;
        }        
        return $result;
    }

    static function Fibbonaci($n = 10){
        $fibo = array(0);

        for ($i=0; $i < $n ; $i++) {
            $arr_len = count($fibo);
            $fibo[] =  $arr_len > 2 ? array_sum(array_slice($fibo, -2)) : 1;
        }

        return $fibo;
    }

    static function Palindrom($stringVal){
        $strArr = is_array($stringVal) ? $stringVal : [$stringVal];
        $result = [];
        foreach($strArr as $key => $val){
            $words = strtolower(preg_replace('/[,\s]/','',$val));
            $result[$key] = ($words == strrev($words)) ? 'Palindrom' : 'Not Palindrom';
        }
        return $result;
    }

    static function sortArray($a, $flag = 'ASC'){
		for($i = 0; $i < count($a); $i++){
            for($j = 0; $j < count($a) - 1; $j++){
                $notacion = $flag == 'ASC' ? $a[$j+1] < $a[$j] : $a[$j+1] > $a[$j];
                $min = $notacion ? $a[$j+1]: $a[$j];
                $a[$j+1] = $notacion ? $a[$j] : $a[$j+1];
                $a[$j] = $min;
            }
        }
        return $a;
	}

    static function OddNumber($k, $l){
        $result = array();
		foreach (range($k, $l) as $key => $value) {
			if($value % 2 == 1){
				$result[] = $value;
			}
		}
		return $result;
    }

    static function PrimeNumber($from, $until){
        $number = range($from, $until);
        $result = array();
    
        foreach ($number as $key => $value) {
            $div = false;
            for ($i=2; $i <= $value - 1 ; $i++) { 
                if($value % $i == 0){
                    $div = true;
                }
            }
    
            if($div == false){
                $result[] = $value;
            }
        }
        return $result;    
    }

    static function JumpingOnClouds($input){
        $c = array_map('intval', preg_split('/ /', $input, -1, PREG_SPLIT_NO_EMPTY));
        $clouds = preg_grep('/[^1]/', $c);

        foreach ($clouds as $key => $value) {
            if(array_key_exists($key - 2, $clouds) && array_key_exists($key - 1, $clouds)){
                unset($clouds[$key - 1]);
            }
        }
	
	    return count($clouds) - 1;
    }
}