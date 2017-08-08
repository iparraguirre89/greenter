<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 08/08/2017
 * Time: 11:18 AM
 */

namespace Greenter\Xml\Validator;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait RetentionDetailValidator
 * @package Greenter\Xml\Validator
 */
trait RetentionDetailValidator
{
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('tipoDoc', [
            new Assert\NotBlank(),
            new Assert\Length(['max' => 2]),
        ]);
        $metadata->addPropertyConstraints('numDoc', [
            new Assert\NotBlank(),
            new Assert\Length(['max' => 13]),
        ]);
        $metadata->addPropertyConstraints('fechaEmision', [
            new Assert\NotBlank(),
            new Assert\Date(),
        ]);
        $metadata->addPropertyConstraint('impTotal', new Assert\NotBlank());
        $metadata->addPropertyConstraints('moneda', [
            new Assert\NotBlank(),
            new Assert\Length(['min' => 3, 'max' => 3]),
        ]);
        $metadata->addPropertyConstraints('pagos', [
            new Assert\NotBlank(),
            new Assert\Valid(),
        ]);
        $metadata->addPropertyConstraints('fechaPercepcion', [
            new Assert\NotBlank(),
            new Assert\Date(),
        ]);
        $metadata->addPropertyConstraint('impPercibido', new Assert\NotBlank());
        $metadata->addPropertyConstraint('impCobrar', new Assert\NotBlank());
        $metadata->addPropertyConstraint('tipoCambio', new Assert\Valid());
    }
}