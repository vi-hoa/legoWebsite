<?php

namespace App\Models;



class Cart
{
    public function calculatePrice($cent){
        return number_format($cent / 100, 2);
    }

    public static function unitPrice($item){
        return (new self)->calculatePrice($item['product']['price'] ?? 0) * $item['quantity'];
    }

    public static function totalAmount(){
        // $total = 0;
        // foreach(session('cart') as $item){
        //     $total += self::unitPrice($item);
        // }
        // return $total;

        $total = 0;
        if(session()->has('cart')){
            foreach (session('cart') as $item) {
                # code...
                $total += self::unitPrice($item);
            }
        }
        
        return $total;
    }
}
