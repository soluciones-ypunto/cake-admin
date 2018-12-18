<?php
namespace Ypunto\Admin\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Ypunto\Admin\Model\Table\EntidadesTable;

/**
 * Ypunto\Admin\Model\Table\EntidadesTable Test Case
 */
class EntidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Ypunto\Admin\Model\Table\EntidadesTable
     */
    public $Entidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ypunto/admin.entidades',
        'plugin.ypunto/admin.grupos',
        'plugin.ypunto/admin.cosas',
        'plugin.ypunto/admin.etiquetas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Entidades') ? [] : ['className' => EntidadesTable::class];
        $this->Entidades = TableRegistry::getTableLocator()->get('Entidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Entidades);

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
