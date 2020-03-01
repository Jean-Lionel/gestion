<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetraitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetraitesTable Test Case
 */
class RetraitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RetraitesTable
     */
    public $Retraites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Retraites',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Retraites') ? [] : ['className' => RetraitesTable::class];
        $this->Retraites = TableRegistry::getTableLocator()->get('Retraites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Retraites);

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
