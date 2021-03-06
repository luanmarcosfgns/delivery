<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersnotasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersnotasTable Test Case
 */
class UsersnotasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersnotasTable
     */
    protected $Usersnotas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Usersnotas',
        'app.Users',
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
        $config = TableRegistry::getTableLocator()->exists('Usersnotas') ? [] : ['className' => UsersnotasTable::class];
        $this->Usersnotas = TableRegistry::getTableLocator()->get('Usersnotas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Usersnotas);

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
