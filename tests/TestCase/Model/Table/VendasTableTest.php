<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendasTable Test Case
 */
class VendasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendasTable
     */
    protected $Vendas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Vendas',
        'app.Enderecos',
        'app.Vendaprodutos',
        'app.Vendatituloentrega',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vendas') ? [] : ['className' => VendasTable::class];
        $this->Vendas = TableRegistry::getTableLocator()->get('Vendas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Vendas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
