<?php


namespace Vexel\NotabeneLib;



class NaturalPerson
{
    private array $name;
    private array $localNameIdentifier;
    private array $phoneticNameIdentifier;
    private array $geographicAddress;
    private array $nationalIdentification;
    private string $customerIdentification;
    private array $dateAndPlaceOfBirth;
    private string $countryOfResidence;
    private array $legalPerson;


    public function __construct()
    {
        $this->name[] = new NameIdentifier();
        $this->localNameIdentifier[] = new NameIdentifier();
        $this->phoneticNameIdentifier[] = new NameIdentifier();
        $this->geographicAddress[] = new GeographicAddress();
        $this->nationalIdentification[] = new NationalIdentification();
        $this->dateAndPlaceOfBirth[] = new DateAndPlaceOfBirth();
        $this->legalPerson[] = new LegalPerson();
    }

}
