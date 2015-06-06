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
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn('track_id', 'tracks'), 'trackExists', [
            'message' => 'Pista inválida'
        ]);

        return $rules;
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('description', 'validDescription', [
                'rule' => 'notBlank',
                'message' => __('You need to provide a valid role'),
                'provider' => 'table',
            ]);
        return $validator;
    }
}