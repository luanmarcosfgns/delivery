<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SessaosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SessaosTable Test Case
 */
class SessaosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SessaosTable
     */
    protected $Sessaos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sessaos',
        'app.Produtos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sessaos') ? [] : ['className' => SessaosTable::class];
        $this->Sessaos = TableRegistry::getTableLocator()->get('Sessaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sessaos);

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
}
