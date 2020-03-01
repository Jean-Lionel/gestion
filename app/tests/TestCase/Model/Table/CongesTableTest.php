<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CongesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CongesTable Test Case
 */
class CongesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CongesTable
     */
    public $Conges;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Conges',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Conges') ? [] : ['className' => CongesTable::class];
        $this->Conges = TableRegistry::getTableLocator()->get('Conges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conges);

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
