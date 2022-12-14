<?php
namespace App;

use DiDom\Document;

class HtmlDocument
{
    protected string $trackingNumber;
    protected string $poNumber;
    protected string $scheduledDate;
    protected string $customer;
    protected string $trade;
    protected string $nte;
    protected string $storeID;
    protected string $address;
    protected string $phoneNumber;
    protected Document $document;

    public function __construct(string $filePath)
    {
        $this->document = new Document($filePath, true);
    }

    public function setTrackingNumber(): void
    {
        if ($this->document->has('#wo_number')) {
            $this->trackingNumber = $this->document->find('#wo_number')[0]->text();
        }
    }

    public function setPoNumber(): void
    {
        if ($this->document->has('#po_number')) {
            $this->poNumber = $this->document->find('#po_number')[0]->text();
        }
    }

    public function setScheduledDate(): void
    {
        if ($this->document->has('#scheduled_date')) {
            $this->scheduledDate 
                = $this->document->find('#scheduled_date')[0]->text();
        }
    }

    public function setCustomer(): void
    {
        if ($this->document->has('#customer')) {
            $this->customer = $this->document->find('#customer')[0]->text();
        }
    }

    public function setTrade(): void
    {
        if ($this->document->has('#trade')) {
            $this->trade = $this->document->find('#trade')[0]->text();
        }
    }

    public function setNte(): void
    {
        if ($this->document->has('#nte')) {
            $this->nte = $this->document->find('#nte')[0]->text();
        }
    }

    public function setStoreId(): void
    {
        if ($this->document->has('#location_name')) {
            $this->storeID = $this->document->find('#location_name')[0]->text();
        }
    }

    public function setAddress(): void
    {
        if ($this->document->has('#location_address')) {
            $this->address = $this->document->find('#location_address')[0]->text();
        }
    }

    public function setPhoneNumber(): void
    {
        if ($this->document->has('#location_phone')) {
            $this->phoneNumber = $this->document->find('#location_phone')[0]->text();
        }
    }

    public function getTrackingNumber(): string
    {
        $this->setTrackingNumber();
        return $this->trackingNumber;
    }

    public function getPoNumber(): string
    {
        $this->setPoNumber();
        return $this->poNumber;
    }

    public function getScheduledDate(): string
    {
        $this->setScheduledDate();
        return $this->scheduledDate;
    }

    public function getCustomer(): string
    {
        $this->setCustomer();
        return $this->customer;
    }

    public function getTrade(): string
    {
        $this->setTrade();
        return $this->trade;
    }

    public function getNte(): string
    {
        $this->setNte();
        return $this->nte;
    }

    public function getStoreID(): string
    {
        $this->setStoreId();
        return $this->storeID;
    }

    public function getAddress(): string
    {
        $this->setAddress();
        return $this->address;
    }

    public function getPhoneNumber(): string
    {
        $this->setPhoneNumber();
        return $this->phoneNumber;
    }
}
?>
