<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndeminitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndeminitesTable Test Case
 */
class IndeminitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IndeminitesTable
     */
    public $Indeminites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Indeminites',
        'app.Ajustements',
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
        $config = TableRegistry::getTableLocator()->exists('Indeminites') ? [] : ['className' => IndeminitesTable::class];
        $this->Indeminites = TableRegistry::getTableLocator()->get('Indeminites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Indeminites);

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
