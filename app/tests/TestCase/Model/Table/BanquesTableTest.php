<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BanquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BanquesTable Test Case
 */
class BanquesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BanquesTable
     */
    public $Banques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Banques',
        'app.Assurances',
        'app.Avance',
        'app.Employes',
        'app.Epargnes',
        'app.Credits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Banques') ? [] : ['className' => BanquesTable::class];
        $this->Banques = TableRegistry::getTableLocator()->get('Banques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Banques);

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
