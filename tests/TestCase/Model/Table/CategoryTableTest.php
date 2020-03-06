<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryTable Test Case
 */
class CategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryTable
     */
    protected $Category;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Category',
        'app.Book',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Category') ? [] : ['className' => CategoryTable::class];
        $this->Category = TableRegistry::getTableLocator()->get('Category', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Category);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
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
