<?php
/**
 * Created by PhpStorm.
 * User: Giansalex
 * Date: 15/07/2017
 * Time: 22:00
 */

namespace Greenter\Model\Voided;

use Greenter\Model\Company\Company;
use Greenter\Xml\Validator\VoidedValidator;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Voided
 * @package Greenter\Model\Voided
 */
class Voided
{
    use VoidedValidator;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max="3")
     * @var string
     */
    private $correlativo;

    /**
     * @Assert\Date()
     * @var \DateTime
     */
    private $fecGeneracion;

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @var \DateTime
     */
    private $fecComunicacion;

    /**
     * @Assert\NotBlank()
     * @Assert\Valid()
     * @var Company
     */
    private $company;

    /**
     * @Assert\Valid()
     * @var VoidedDetail[]
     */
    private $details;

    public function __construct()
    {
        $this->fecGeneracion = new \DateTime();
    }

    /**
     * @return string
     */
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * @param string $correlativo
     * @return Voided
     */
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFecGeneracion()
    {
        return $this->fecGeneracion;
    }

    /**
     * @param \DateTime $fecGeneracion
     * @return Voided
     */
    public function setFecGeneracion($fecGeneracion)
    {
        $this->fecGeneracion = $fecGeneracion;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFecComunicacion()
    {
        return $this->fecComunicacion;
    }

    /**
     * @param \DateTime $fecComunicacion
     * @return Voided
     */
    public function setFecComunicacion($fecComunicacion)
    {
        $this->fecComunicacion = $fecComunicacion;
        return $this;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     * @return Voided
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return VoidedDetail[]
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param VoidedDetail[] $details
     * @return Voided
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * Get FileName without extension.
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->company->getRuc() . '-' . $this->getXmlId();
    }

    /**
     * Get Id XML.
     *
     * @return string
     */
    public function getXmlId()
    {
        $parts = [
            'RA',
            $this->getFecComunicacion()->format('Ymd'),
            $this->getCorrelativo(),
        ];

        return join('-', $parts);
    }
}