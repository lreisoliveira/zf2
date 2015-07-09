<?php

/**
 * Abastração da entity
 */
namespace Intranet\Entity;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Abstração da entity
 *
 * @author Leonard Albert <lampedro@fcl.com.br>
 * @access public
 * @package Intranet\Entity\AbstractEntity
 * @abstract
 *
 */
abstract class AbstractEntity implements InputFilterAwareInterface
{
    /**
     * $inputFilter
     * @var Zend\InputFilter\InputFilter
     */
    protected $inputFilter;
    
    /**
     * $serviceLocator
     * @var unknown_type
     */
    protected $serviceLocator;
    
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }
    
    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
        
        return $this;
    }
    
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
    
    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate(array $data = array())
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->__set($property, $value);
            }
        }
        return $this;
    }

    /**
     * Populate inputFilter
     *
     * @param InputFilterInterface $inputFilter
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    /**
     * Return inputFilter
     */
    public function getInputFilter()
    {
         return $this->inputFilter;
    }

    /**
     * Populate serviceLocator
     *
     * @param object $serviceLocator
     * @return object
     */
    public function setServiceLocator($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        
        return $this;
    }

    /**
     * get serviceLocator
     * @return object
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
} 