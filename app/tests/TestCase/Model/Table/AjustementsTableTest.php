<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AjustementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AjustementsTable Test Case
 */
class AjustementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AjustementsTable
     */
    public $Ajustements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ajustements',
        'app.Ancienetes',
        'app.Categories',
        'app.Indeminites',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ajustements') ? [] : ['className' => AjustementsTable::class];
        $this->Ajustements = TableRegistry::getTableLocator()->get('Ajustements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ajustements);

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
