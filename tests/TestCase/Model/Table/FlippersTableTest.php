<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlippersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlippersTable Test Case
 */
class FlippersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FlippersTable
     */
    public $Flippers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Flippers',
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
        $config = TableRegistry::getTableLocator()->exists('Flippers') ? [] : ['className' => FlippersTable::class];
        $this->Flippers = TableRegistry::getTableLocator()->get('Flippers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Flippers);

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
