<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Product extends Model
{

    /**
     * PRODUCT ATTRIBUTES
    …
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->items - Item[] - contains the associated items
     */

    public static function validate($request){
        $request->validate([
            'name' => ['required', 'unique:products', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'image' => ['image'],
            'description' => 'required',
        ]);
    }


    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]);
        }
        return $total;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return strtoupper($this->name);
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(){
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at){
        $this->updated_at = $updated_at;
    }

    // RELATIONSHIPS
    public function items(){
        return $this->hasMany(Item::class);
    }

    public function getItems(){
        return $this->items;
    }

    public function setItems($items){
        $this->items = $items;
    }

}
