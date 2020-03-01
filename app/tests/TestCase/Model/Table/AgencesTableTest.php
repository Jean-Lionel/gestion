<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgencesTable Test Case
 */
class AgencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgencesTable
     */
    public $Agences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Agences',
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
        $config = TableRegistry::getTableLocator()->exists('Agences') ? [] : ['className' => AgencesTable::class];
        $this->Agences = TableRegistry::getTableLocator()->get('Agences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Agences);

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
