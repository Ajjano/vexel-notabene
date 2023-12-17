<?php


namespace Vexel\NotabeneLib;


class LegalPerson
{
    private array $name;
    private array $geographicAddress;
    private string $customerNumber;
    private array $nationalIdentification;
    private string $countryOfRegistration;

    /**
     * LegalPerson constructor.
     */
    public function __construct()
    {
        $this->name['nameIdentifier'] = new NameIdentifier();
        $this->name['localNameIdentifier'] = new NameIdentifier();
        $this->name['phoneticNameIdentifier'] = new NameIdentifier();

        $this->geographicAddress[] = new GeographicAddress();
        $this->nationalIdentification[] = new NationalIdentification();
    }
}
