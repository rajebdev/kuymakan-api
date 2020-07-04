<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuyercouponsFixture
 */
class BuyercouponsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'buyer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'coupon_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'claimed' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'expired' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'buyer_id' => ['type' => 'index', 'columns' => ['buyer_id'], 'length' => []],
            'buyercoupons_ibfk_2' => ['type' => 'index', 'columns' => ['coupon_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'buyercoupons_ibfk_1' => ['type' => 'foreign', 'columns' => ['buyer_id'], 'references' => ['buyers', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'buyercoupons_ibfk_2' => ['type' => 'foreign', 'columns' => ['coupon_id'], 'references' => ['coupons', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'buyer_id' => 1,
                'coupon_id' => 1,
                'claimed' => '2020-07-02 21:57:26',
                'expired' => '2020-07-02 21:57:26',
            ],
        ];
        parent::init();
    }
}
