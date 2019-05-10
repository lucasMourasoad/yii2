<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property string $chassi
 * @property string $marca
 * @property string $modelo
 * @property int $ano
 * @property string $placa
 * @property string $cpf_proprietario
 *
 * @property Pessoa $cpfProprietario
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'veiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano'], 'integer'],
            [['chassi'], 'string', 'max' => 20],
            [['marca', 'modelo'], 'string', 'max' => 10],
            [['placa'], 'string', 'max' => 7],
            [['cpf_proprietario'], 'string', 'max' => 11],
            [['cpf_proprietario'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['cpf_proprietario' => 'cpf']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'chassi' => 'Chassi',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'ano' => 'Ano',
            'placa' => 'Placa',
            'cpf_proprietario' => 'Cpf Proprietario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpfProprietario()
    {
        return $this->hasOne(Pessoa::className(), ['cpf' => 'cpf_proprietario']);
    }
}
