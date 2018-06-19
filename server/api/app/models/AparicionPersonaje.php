<?php

class AparicionPersonaje extends \Phalcon\Mvc\Model
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
    public $id_personaje;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("u447148602_apiz");
        $this->setSource("aparicion_personaje");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'aparicion_personaje';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AparicionPersonaje[]|AparicionPersonaje|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AparicionPersonaje|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
