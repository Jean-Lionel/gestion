<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MisepiedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MisepiedsTable Test Case
 */
class MisepiedsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MisepiedsTable
     */
    public $Misepieds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Misepieds',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Misepieds') ? [] : ['className' => MisepiedsTable::class];
        $this->Misepieds = TableRegistry::getTableLocator()->get('Misepieds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Misepieds);

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
