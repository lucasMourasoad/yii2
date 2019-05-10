<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property string $cpf
 * @property string $nome
 * @property string $endereco
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 *
 * @property Veiculo[] $veiculos
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpf'], 'required'],
            [['cpf'], 'string', 'max' => 11],
            [['nome', 'endereco'], 'string', 'max' => 30],
            [['bairro'], 'string', 'max' => 20],
            [['cidade'], 'string', 'max' => 15],
            [['uf'], 'string', 'max' => 2],
            [['cpf'], 'unique'],
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
            'endereco' => 'Endereco',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculos()
    {
        return $this->hasMany(Veiculo::className(), ['cpf_proprietario' => 'cpf']);
    }
}
