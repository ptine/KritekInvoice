<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceDetail
 *
 * @ORM\Table(name="invoice_detail")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceDetailRepository")
 */
class InvoiceDetail
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
     * @var int
     *     
     * @ORM\ManyToOne(targetEntity="InvoiceHeader")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    private $InvoiceId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $Description;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $Quantity = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=12, scale=2)
     */
    private $Amount;

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="decimal", precision=12, scale=2)
     */
    private $Vat;

    /**
     * @var string
     *
     * @ORM\Column(name="total_amount", type="decimal", precision=12, scale=2)
     */
    private $TotalAmount;


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
     * Set InvoiceId
     *
     * @param integer $invoiceId
     * @return InvoiceDetail
     */
    public function setInvoiceId($invoiceId)
    {
        $this->InvoiceId = $invoiceId;

        return $this;
    }

    /**
     * Get InvoiceId
     *
     * @return integer 
     */
    public function getInvoiceId()
    {
        return $this->InvoiceId;
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return InvoiceDetail
     */
    public function setDescription($description)
    {
        $this->Description = $description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set Quantity
     *
     * @param integer $quantity
     * @return InvoiceDetail
     */
    public function setQuantity($quantity)
    {
        $this->Quantity = $quantity;

        return $this;
    }

    /**
     * Get Quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * Set Amount
     *
     * @param string $amount
     * @return InvoiceDetail
     */
    public function setAmount($amount)
    {
        $this->Amount = $amount;

        return $this;
    }

    /**
     * Get Amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * Set Vat
     *
     * @param string $vat
     * @return InvoiceDetail
     */
    public function setVat($vat)
    {
        $this->Vat = $vat;

        return $this;
    }

    /**
     * Get Vat
     *
     * @return string 
     */
    public function getVat()
    {
        return $this->Vat;
    }

    /**
     * Set TotalAmount
     *
     * @param string $totalAmount
     * @return InvoiceDetail
     */
    public function setTotalAmount($totalAmount)
    {
        $this->TotalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get TotalAmount
     *
     * @return string 
     */
    public function getTotalAmount()
    {
        return $this->TotalAmount;
    }
}
