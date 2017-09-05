<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniversesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniversesTable Test Case
 */
class UniversesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UniversesTable
     */
    public $Universes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.universes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Universes') ? [] : ['className' => UniversesTable::class];
        $this->Universes = TableRegistry::get('Universes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Universes);

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
}
