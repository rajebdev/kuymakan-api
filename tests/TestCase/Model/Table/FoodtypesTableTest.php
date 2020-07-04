<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodtypesTable Test Case
 */
class FoodtypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodtypesTable
     */
    public $Foodtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Foodtypes',
        'app.Foods',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Foodtypes') ? [] : ['className' => FoodtypesTable::class];
        $this->Foodtypes = TableRegistry::getTableLocator()->get('Foodtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Foodtypes);

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
}
