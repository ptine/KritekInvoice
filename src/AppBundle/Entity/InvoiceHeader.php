<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * InvoiceHeader
 *
 * @ORM\Table(name="invoice_header")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceHeaderRepository")
 */
class InvoiceHeader
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoice_date", type="date")
     */
    private $InvoiceDate;

    /**
     * @var int
     *
     * @ORM\Column(name="invoice_number", type="integer")
     */
    private $InvoiceNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="customer_id", type="integer")
     */
    private $CustomerId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set InvoiceDate
     *
     * @param \DateTime $invoiceDate
     * @return InvoiceHeader
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->InvoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Get InvoiceDate
     *
     * @return \DateTime 
     */
    public function getInvoiceDate()
    {
        return $this->InvoiceDate;
    }

    /**
     * Set InvoiceNumber
     *
     * @param integer $invoiceNumber
     * @return InvoiceHeader
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->InvoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * Get InvoiceNumber
     *
     * @return integer 
     */
    public function getInvoiceNumber()
    {
        return $this->InvoiceNumber;
    }

    /**
     * Set CustomerId
     *
     * @param integer $customerId
     * @return InvoiceHeader
     */
    public function setCustomerId($customerId)
    {
        $this->CustomerId = $customerId;

        return $this;
    }

    /**
     * Get CustomerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->CustomerId;
    }

    public function __toString() 
    {
        try {
           return (string) $this->getInvoiceNumber(); // If it is possible, return a string value from object.
        } catch (Exception $e) {
           return "";//get_class($this).'@'.spl_object_hash($this); // If it is not possible, return a preset string to identify instance of object, e.g.
        }
    }

    /**
    * @ORM\OneToMany(targetEntity="InvoiceDetail", mappedBy="InvoiceId", cascade={"persist","remove"}, orphanRemoval=true)
    */
    private $invoiceRows;
    
    public function __construct()
    {
        $this->invoiceRows = new ArrayCollection();
    }
    
    public function getInvoiceRows()
    {
        return $this->invoiceRows;
    }

    public function addInvoiceRow(InvoiceDetail $row)
    {
        if ($this->invoiceRows->contains($row)) {
            return;
        }

        
        $this->invoiceRows->add($row);

    }

    
    public function removeRow(BlogPost $row) {
        if (!$this->invoiceRows->contains($row)) {
                    return;
        }
        $this->invoiceRows->removeElement($row);
    }

    
}
