<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendatituloentregaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendatituloentregaTable Test Case
 */
class VendatituloentregaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendatituloentregaTable
     */
    protected $Vendatituloentrega;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Vendatituloentrega',
        'app.Vendas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vendatituloentrega') ? [] : ['className' => VendatituloentregaTable::class];
        $this->Vendatituloentrega = TableRegistry::getTableLocator()->get('Vendatituloentrega', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Vendatituloentrega);

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
