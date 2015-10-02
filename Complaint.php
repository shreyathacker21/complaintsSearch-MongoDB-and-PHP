<?php
/**
 * Created by PhpStorm.
 * User: randyjp
 * Date: 4/29/15
 * Time: 9:38 PM
 */

class Complaint {

    private $complaintId;
    private $product;
    private $subProduct;
    private $issue;
    private $subIssue;
    private $state;
    private $zipCode;
    private $submitted;
    private $dateReceived;
    private $dateSent;
    private $company;
    private $companyResponse;
    private $timelyResponse;
    private $disputed;
    private $image;
    private $comments;

    public function  __construct($complaintId,$product,$subProduct,$issue,$subIssue,$state,$zipCode,$submitted,$dateReceived,
                                 $dateSent,$company,$companyResponse,$timelyResponse,$disputed,$image,$comments)
    {

        $this->setComplaintId($complaintId);
        $this->setProduct($product);
        $this->setSubProduct($subProduct);
        $this->setIssued($issue);
        $this->setSubIssue($subIssue);
        $this->setState($state);
        $this->setZipCode($zipCode);
        $this->setSubmitted($submitted);
        $this->setDateReceived($dateReceived);
        $this->setDateSent($dateSent);
        $this->setCompany($company);
        $this->setImage($image);
        $this->setCompanyResponse($companyResponse);
        $this->setTimelyResponse($timelyResponse);
        $this->setDisputed($disputed);
        $this->setComments($comments);
    }

    //setters
    public function  setComplaintId($id)
    {
        $this->complaintId = $id;
    }

    public function  setProduct($product)
    {
        $this->product = $product;
    }

    public function  setSubProduct($subProduct)
    {
        $this->subProduct = $subProduct;
    }

    public function  setIssued($issue)
    {
        $this->issue = $issue;
    }

    public function  setSubIssue($subIssue)
    {
        $this->subIssue = $subIssue;
    }

    public function  setState($state)
    {
        $this->state = $state;
    }

    public function  setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function  setSubmitted($submitted)
    {
        $this->submitted = $submitted;
    }

    public function  setDateReceived($dateReceived)
    {
        $this->dateReceived = $dateReceived;
    }

    public function  setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;
    }

    public function  setCompany($company)
    {
        $this->company = $company;
    }

    public function  setCompanyResponse($companyResponse)
    {
        $this->companyResponse = $companyResponse;
    }

    public function  setTimelyResponse($timelyResponse)
    {
        $this->timelyResponse = $timelyResponse;
    }

    public function  setDisputed($disputed)
    {
        $this->disputed = $disputed;
    }

    public function  setImage($image)
    {
        $this->image = $image;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    //getters
    public function  getComplaintId()
    {
        return $this->complaintId;
    }

    public function  getProduct()
    {
        return $this->product;
    }

    public function  getSubProduct()
    {
        return $this->subProduct;
    }

    public function  getIssued()
    {
        return $this->issue;
    }

    public function  getSubIssue()
    {
        return $this->subIssue;
    }

    public function  getState()
    {
        return $this->state;
    }

    public function  getZipCode()
    {
        return $this->zipCode;
    }

    public function  getSubmitted()
    {
        return $this->submitted;
    }

    public function  getDateReceived()
    {
        return $this->dateReceived;
    }

    public function  getDateSent()
    {
        return $this->dateSent;
    }

    public function  getCompany()
    {
        return $this->company;
    }

    public function  getCompanyResponse()
    {
        return $this->companyResponse;
    }

    public function  getTimelyResponse()
    {
        return $this->timelyResponse;
    }

    public function  getDisputed()
    {
        return $this->disputed;
    }

    public function  getImage()
    {
        return $this->image;
    }

    public function getComments()
    {
        return $this->comments;
    }
}