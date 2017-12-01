<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\CategoriesController Test Case
 */
class CategoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories',
        'app.articles'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 7,
                'username' => 'Felipe',
                'role' => 'admin'
            ]
          ]
      ]);
      $this->get('/categories');
      $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session([
          'Auth' => [
              'User' => [
                  'id' => 7,
                  'username' => 'Felipe',
                  'role' => 'admin'
              ]
            ]
        ]);
        $this->get('/categories/view/3');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 7,
                'username' => 'Felipe',
                'role' => 'admin'
              //  'usarname' => '',
              //  'created' => '',
              //  'modified' => ''

            ]
        ]
      ]);

    $this->get('/categories/add');
    $this->assertResponseOk();
    $data = [
          'parent_id' => 2,
          'name' => 'tiroteio',
          'description' => 'bang bang'
      ];
      $this->post('/categories/add', $data);
      $this->assertResponseSuccess();
      $categories = TableRegistry::get('Categories');
      $query = $categories->find()->where(['name' => $data['name']]);
      $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 7,
                'username' => 'Felipe',
                'role' => 'admin'
            ]
          ]
      ]);
      $this->get('/categories/edit/2');
      $this->assertResponseOk();
      $data = [
            'name' => 'Nova ação',
            'description' => 'lala'
        ];
      $this->post('/categories/edit/2', $data);
      $this->assertResponseSuccess();
      $categories = TableRegistry::get('Categories');
      $query = $categories->find()->where(['name' => $data['name']]);
      $this->assertEquals(1, $query->count());
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 7,
                'username' => 'Felipe',
                'role' => 'admin'
              //  'usarname' => '',
              //  'created' => '',
              //  'modified' => ''

            ]
          ]
      ]);
      $categories = TableRegistry::get('Categories');
      $query = $categories->find()->where(['id' => 2]);
      $this->assertEquals(1, $query->count());
      $this->post('/categories/delete/2');
      $this->assertResponseSuccess();
      $categories = TableRegistry::get('Categories');
      $query = $categories->find()->where(['id' => 2]);
      $this->assertEquals(0, $query->count());
    }
}
