<?php

namespace IABundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * FormularioInicio
 *
 * @ORM\Entity
 */
class FormularioInicio
{
    /**
     * @var float
     *
    
     */
    private $minSup;

    /**
     * @var float
     *
    
     */
    private $minConf;



    /**
     * Set minSup
     *
     * @param float $minSup
     *
     * @return FormularioInicio
     */
    public function setMinSup($minSup)
    {
        $this->minSup = $minSup;

        return $this;
    }

    /**
     * Get minSup
     *
     * @return float
     */
    public function getMinSup()
    {
        return $this->minSup;
    }

    /**
     * Set minConf
     *
     * @param float $minConf
     *
     * @return FormularioInicio
     */
    public function setMinConf($minConf)
    {
        $this->minConf = $minConf;

        return $this;
    }

    /**
     * Get minConf
     *
     * @return float
     */
    public function getMinConf()
    {
        return $this->minConf;
    }

   
}
