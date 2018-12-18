<?php
namespace Ypunto\Admin\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Ypunto\Admin\Model\Table\GruposTable;

/**
 * Ypunto\Admin\Model\Table\GruposTable Test Case
 */
class GruposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Ypunto\Admin\Model\Table\GruposTable
     */
    public $Grupos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ypunto/admin.grupos',
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
        $config = TableRegistry::getTableLocator()->exists('Grupos') ? [] : ['className' => GruposTable::class];
        $this->Grupos = TableRegistry::getTableLocator()->get('Grupos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grupos);

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
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
