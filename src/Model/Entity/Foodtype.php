<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Foodtype Entity
 *
 * @property int $id
 * @property string $label
 * @property string $images
 *
 * @property \App\Model\Entity\Food[] $foods
 */
class Foodtype extends Entity
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
        'images' => true,
        'foods' => true,
    ];
}
