<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CotationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CotationsTable Test Case
 */
class CotationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CotationsTable
     */
    public $Cotations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cotations',
        'app.Employes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cotations') ? [] : ['className' => CotationsTable::class];
        $this->Cotations = TableRegistry::getTableLocator()->get('Cotations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cotations);

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
