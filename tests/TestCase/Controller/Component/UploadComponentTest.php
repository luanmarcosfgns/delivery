<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UploadComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UploadComponent Test Case
 */
class UploadComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\UploadComponent
     */
    protected $Upload;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Upload = new UploadComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Upload);

        parent::tearDown();
    }
}
