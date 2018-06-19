<?php

class Fusion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_fusion;

    /**
     *
     * @var string
     */
    public $nombre;
    
        /**
     *
     * @var string
     */
    public $imagen;


    /**
     *
     * @var integer
     */
    public $id_personaje1;

    /**
     *
     * @var integer
     */
    public $id_personaje2;

    /**
     *
     * @var string
     */
    public $metodo;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("u447148602_apiz");
        $this->setSource("fusion");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'fusion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fusion[]|Fusion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fusion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
