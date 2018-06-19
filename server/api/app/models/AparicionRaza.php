<?php

class AparicionRaza extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_saga;

    /**
     *
     * @var integer
     */
    public $id_raza;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("u447148602_apiz");
        $this->setSource("aparicion_raza");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'aparicion_raza';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AparicionRaza[]|AparicionRaza|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AparicionRaza|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
