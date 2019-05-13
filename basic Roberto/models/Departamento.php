<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id
 * @property string $nomeDepartamento
 * @property string $nomeGerente
 * @property string $local
 *
 * @property Funcionarios[] $funcionarios
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeDepartamento', 'nomeGerente'], 'string', 'max' => 50],
            [['local'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomeDepartamento' => 'Nome Departamento',
            'nomeGerente' => 'Nome Gerente',
            'local' => 'Local',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionarios::className(), ['departamento' => 'id']);
    }
}
