<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Buyernotif Entity
 *
 * @property int $id
 * @property string $label
 * @property string $icon
 * @property string $images
 * @property string $link
 * @property \Cake\I18n\FrozenTime $created
 * @property int $buyer_id
 *
 * @property \App\Model\Entity\Buyer $buyer
 */
class Buyernotif extends Entity
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
        'label' => true,
        'icon' => true,
        'images' => true,
        'link' => true,
        'created' => true,
        'buyer_id' => true,
        'buyer' => true,
    ];
}
