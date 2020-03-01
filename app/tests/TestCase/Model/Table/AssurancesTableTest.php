<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssurancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssurancesTable Test Case
 */
class AssurancesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssurancesTable
     */
    public $Assurances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Assurances',
        'app.Variables',
        'app.Fonctions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Assurances') ? [] : ['className' => AssurancesTable::class];
        $this->Assurances = TableRegistry::getTableLocator()->get('Assurances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assurances);

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
