<?php
class Creditcard {
public $type = '';
public $valid = False;
public $number;
public $checksum;
     function __construct($num){ 
            $number = str_split(strval($num));
            if($number[0] == '5' && $number[1] >= '1'&& $number[1] <= '5'){
                   $this->type = 'MasterCard';
               $this->valid = True;
            }elseif ($number[0] == '4'){      
                  $this->type = 'Visa';
               $this->valid = True; 
             }elseif ($number[0] == '3' && ($number[1] == '4' || $number[1] == '7')){      
                  $this->type = 'American Expression';
               $this->valid = True;    
            }else{
            	$this->type = 'Invalid';
            	$this->valid = False;
            }
            $max = count($number);
            $sum = 0;
            if($this->valid){
               foreach (range(0, $max-1) as $digit) {
               	$newnum = intval($number[$digit]);
                 if(($digit+1) % 2 == 0){
                     $newnum = intval($number[$digit]) *2;
                     if($newnum >=10){
                     	$first = intdiv($newnum,10);
                     	$second = $newnum % 10;
                     	$newnum = $first + $second;
                     }
                   
                  
                 }
                      $number[$digit] = $newnum;
                      $sum = $sum + $newnum;
                }

            }
            $this->number = $number;
            $this->checksum = $sum;
            if($sum % 10 != 0){
               $this->type = 'Invalid';
            	$this->valid = False;
                }
            }


}

?>