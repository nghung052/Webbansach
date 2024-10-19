<?php

namespace App\Models;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['qty'=>0, 
					'price' => $item->promotion_price==0?$item->unit_price:$item->promotion_price, 
					'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$giohang['price'] = ($item->promotion_price==0?$item->unit_price:$item->promotion_price) * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $item->promotion_price==0?$item->unit_price:$item->promotion_price;
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

	public function changeItem($id,$quantity){
		if($quantity > 0){
			$quantitys=(int)$quantity;
			$this->totalQty -= $this->items[$id]['qty'];
			$this->totalPrice -= $this->items[$id]['price'];
	
			$this->items[$id]['qty'] = $quantitys;
			$this->items[$id]['price'] = $quantitys*($this->items[$id]['item']->promotion_price==0?$this->items[$id]['item']->unit_price:$this->items[$id]['item']->promotion_price);
			
			$this->totalQty += $this->items[$id]['qty'];
			$this->totalPrice += $this->items[$id]['price'];
		}
	}	
}