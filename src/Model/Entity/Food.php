<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Food Entity
 *
 * @property int $id
 * @property string $names
 * @property string $details
 * @property int $prices
 * @property int $stock
 * @property int $foodtype_id
 * @property int $category_id
 * @property int $restaurant_id
 *
 * @property \App\Model\Entity\Foodtype $foodtype
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Restaurant $restaurant
 * @property \App\Model\Entity\Flipper[] $flippers
 */
class Food extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'names' => true,
        'details' => true,
        'prices' => true,
        'stock' => true,
        'foodtype_id' => true,
        'category_id' => true,
        'restaurant_id' => true,
        'foodtype' => true,
        'category' => true,
        'restaurant' => true,
        'flippers' => true,
    ];
}
