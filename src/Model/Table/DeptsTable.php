<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depts Model
 *
 * @method \App\Model\Entity\Dept get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dept newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dept[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dept|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dept patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dept[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dept findOrCreate($search, callable $callback = null, $options = [])
 */
class DeptsTable extends Table
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

        $this->table('depts');
        $this->displayField('id');
        $this->primaryKey('id');
		$this->hasMany('Doctors', [
            'foreignKey' => 'dept_id'
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
            ->decimal('deptno')
            ->allowEmpty('deptno');

        $validator
            ->allowEmpty('dname');

        $validator
            ->allowEmpty('loc');

        return $validator;
    }
}
