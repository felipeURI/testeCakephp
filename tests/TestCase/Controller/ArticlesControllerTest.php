<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\ArticlesController Test Case
 */
class ArticlesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.articles',
        'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/articles');
        $this->assertResponseOk();
        $this->assertResponseContains('asdf');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/articles/view/17');
        $this->assertResponseOk();
        $this->assertResponseContains('asdf');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddUnauthorized() {
      $this->get('/articles/add');
      $this->assertRedirectContains('/users/login');
    }
    public function testAdd()
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

      $data = [
            'category_id' => 4,
            'title' => 'title 992',
            'body' => 'body'
        ];
        $articles = TableRegistry::get('Articles');
        $query = $articles->find()->where(['title' => $data['title']]);
        $this->assertEquals(0, $query->count());
        $this->post('/articles/add', $data);

        $this->assertResponseSuccess();
        $query = $articles->find()->where(['title' => $data['title']]);
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
      $this->get('/articles/edit/20');
      $this->assertResponseOk();
      $data = [
            'title' => 'Novo Titulo',
            'body' => 'Corpão'
        ];
      $this->post('/articles/edit/20', $data);
      $this->assertResponseSuccess();
      $articles = TableRegistry::get('Articles');
      $query = $articles->find()->where(['title' => 'Novo Titulo']);
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
            ]
          ]
      ]);
      $articles = TableRegistry::get('Articles');
      $query = $articles->find()->where(['id' => 20]);
      $this->assertEquals(1, $query->count());
      $this->post('/articles/delete/20');
      $this->assertResponseSuccess();
      $query = $articles->find()->where(['id' => 20]);
      $this->assertEquals(0, $query->count());
    }
}
