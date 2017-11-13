<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Procedures Model
 *
 * @method \App\Model\Entity\Procedure get($primaryKey, $options = [])
 * @method \App\Model\Entity\Procedure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Procedure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Procedure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Procedure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Procedure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Procedure findOrCreate($search, callable $callback = null, $options = [])
 */
class ProceduresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('procedures');
        $this->displayField('id');
        $this->primaryKey('id');
		$this->hasMany('Doctors', [
            'foreignKey' => 'procedures_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('procedure_name')
            ->requirePresence('procedure_name', 'create')
            ->notEmpty('procedure_name');

        return $validator;
    }
}
