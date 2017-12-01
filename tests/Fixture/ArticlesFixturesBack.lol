<?php
////Remember to generate new fixture when table is updated;
//bin/cake bake fixture <TableName> -r --count 100 //flag used to copy content of mentioned table, up to counter, without it it only generates fixture model with dummy data 
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 *
 */
class ArticlesFixture extends TestFixture
{

    //public $connection = 'test';
    //public $import = ['table' => 'articles', 'connection' => 'test'];
    public $import = ['model' => 'Articles'];
    public $table = 'articles';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart

    // public $fields = [
    //     'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
    //     'title' => ['type' => 'string', 'length' => 50, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
    //     'body' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
    //     'published' => ['type' => 'boolean'],
    //     'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
    //     'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
    //     '_constraints' => [
    //         'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
    //     ],
    // ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 17,
            'title' => 'Lala',
            'body' => 'Lolo',
            'category_id' => 3,
            'created' => '2017-11-21 17:31:04',
            'modified' => '2017-11-21 17:31:04',
            'published' => true
        ],
        [
            'id' => 18,
            'title' => 'Lala',
            'body' => 'Lolo',
            'category_id' => 3,
            'created' => '2017-11-21 17:31:04',
            'modified' => '2017-11-21 17:31:04',
            'published' => true
        ],
        [
            'id' => 19,
            'title' => 'Lala',
            'body' => 'Lolo',
            'category_id' => 3,
            'created' => '2017-11-21 17:31:04',
            'modified' => '2017-11-21 17:31:04',
            'published' => true
        ]
    ];
}
