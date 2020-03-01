<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AncienetesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AncienetesTable Test Case
 */
class AncienetesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AncienetesTable
     */
    public $Ancienetes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ancienetes',
        'app.Ajustements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ancienetes') ? [] : ['className' => AncienetesTable::class];
        $this->Ancienetes = TableRegistry::getTableLocator()->get('Ancienetes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ancienetes);

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
