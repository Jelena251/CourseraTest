<?php 

namespace models;

class Dish {

	private $id;
	private $name;
	private $dish_category_id;
	private $gluten_free;
	private $vegan;
	private $description;
	private $price;
	
	public function __constructor($id, $name, $dish_category_id, $gluten_free, $vegan, $description, $price) {
		$this->id = $id;
		$this->name = $name;
		$this->dish_category_id = $dish_category_id;
		$this->gluten_free = $gluten_free;
		$this->vegan = $vegan;
		$this->description = $description;
		$this->price = $price;
	}
	
	public static function login() {
		
	}
	
	
	public function logout() {
		
	}

}

?>