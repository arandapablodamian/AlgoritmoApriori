<?php

namespace IABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Elementos
 *
 * @ORM\Table(name="Elementos")
 * @ORM\Entity
 */
class Elementos
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=10, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_elemento", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idElemento;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Elementos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
}
