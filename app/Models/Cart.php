<?php 

namespace App\Models;

class Cart 
{
   public $items = [];
   public $totalQty = 0;
   public $totalPrice = 0;

   public function __construct($oldCart)
   {
      if ($oldCart) {
         $this->items = $oldCart->items;
         $this->totalQty = $oldCart->totalQty;
         $this->totalPrice = $oldCart->totalPrice;
      }
   }

   public function add($item, $customerRequest)
   {
      $storedItem = ['item' => $item, 'price' => $item->price, 'customer_request' => $customerRequest];
      $this->items[] = $storedItem;
      $this->totalQty++;
      $this->totalPrice += $item->price;
   }

   public function remoteItem($id)
   {
      $this->totalQty--;
      $this->totalPrice -= $this->items[$id]['price'];
      unset($this->items[$id]);
   }
}