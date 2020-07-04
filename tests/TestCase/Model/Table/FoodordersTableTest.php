<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodordersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodordersTable Test Case
 */
class FoodordersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodordersTable
     */
    public $Foodorders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Foodorders',
        'app.Foods',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Foodorders') ? [] : ['className' => FoodordersTable::class];
        $this->Foodorders = TableRegistry::getTableLocator()->get('Foodorders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Foodorders);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
