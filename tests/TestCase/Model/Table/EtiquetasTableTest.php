<?php
namespace Ypunto\Admin\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Ypunto\Admin\Model\Table\EtiquetasTable;

/**
 * Ypunto\Admin\Model\Table\EtiquetasTable Test Case
 */
class EtiquetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Ypunto\Admin\Model\Table\EtiquetasTable
     */
    public $Etiquetas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ypunto/admin.etiquetas',
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
        $config = TableRegistry::getTableLocator()->exists('Etiquetas') ? [] : ['className' => EtiquetasTable::class];
        $this->Etiquetas = TableRegistry::getTableLocator()->get('Etiquetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Etiquetas);

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
