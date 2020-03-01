<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvancesTable Test Case
 */
class AvancesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AvancesTable
     */
    public $Avances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Avances',
        'app.Variables',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Avances') ? [] : ['className' => AvancesTable::class];
        $this->Avances = TableRegistry::getTableLocator()->get('Avances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Avances);

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
