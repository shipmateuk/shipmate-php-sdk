<?php

namespace Shipmate\Responses;

class ContainerShipmentResponse
{
    protected $id;
    protected $reference;
    protected $trackingReference;
    protected $parcels;
    protected $items;
    protected $weight;
    protected $value;

    /**
     * Get the Container ID
     *
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Set the container ID
     *
     * @param string $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the reference of the container
     *
     * @return string
     */
    public function reference()
    {
        return $this->reference;
    }

    /**
     * Set the reference of the container
     *
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get tracking reference of a container
     *
     * @return string
     */
    public function trackingReference()
    {
        return $this->trackingReference;
    }

    /**
     * Set tracking reference of a container
     *
     * @param string $trackingReference
     *
     * @return void
     */
    public function setTrackingReference($trackingReference)
    {
        $this->trackingReference = $trackingReference;
    }

    /**
     * Get the total number of parcels in a container
     *
     * @return integer
     */
    public function parcels()
    {
        return $this->parcels;
    }

    /**
     * Set the total number of parcels in a container
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
     * Get the total number of items in a container
     *
     * @return integer
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Set the total number of items in a container
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
     * Get total weight of a container
     *
     * @return integer
     */
    public function weight()
    {
        return $this->weight;
    }

    /**
     * Set total weight of a container
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
     * Get total value of container
     *
     * @return integer
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Set total value of container
     *
     * @param integer $value
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }



}