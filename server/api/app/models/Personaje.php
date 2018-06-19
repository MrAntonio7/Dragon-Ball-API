<?php

class Personaje extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_personaje;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var integer
     */
    public $id_raza;

    /**
     *
     * @var string
     */
    public $genero;

    /**
     *
     * @var string
     */
    public $imagen;

    /**
     *
     * @var integer
     */
    public $peso;

    /**
     *
     * @var integer
     */
    public $altura;

    /**
     *
     * @var string
     */
    public $nacimiento;

    /**
     *
     * @var string
     */
    public $muerte;

    /**
     *
     * @var string
     */
    public $resurreccion;

    /**
     *
     * @var string
     */
    public $ocupacion;

    /**
     *
     * @var string
     */
    public $alianzas;

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
        $this->setSchema("");
        $this->setSource("personaje");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'personaje';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Personaje[]|Personaje|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Personaje|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
