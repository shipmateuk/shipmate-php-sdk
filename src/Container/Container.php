<?php

namespace Shipmate\Container;

require "ObjectEncoder.php";

use Shipmate\ObjectEncoder;

class Container extends ObjectEncoder
{
    protected $id;
    protected $reference;
    protected $despatchDate;
    protected $despatchLocation;
    protected $deliveryServiceKey;
    protected $carrier;
    protected $carrierAccount;
    protected $serviceName;
    protected $fullServiceName;
    protected $trackingReference;
    protected $consolidationReference;
    protected $clearanceCountry;
    protected $clearanceLocationName;
    protected $maxParcels;
    protected $maxItems;
    protected $maxWeight;
    protected $maxValue;
    protected $valueCurrency;
    protected $parcels;
    protected $items;
    protected $weight;
    protected $value;
    protected $status;

    /**
     * Get the Container Reference
     *
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     *  Set the Container Reference
     *
     * @param string $id Your unique reference for the Container
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get Merchant supplied or system generated reference
     *
     * @return string
     */
    public function reference()
    {
        return $this->reference;
    }

    /**
     * Set Merchant supplied or system generated reference
     *
     * @param string $reference
     *
     * @return void
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get Despatch Date In format YYYY-MM-DD
     *
     * @return string
     */
    public function despatchDate()
    {
        return $this->despatchDate;
    }

    /**
     * Set Despatch Date In format YYYY-MM-DD
     *
     * @param string $despatchDate
     *
     * @return void
     */
    public function setDespatchDate($despatchDate)
    {
        $this->despatchDate = $despatchDate;
    }

    /**
     * Get Location object of Despatch Address
     *
     * @return object
     */
    public function despatchLocation()
    {
        return $this->despatchLocation;
    }

    /**
     * Set Location object of Despatch Address
     *
     * @param object $despatchLocation
     *
     * @return void
     */
    public function setDespatchLocation($despatchLocation)
    {
        $this->despatchLocation = $despatchLocation;
    }

    /**
     * Get The Delivery Service being used to send the Container
     *
     * @return string
     */
    public function deliveryServiceKey()
    {
        return $this->deliveryServiceKey;
    }

    /**
     * Set The Delivery Service being used to send the Container
     *
     * @param string $deliveryServiceKey
     *
     * @return void
     */
    public function setDeliveryServiceKey($deliveryServiceKey)
    {
        $this->deliveryServiceKey = $deliveryServiceKey;
    }

    /**
     * Get The Carrier name
     *
     * @return string
     */
    public function carrier()
    {
        return $this->carrier;
    }

    /**
     * Set The Carrier name
     *
     * @param string $carrier
     *
     * @return void
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * Get The Carrier Account name
     *
     * @return string
     */
    public function carrierAccount()
    {
        return $this->carrierAccount;
    }

    /**
     * Set The Carrier Account name
     *
     * @param mixed $carrierAccount
     *
     * @return void
     */
    public function setCarrierAccount($carrierAccount)
    {
        $this->carrierAccount = $carrierAccount;
    }

    /**
     * Get The Delivery Service name
     *
     * @return string
     */
    public function serviceName()
    {
        return $this->serviceName;
    }

    /**
     * Set The Delivery Service name
     *
     * @param string $serviceName
     *
     * @return void
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * Get The Carrier and Service name
     *
     * @return string
     */
    public function fullServiceName()
    {
        return $this->fullServiceName;
    }

    /**
     * Set The Carrier and Service name
     *
     * @param string $fullServiceName
     *
     * @return void
     */
    public function setFullServiceName($fullServiceName)
    {
        $this->fullServiceName = $fullServiceName;
    }

    /**
     * Get Tracking reference from Carrier
     *
     * @return string
     */
    public function trackingReference()
    {
        return $this->trackingReference;
    }

    /**
     * @param mixed $trackingReference
     */
    public function setTrackingReference($trackingReference)
    {
        $this->trackingReference = $trackingReference;
    }

    /**
     * Get Consolidation reference from Carrier (could be same as the Tracking reference)
     *
     * @return string
     */
    public function consolidationReference()
    {
        return $this->consolidationReference;
    }

    /**
     * Set Consolidation reference from Carrier (could be same as the Tracking reference)
     *
     * @param string $consolidationReference
     *
     * @return void
     */
    public function setConsolidationReference($consolidationReference)
    {
        $this->consolidationReference = $consolidationReference;
    }

    /**
     * Get Country object containing two character ISO 3166-1 clearance country code, e.g., NL, FR, DE, ES and full name
     *
     * @return object
     */
    public function clearanceCountry()
    {
        return $this->clearanceCountry;
    }

    /**
     * Set Country object containing two character ISO 3166-1 clearance country code, e.g., NL, FR, DE, ES and full name
     *
     * @param object $clearanceCountry
     *
     * @return void
     */
    public function setClearanceCountry($clearanceCountry)
    {
        $this->clearanceCountry = $clearanceCountry;
    }

    /**
     * Get The full name of the clearance location
     *
     * @return string
     */
    public function clearanceLocationName()
    {
        return $this->clearanceLocationName;
    }

    /**
     * Set The full name of the clearance location
     *
     * @param string $clearanceLocationName
     *
     * @return void
     */
    public function setClearanceLocationName($clearanceLocationName)
    {
        $this->clearanceLocationName = $clearanceLocationName;
    }

    /**
     * Get Maximum number of Parcels allowed in Container. null if unlimited.
     *
     * @return integer|null
     */
    public function maxParcels()
    {
        return $this->maxParcels;
    }

    /**
     * Set Maximum number of Parcels allowed in Container. null if unlimited.
     *
     * @param integer|null $maxParcels
     *
     * @return void
     */
    public function setMaxParcels($maxParcels)
    {
        $this->maxParcels = $maxParcels;
    }

    /**
     * Get Maximum number of Items allowed in Container across all Parcels. null if unlimited.
     *
     * @return integer
     */
    public function maxItems()
    {
        return $this->maxItems;
    }

    /**
     * Set Maximum number of Items allowed in Container across all Parcels. null if unlimited.
     *
     * @param integer|null $maxItems
     *
     * @return void
     */
    public function setMaxItems($maxItems)
    {
        $this->maxItems = $maxItems;
    }

    /**
     * Get Maximum weight allowed of Parcels in Container in grammes. null if unlimited.
     *
     * @return integer|null
     */
    public function maxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * Set Maximum weight allowed of Parcels in Container in grammes. null if unlimited.
     *
     * @param mixed $maxWeight
     *
     * @return void
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    /**
     * Get Maximum value of contents allowed in Container in pence / cents. null if unlimited.
     *
     * @return integer|null
     */
    public function maxValue()
    {
        return $this->maxValue;
    }

    /**
     * Set Maximum value of contents allowed in Container in pence / cents. null if unlimited.
     *
     * @param integer|null $maxValue
     *
     * @return null
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }

    /**
     * Get ISO 4217 3-character currency code e.g., GBP, EUR, USD.
     *
     * @return string
     */
    public function valueCurrency()
    {
        return $this->valueCurrency;
    }

    /**
     * Set ISO 4217 3-character currency code e.g., GBP, EUR, USD.
     *
     * @param string $valueCurrency
     *
     * @return void
     */
    public function setValueCurrency($valueCurrency)
    {
        $this->valueCurrency = $valueCurrency;
    }

    /**
     * Get Current number of Parcels in Container.
     *
     * @return integer
     */
    public function parcels()
    {
        return $this->parcels;
    }

    /**
     * Set Current number of Parcels in Container.
     *
     * @param integer $parcels
     *
     * @return void
     */
    public function setParcels($parcels)
    {
        $this->parcels = $parcels;
    }

    /**
     * Get Current number of Items in Container across all Parcels.
     *
     * @return integer
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Set Current number of Items in Container across all Parcels.
     *
     * @param integer $items
     *
     * @return void
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Get Current weight of Parcels in Container in grammes.
     *
     * @return integer
     */
    public function weight()
    {
        return $this->weight;
    }

    /**
     * Set Current weight of Parcels in Container in grammes.
     *
     * @param integer $weight
     *
     * @return void
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get Current value of contents in Container in pence / cents.
     *
     * @return string
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Set Current value of contents in Container in pence / cents.
     *
     * @param integer $value
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get Current status of Container: Open or Closed
     *
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Set Current status of Container: Open or Closed
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}