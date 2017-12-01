<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];

    /**
     * Test beforeFilter method
     *
     * @return void
     */
    public function testBeforeFilter()
    {
      $this->get('/users');
      $this->assertRedirectContains('/users/login');
      $this->get('/users/login');
      $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testFlash() {
        $this->enableRetainFlashMessages();
        $this->get('/articles/edit/17');
        $this->assertSession('You are not authorized to access that location.', 'Flash.flash.0.message');
    }
    public function testLogin()
    {
        $data = [
            'username' => 'Felipe',
            'password' => 'felipe',
        ];
        $this->get('/users/login');
        $this->assertResponseOk();
        $this->assertSession(null, 'Auth.User.username');
        $this->post('/users/login', $data);
        $this->assertResponseSuccess();
        $this->assertRedirect(['controller' => 'Articles', 'action' => 'index']);
        $this->assertSession('Felipe', 'Auth.User.username'); //asserts that session has started
      }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
      // using a post request on login() creates a session that can be asserted by assertSession();
      // $data = [
      //     'username' => 'Felipe',
      //     'password' => 'felipe',
      // ];
      // $this->get('/users/login');
      // $this->assertResponseOk();
      // $this->post('/users/login', $data);
      // $this->assertResponseSuccess();


      /*
      correction, a session created this way does not work as a session created by a method,
      this only give the user the permissions of the user but without creating a session (session obj = NULL)
      */
      // $this->session([
      //   'Auth' => [
      //       'User' => [
      //           'id' => 7,
      //           'username' => 'Felipe',
      //           'role' => 'admin'
      //       ]
      //     ]
      // ]);
      //$session = $this->request->session();
      // $session = $this->session()->write('Auth.User.username', 'Felipe');
      // $session = $this->request->session()->write('Auth.User.role', 'admin' );
      // debug($_SESSION); die;
      // $this->assertSession('Felipe', 'Auth.User.username'); //
      // $this->get('/users');
      // $this->assertResponseOk();
      $this->get('/users/logout');
      $this->assertRedirect(['controller' => 'Users', 'action' => 'logoutScreen']);
      $this->assertSession(null, 'Auth.User.username'); //asserts that session has ended
      //logout method always return an empty array for session. I think this is enought to confirm it is working.

      // debug($_SESSION); die;
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {

      //$this->request->session()->write('Auth.User.username', $user->username);
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 7,
                'username' => 'Felipe',
                'role' => 'admin'
            ]
          ]
      ]);
      $this->get('/users');
      $this->assertResponseOk();
      $this->assertResponseContains('Felipe');
      $this->assertResponseContains('Mangojata');
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
      $this->get('/users/view/7');
      $this->assertResponseOk();
      $this->assertResponseContains('Felipe');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/users/add');
        $this->assertResponseOk();
        $data = [
            'username' => 'Billy',
            'password' => 'billy',
        ];
        $this->post('/users/add', $data);
        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['username' => $data['username']]);
        $this->assertEquals(1, $query->count());

    }

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorizedAdd()
    {
      $this->get('/users/add');
      $this->assertResponseOk();
    }

    public function testIsAuthorizedEdit()
    {
      $this->get('/articles/edit/17');
      $this->assertRedirectContains('/users/login');
      $this->get('/categories/edit/2');
      $this->assertRedirectContains('/users/login');




    }

    public function testIsAuthorizedDelete()
    {
      $this->get('/articles/delete/17');
      $this->assertRedirectContains('/users/login');
      $this->get('/categories/delete/2');
      $this->assertRedirectContains('/users/login');
    }
}
