<?php

namespace IABundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Elementoxsubconjunto
 *
 * @ORM\Table(name="ElementoXSubconjunto")
 * @ORM\Entity
 */
class Elementoxsubconjunto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_linea", type="integer", nullable=true)
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
     * @ORM\Column(name="id_elemento", type="integer", nullable=true)
     */
    private $idElemento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_prueba", type="integer", nullable=true)
     */
    private $idPrueba;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ele_x_Sub", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEleXSub;



    /**
     * Set idLinea
     *
     * @param integer $idLinea
     *
     * @return Elementoxsubconjunto
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
     * @return Elementoxsubconjunto
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
     * Set idElemento
     *
     * @param integer $idElemento
     *
     * @return Elementoxsubconjunto
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
     * Set idPrueba
     *
     * @param integer $idPrueba
     *
     * @return Elementoxsubconjunto
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
     * Get idEleXSub
     *
     * @return integer
     */
    public function getIdEleXSub()
    {
        return $this->idEleXSub;
    }
}
