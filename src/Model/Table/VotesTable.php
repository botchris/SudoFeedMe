<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Represents "votes" database table.
 *
 */
class VotesTable extends Table
{

    public function initialize(array $config)
    {
        $this->belongsTo('Issue', [
            'className' => 'Issues',
            'propertyName' => 'issue',
        ]);

        $this->addBehavior('CounterCache', [
            'Issue' => [
                'solved' => [
                    'conditions' => ['Votes.type' => 'solved']
                ],
                'agree' => [
                    'conditions' => ['Votes.type' => 'agree']
                ]
            ]
        ]);
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['issue_id', 'ip', 'type']));
        return $rules;
    }
}
