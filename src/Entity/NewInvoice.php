<?php


namespace App\Entity;

class NewInvoice
{
    public $invoiceNumber;

    public $status;

    public $companyName;

    public $companyAddress;

    public $companyEmail;

    public $companyPhone;

    public $billedToName;

    public $billedToAddress;

    public $billedToEmail;

    public $billedToPhone;

    public $invoiceNo;

    public $invoiceDate;

    public $orderNo;

    public $invoiceItems;

    public $subTotal;

    public $discount;

    public $shippingCharge;

    public $tax;

    public $total;

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber($invoiceNumber): void
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    public function setCompanyAddress($companyAddress): void
    {
        $this->companyAddress = $companyAddress;
    }

    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    public function setCompanyEmail($companyEmail): void
    {
        $this->companyEmail = $companyEmail;
    }

    public function getCompanyPhone()
    {
        return $this->companyPhone;
    }

    public function setCompanyPhone($companyPhone): void
    {
        $this->companyPhone = $companyPhone;
    }

    public function getBilledToName()
    {
        return $this->billedToName;
    }

    public function setBilledToName($billedToName): void
    {
        $this->billedToName = $billedToName;
    }

    public function getBilledToAddress()
    {
        return $this->billedToAddress;
    }

    public function setBilledToAddress($billedToAddress): void
    {
        $this->billedToAddress = $billedToAddress;
    }

    public function getBilledToEmail()
    {
        return $this->billedToEmail;
    }

    public function setBilledToEmail($billedToEmail): void
    {
        $this->billedToEmail = $billedToEmail;
    }

    public function getBilledToPhone()
    {
        return $this->billedToPhone;
    }

    public function setBilledToPhone($billedToPhone): void
    {
        $this->billedToPhone = $billedToPhone;
    }

    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    public function setInvoiceNo($invoiceNo): void
    {
        $this->invoiceNo = $invoiceNo;
    }

    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate($invoiceDate): void
    {
        $this->invoiceDate = $invoiceDate;
    }

    public function getOrderNo()
    {
        return $this->orderNo;
    }

    public function setOrderNo($orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    public function getInvoiceItems()
    {
        return $this->invoiceItems;
    }

    public function setInvoiceItems($invoiceItems): void
    {
        $this->invoiceItems = $invoiceItems;
    }

    public function getSubTotal()
    {
        return $this->subTotal;
    }

    public function setSubTotal($subTotal): void
    {
        $this->subTotal = $subTotal;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount): void
    {
        $this->discount = $discount;
    }

    public function getShippingCharge()
    {
        return $this->shippingCharge;
    }

    public function setShippingCharge($shippingCharge): void
    {
        $this->shippingCharge = $shippingCharge;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function setTax($tax): void
    {
        $this->tax = $tax;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): void
    {
        $this->total = $total;
    }
}

