<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Foodorder Entity
 *
 * @property int $id
 * @property int $food_id
 * @property int $order_id
 * @property int $amount
 *
 * @property \App\Model\Entity\Food $food
 * @property \App\Model\Entity\Order $order
 */
class Foodorder extends Entity
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
        'food_id' => true,
        'order_id' => true,
        'amount' => true,
        'food' => true,
        'order' => true,
    ];
}
