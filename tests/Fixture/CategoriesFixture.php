<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 *
 */
class CategoriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'parent_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'lft' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'rght' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
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
            'id' => 3,
            'parent_id' => null,
            'lft' => 1,
            'rght' => 4,
            'name' => 'comida',
            'description' => 'comida',
            'created' => '2017-11-20 20:27:54',
            'modified' => '2017-11-20 20:27:54'
        ],
        [
            'id' => 4,
            'parent_id' => 3,
            'lft' => 2,
            'rght' => 3,
            'name' => 'feijao',
            'description' => 'feijao',
            'created' => '2017-11-20 20:28:03',
            'modified' => '2017-11-20 20:28:03'
        ],
        [
            'id' => 5,
            'parent_id' => null,
            'lft' => 5,
            'rght' => 10,
            'name' => 'Filmes',
            'description' => 'filmes',
            'created' => '2017-11-20 20:28:14',
            'modified' => '2017-11-20 20:28:14'
        ],
        [
            'id' => 2,
            'parent_id' => 5,
            'lft' => 6,
            'rght' => 9,
            'name' => 'açao',
            'description' => 'açao',
            'created' => '2017-11-20 20:27:45',
            'modified' => '2017-11-20 20:29:49'
        ],
        [
            'id' => 6,
            'parent_id' => 2,
            'lft' => 7,
            'rght' => 8,
            'name' => 'stalone',
            'description' => 'stalone',
            'created' => '2017-11-20 20:30:04',
            'modified' => '2017-11-20 20:30:04'
        ],
    ];
}
