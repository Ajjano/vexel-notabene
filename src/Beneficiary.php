<?php


namespace Vexel\NotabeneLib;



class Beneficiary
{
    private array $beneficiaryPersons;

    public function __construct()
    {
        $this->beneficiaryPersons['naturalPerson'] = new NaturalPerson();
        $this->beneficiaryPersons['legalPerson'] = new LegalPerson();
    }

}
