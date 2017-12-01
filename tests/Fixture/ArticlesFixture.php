<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 *
 */
class ArticlesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'title' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'body' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        'category_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'published' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => null, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 17,
            'title' => 'asdf',
            'body' => 'asdf456',
            'category_id' => 5,
            'created' => '2017-11-20 21:04:27',
            'modified' => '2017-11-20 21:08:09',
            'published' => true,
            'user_id' => null
        ],
        [
            'id' => 18,
            'title' => 'asdfasdf2345',
            'body' => 'asdf5',
            'category_id' => 6,
            'created' => '2017-11-20 21:07:52',
            'modified' => '2017-11-20 21:08:25',
            'published' => true,
            'user_id' => null
        ],
        [
            'id' => 19,
            'title' => 'Lala',
            'body' => 'Lolo',
            'category_id' => 2,
            'created' => '2017-11-21 17:31:04',
            'modified' => '2017-11-21 17:31:04',
            'published' => true,
            'user_id' => null
        ],
        [
            'id' => 20,
            'title' => 'qwer',
            'body' => 'qwer',
            'category_id' => 6,
            'created' => '2017-11-21 18:53:49',
            'modified' => '2017-11-21 18:53:49',
            'published' => true,
            'user_id' => null
        ],
        [
            'id' => 21,
            'title' => 'pipoca',
            'body' => 'Pipoca',
            'category_id' => 3,
            'created' => '2017-11-22 19:53:42',
            'modified' => '2017-11-22 19:53:42',
            'published' => true,
            'user_id' => null
        ],
        [
            'id' => 22,
            'title' => 'ter',
            'body' => 'sdfg',
            'category_id' => 3,
            'created' => '2017-11-27 22:49:57',
            'modified' => '2017-11-27 22:49:57',
            'published' => true,
            'user_id' => 7
        ],
    ];
}
