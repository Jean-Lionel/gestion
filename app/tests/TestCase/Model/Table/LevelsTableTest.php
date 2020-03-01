<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LevelsTable Test Case
 */
class LevelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LevelsTable
     */
    public $Levels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Levels',
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
        $config = TableRegistry::getTableLocator()->exists('Levels') ? [] : ['className' => LevelsTable::class];
        $this->Levels = TableRegistry::getTableLocator()->get('Levels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Levels);

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
