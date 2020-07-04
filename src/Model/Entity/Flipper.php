<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flipper Entity
 *
 * @property int $id
 * @property string $images
 * @property string $link
 * @property int $food_id
 *
 * @property \App\Model\Entity\Food $food
 */
class Flipper extends Entity
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
        'images' => true,
        'link' => true,
        'food_id' => true,
        'food' => true,
    ];
}
