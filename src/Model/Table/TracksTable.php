<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use \ArrayObject;

/**
 * Represents "tracks" database table.
 *
 */
class TracksTable extends Table
{

    public function initialize(array $config)
    {
        $this->hasMany('Issues', [
            'className' => 'Issues',
            'propertyName' => 'issues',
            'conditions' => [
                'Issues.solved <= (Issues.agree * 1.5)'
            ]
        ]);
    }
}