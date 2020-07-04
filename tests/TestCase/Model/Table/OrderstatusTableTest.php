<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderstatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderstatusTable Test Case
 */
class OrderstatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderstatusTable
     */
    public $Orderstatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Orderstatus',
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
        $config = TableRegistry::getTableLocator()->exists('Orderstatus') ? [] : ['className' => OrderstatusTable::class];
        $this->Orderstatus = TableRegistry::getTableLocator()->get('Orderstatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orderstatus);

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
