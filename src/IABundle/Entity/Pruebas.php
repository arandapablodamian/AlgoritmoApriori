<?php

namespace IABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pruebas
 *
 * @ORM\Table(name="Pruebas")
 * @ORM\Entity
 */
class Pruebas
{
    /**
     * @var float
     *
     * @ORM\Column(name="Frecuencia", type="float", precision=24, scale=0, nullable=true)
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
     * @ORM\Column(name="idPrueba", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprueba;



    /**
     * Set frecuencia
     *
     * @param float $frecuencia
     *
     * @return Pruebas
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return float
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
     * @return Pruebas
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
     * Get idprueba
     *
     * @return integer
     */
    public function getIdprueba()
    {
        return $this->idprueba;
    }

     /**
     * Get idprueba
     *
     * @return Pruebas
     */
    public function setIdprueba($idPrueba)
    {
        return $this->idprueba=$idPrueba;
        return $this;
    }
}
