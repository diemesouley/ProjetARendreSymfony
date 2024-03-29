<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Client extends \App\Entity\Client implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nomEnvoyeur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'prenomEnvoyeur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'telephoneEnvoyeur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nCI', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nomRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'prenomRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'telephoneRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nCIRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'transactions'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nomEnvoyeur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'prenomEnvoyeur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'telephoneEnvoyeur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nCI', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nomRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'prenomRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'telephoneRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'nCIRecepteur', '' . "\0" . 'App\\Entity\\Client' . "\0" . 'transactions'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Client $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNomEnvoyeur(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomEnvoyeur', []);

        return parent::getNomEnvoyeur();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomEnvoyeur(string $nomEnvoyeur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomEnvoyeur', [$nomEnvoyeur]);

        return parent::setNomEnvoyeur($nomEnvoyeur);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrenomEnvoyeur(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrenomEnvoyeur', []);

        return parent::getPrenomEnvoyeur();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrenomEnvoyeur(string $prenomEnvoyeur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrenomEnvoyeur', [$prenomEnvoyeur]);

        return parent::setPrenomEnvoyeur($prenomEnvoyeur);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelephoneEnvoyeur(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelephoneEnvoyeur', []);

        return parent::getTelephoneEnvoyeur();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelephoneEnvoyeur(string $telephoneEnvoyeur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelephoneEnvoyeur', [$telephoneEnvoyeur]);

        return parent::setTelephoneEnvoyeur($telephoneEnvoyeur);
    }

    /**
     * {@inheritDoc}
     */
    public function getNCI(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNCI', []);

        return parent::getNCI();
    }

    /**
     * {@inheritDoc}
     */
    public function setNCI(int $nCI): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNCI', [$nCI]);

        return parent::setNCI($nCI);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomRecepteur(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomRecepteur', []);

        return parent::getNomRecepteur();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomRecepteur(string $nomRecepteur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomRecepteur', [$nomRecepteur]);

        return parent::setNomRecepteur($nomRecepteur);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrenomRecepteur(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrenomRecepteur', []);

        return parent::getPrenomRecepteur();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrenomRecepteur(string $prenomRecepteur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrenomRecepteur', [$prenomRecepteur]);

        return parent::setPrenomRecepteur($prenomRecepteur);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelephoneRecepteur(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelephoneRecepteur', []);

        return parent::getTelephoneRecepteur();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelephoneRecepteur(int $telephoneRecepteur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelephoneRecepteur', [$telephoneRecepteur]);

        return parent::setTelephoneRecepteur($telephoneRecepteur);
    }

    /**
     * {@inheritDoc}
     */
    public function getNCIRecepteur(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNCIRecepteur', []);

        return parent::getNCIRecepteur();
    }

    /**
     * {@inheritDoc}
     */
    public function setNCIRecepteur(?int $nCIRecepteur): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNCIRecepteur', [$nCIRecepteur]);

        return parent::setNCIRecepteur($nCIRecepteur);
    }

    /**
     * {@inheritDoc}
     */
    public function getTransactions(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTransactions', []);

        return parent::getTransactions();
    }

    /**
     * {@inheritDoc}
     */
    public function addTransaction(\App\Entity\Transaction $transaction): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTransaction', [$transaction]);

        return parent::addTransaction($transaction);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTransaction(\App\Entity\Transaction $transaction): \App\Entity\Client
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTransaction', [$transaction]);

        return parent::removeTransaction($transaction);
    }

}
