<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\Query;

/**
 * App\Model\Table\ArticlesTable Test Case
 */
class ArticlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTable
     */
    public $Articles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.articles'
    ];


    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $this->Articles = TableRegistry::get('Articles', $config);
    }

    public function testFindPublished()
    {
        //$query = $this->Articles->find('published');
        $query = $this->Articles->find();
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $query->select(['id', 'title'])->where(['published' => 1]);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 17, 'title' => 'asdf'],
            ['id' => 18, 'title' => 'asdfasdf2345'],
            ['id' => 19, 'title' => 'Lala'],
            ['id' => 20, 'title' => 'qwer'],
            ['id' => 21, 'title' => 'pipoca'],
            ['id' => 22, 'title' => 'ter']
        ];

        $this->assertEquals($expected, $result);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Articles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
     public function testIsOwnedBy()
     {
         $query = $this->Articles->find();
         $this->assertInstanceOf('Cake\ORM\Query', $query);
         $query->select(['user_id'])->where(['id' => 22]);
         $result = $query->hydrate(false)->toArray();
         $expected = [ ['user_id' => 7] ];
         $this->assertEquals($expected, $result);





     }

    public function testInitialize()
    {

        //what should I implment here?
        $this->assertEquals(1, 1);
    }
}
