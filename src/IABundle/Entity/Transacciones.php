<?php

namespace IABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transacciones
 *
 * @ORM\Table(name="Transacciones")
 * @ORM\Entity
 */
class Transacciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtransaccion", type="integer", nullable=true)
     */
    private $idtransaccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_elemento", type="integer", nullable=true)
     */
    private $idElemento;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtable", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtable;



    /**
     * Set idtransaccion
     *
     * @param integer $idtransaccion
     *
     * @return Transacciones
     */
    public function setIdtransaccion($idtransaccion)
    {
        $this->idtransaccion = $idtransaccion;

        return $this;
    }

    /**
     * Get idtransaccion
     *
     * @return integer
     */
    public function getIdtransaccion()
    {
        return $this->idtransaccion;
    }

    /**
     * Set idElemento
     *
     * @param integer $idElemento
     *
     * @return Transacciones
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
     * Get idtable
     *
     * @return integer
     */
    public function getIdtable()
    {
        return $this->idtable;
    }
}
