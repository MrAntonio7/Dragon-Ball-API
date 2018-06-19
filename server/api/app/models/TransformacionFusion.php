<?php

class TransformacionFusion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_transformacion;

    /**
     *
     * @var integer
     */
    public $id_fusion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("u447148602_apiz");
        $this->setSource("transformacion_fusion");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'transformacion_fusion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TransformacionFusion[]|TransformacionFusion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TransformacionFusion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
