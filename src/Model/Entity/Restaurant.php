<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Restaurant Entity
 *
 * @property int $id
 * @property string $names
 * @property string $location
 * @property \Cake\I18n\FrozenTime $opentime
 * @property \Cake\I18n\FrozenTime $closetime
 * @property bool $closed
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Food[] $foods
 * @property \App\Model\Entity\Order[] $orders
 */
class Restaurant extends Entity
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
        'location' => true,
        'opentime' => true,
        'closetime' => true,
        'closed' => true,
        'user_id' => true,
        'user' => true,
        'foods' => true,
        'orders' => true,
    ];
}
