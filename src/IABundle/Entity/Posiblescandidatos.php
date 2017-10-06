<?php

namespace IABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posiblescandidatos
 *
 * @ORM\Table(name="PosiblesCandidatos")
 * @ORM\Entity
 */
class Posiblescandidatos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba", type="integer", nullable=true)
     */
    private $idPrueba;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_iteracion", type="integer", nullable=true)
     */
    private $idIteracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_elemento", type="integer", nullable=true)
     */
    private $idElemento;

    /**
     * @var integer
     *
     * @ORM\Column(name="CandidatoAceptado", type="integer", nullable=true)
     */
    private $candidatoaceptado;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_s", type="integer", nullable=true)
     */
    private $itemS;

    /**
     * @var integer
     *
     * @ORM\Column(name="frecuencia", type="integer", nullable=true)
     */
    private $frecuencia = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="clave", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clave;



    /**
     * Set idPrueba
     *
     * @param integer $idPrueba
     *
     * @return Posiblescandidatos
     */
    public function setIdPrueba($idPrueba)
    {
        $this->idPrueba = $idPrueba;

        return $this;
    }

    /**
     * Get idPrueba
     *
     * @return integer
     */
    public function getIdPrueba()
    {
        return $this->idPrueba;
    }

    /**
     * Set idIteracion
     *
     * @param integer $idIteracion
     *
     * @return Posiblescandidatos
     */
    public function setIdIteracion($idIteracion)
    {
        $this->idIteracion = $idIteracion;

        return $this;
    }

    /**
     * Get idIteracion
     *
     * @return integer
     */
    public function getIdIteracion()
    {
        return $this->idIteracion;
    }

    /**
     * Set idElemento
     *
     * @param integer $idElemento
     *
     * @return Posiblescandidatos
     */
    public function setIdElemento($idElemento)
    {
        $this->idElemento = $idElemento;

        return $this;
    }

    /**
     * Get idElemento
     *
     * @return integer
     */
    public function getIdElemento()
    {
        return $this->idElemento;
    }

    /**
     * Set candidatoaceptado
     *
     * @param integer $candidatoaceptado
     *
     * @return Posiblescandidatos
     */
    public function setCandidatoaceptado($candidatoaceptado)
    {
        $this->candidatoaceptado = $candidatoaceptado;

        return $this;
    }

    /**
     * Get candidatoaceptado
     *
     * @return integer
     */
    public function getCandidatoaceptado()
    {
        return $this->candidatoaceptado;
    }

    /**
     * Set itemS
     *
     * @param integer $itemS
     *
     * @return Posiblescandidatos
     */
    public function setItemS($itemS)
    {
        $this->itemS = $itemS;

        return $this;
    }

    /**
     * Get itemS
     *
     * @return integer
     */
    public function getItemS()
    {
        return $this->itemS;
    }

    /**
     * Set frecuencia
     *
     * @param integer $frecuencia
     *
     * @return Posiblescandidatos
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return integer
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Get clave
     *
     * @return integer
     */
    public function getClave()
    {
        return $this->clave;
    }
}
