<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuyernotifsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuyernotifsTable Test Case
 */
class BuyernotifsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuyernotifsTable
     */
    public $Buyernotifs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Buyernotifs',
        'app.Buyers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Buyernotifs') ? [] : ['className' => BuyernotifsTable::class];
        $this->Buyernotifs = TableRegistry::getTableLocator()->get('Buyernotifs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buyernotifs);

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
