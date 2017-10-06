<?php

namespace IABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subconjuntos
 *
 * @ORM\Table(name="Subconjuntos")
 * @ORM\Entity
 */
class Subconjuntos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_linea", type="integer", nullable=false)
     */
    private $idLinea;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_subconjunto", type="integer", nullable=true)
     */
    private $idSubconjunto;

    /**
     * @var integer
     *
     * @ORM\Column(name="Frecuencia", type="integer", nullable=true)
     */
    private $frecuencia;

    /**
     * @var float
     *
     * @ORM\Column(name="Soporte", type="float", precision=24, scale=0, nullable=true)
     */
    private $soporte;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba", type="integer", nullable=true)
     */
    private $idPrueba;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtable", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtable;



    /**
     * Set idLinea
     *
     * @param integer $idLinea
     *
     * @return Subconjuntos
     */
    public function setIdLinea($idLinea)
    {
        $this->idLinea = $idLinea;

        return $this;
    }

    /**
     * Get idLinea
     *
     * @return integer
     */
    public function getIdLinea()
    {
        return $this->idLinea;
    }

    /**
     * Set idSubconjunto
     *
     * @param integer $idSubconjunto
     *
     * @return Subconjuntos
     */
    public function setIdSubconjunto($idSubconjunto)
    {
        $this->idSubconjunto = $idSubconjunto;

        return $this;
    }

    /**
     * Get idSubconjunto
     *
     * @return integer
     */
    public function getIdSubconjunto()
    {
        return $this->idSubconjunto;
    }

    /**
     * Set frecuencia
     *
     * @param integer $frecuencia
     *
     * @return Subconjuntos
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
     * Set soporte
     *
     * @param float $soporte
     *
     * @return Subconjuntos
     */
    public function setSoporte($soporte)
    {
        $this->soporte = $soporte;

        return $this;
    }

    /**
     * Get soporte
     *
     * @return float
     */
    public function getSoporte()
    {
        return $this->soporte;
    }

    /**
     * Set idPrueba
     *
     * @param integer $idPrueba
     *
     * @return Subconjuntos
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
     * Get idtable
     *
     * @return integer
     */
    public function getIdtable()
    {
        return $this->idtable;
    }
}
