<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Buyercoupon Entity
 *
 * @property int $id
 * @property int $buyer_id
 * @property int $coupon_id
 * @property \Cake\I18n\FrozenTime $claimed
 * @property \Cake\I18n\FrozenTime $expired
 *
 * @property \App\Model\Entity\Buyer $buyer
 * @property \App\Model\Entity\Coupon $coupon
 */
class Buyercoupon extends Entity
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
        'buyer_id' => true,
        'coupon_id' => true,
        'claimed' => true,
        'expired' => true,
        'buyer' => true,
        'coupon' => true,
    ];
}
