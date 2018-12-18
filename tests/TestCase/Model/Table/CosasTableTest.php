<?php
namespace Ypunto\Admin\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Ypunto\Admin\Model\Table\CosasTable;

/**
 * Ypunto\Admin\Model\Table\CosasTable Test Case
 */
class CosasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Ypunto\Admin\Model\Table\CosasTable
     */
    public $Cosas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ypunto/admin.cosas',
        'plugin.ypunto/admin.entidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cosas') ? [] : ['className' => CosasTable::class];
        $this->Cosas = TableRegistry::getTableLocator()->get('Cosas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cosas);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
