<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $code
 * @property \Cake\I18n\FrozenTime $created
 * @property int $orderstatus_id
 * @property int $user_id
 * @property string $location_send
 * @property int $restaurant_id
 *
 * @property \App\Model\Entity\Orderstatus $orderstatus
 * @property \App\Model\Entity\Buyer $buyer
 * @property \App\Model\Entity\Restaurant $restaurant
 * @property \App\Model\Entity\Foodorder[] $foodorders
 */
class Order extends Entity
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
        'code' => true,
        'created' => true,
        'orderstatus_id' => true,
        'user_id' => true,
        'location_send' => true,
        'restaurant_id' => true,
        'orderstatus' => true,
        'buyer' => true,
        'restaurant' => true,
        'foodorders' => true,
    ];
}
