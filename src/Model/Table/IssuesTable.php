<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Represents "issues" database table.
 *
 */
class IssuesTable extends Table
{

    public function initialize(array $config)
    {
        $this->belongsTo('Track', [
            'className' => 'Tracks',
            'propertyName' => 'track',
        ]);

        $this->hasMany('Votes', [
            'className' => 'Votes',
            'propertyName' => 'votes',
        ]);
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn('track_id', 'Track'));
        return $rules;
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('description', 'create')
            ->requirePresence('lat', 'create')
            ->requirePresence('lng', 'create')
            ->add('description', 'validDescription', [
                'rule' => 'notBlank',
                'message' => 'Debe proporcionar una descripción',
            ])
            ->add('lat', 'validDescription', [
                'rule' => 'notBlank',
                'message' => 'LAT inválida',
            ])
            ->add('lng', 'validDescription', [
                'rule' => 'notBlank',
                'message' => 'LNG inválida',
            ]);
        return $validator;
    }
}