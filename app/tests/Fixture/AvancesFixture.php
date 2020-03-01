<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AvancesFixture
 */
class AvancesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'matricule' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'compte' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf16_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'variable_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'montant_moi' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'montant_restant' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'montant' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'periode' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_avance' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_fin' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf16_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'matricule' => 1,
                'compte' => 'Lorem ipsum dolor sit amet',
                'variable_id' => 1,
                'montant_moi' => 1,
                'montant_restant' => 1,
                'montant' => 1,
                'created' => '2020-02-16 03:28:29',
                'modified' => '2020-02-16 03:28:29',
                'periode' => 1,
                'date_avance' => '2020-02-16',
                'date_fin' => '2020-02-16',
            ],
        ];
        parent::init();
    }
}
