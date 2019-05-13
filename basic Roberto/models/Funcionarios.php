<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionarios".
 *
 * @property string $cpf
 * @property string $nome
 * @property int $idade
 * @property string $cargo
 * @property int $departamento
 * @property string $cidade
 * @property string $estado
 *
 * @property Departamento $departamento0
 */
class Funcionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpf'], 'required'],
            [['idade', 'departamento'], 'integer'],
            [['cpf'], 'string', 'max' => 15],
            [['nome', 'cargo'], 'string', 'max' => 50],
            [['cidade', 'estado'], 'string', 'max' => 30],
            [['cpf'], 'unique'],
            [['departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['departamento' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cpf' => 'Cpf',
            'nome' => 'Nome',
            'idade' => 'Idade',
            'cargo' => 'Cargo',
            'departamento' => 'Departamento',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento0()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'departamento']);
    }
}
