<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotasTable Test Case
 */
class NotasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NotasTable
     */
    protected $Notas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Notas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Notas') ? [] : ['className' => NotasTable::class];
        $this->Notas = TableRegistry::getTableLocator()->get('Notas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Notas);

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
