<?php


namespace Vexel\NotabeneLib;


class Pii
{
    private array $originator;
    private array $accountNumber; //array of strings
    private array $beneficiary;
    private array $originatingVASP;
    private array $beneficiaryVASP;
    private array $transferPath;
    private array $payloadMetadata;





    public function __construct()
    {
        $this->originator['originatorPersons']['naturalPerson'] = new NaturalPerson();
        $this->originator['originatorPersons']['legalPerson'] = new LegalPerson();
        $this->beneficiary['beneficiaryPersons']['naturalPerson'] = new NaturalPerson();
        $this->beneficiary['beneficiaryPersons']['legalPerson'] = new LegalPerson();
        $this->originatingVASP['originatingVASP']['naturalPerson'] = new NaturalPerson();
        $this->originatingVASP['originatingVASP']['legalPerson'] = new LegalPerson();
        $this->beneficiaryVASP['beneficiaryVASP']['naturalPerson'] = new NaturalPerson();
        $this->beneficiaryVASP['beneficiaryVASP']['legalPerson'] = new LegalPerson();

        $this->transferPath['transferPath']['intermediaryVASP']['naturalPerson']=new NaturalPerson();
        $this->transferPath['transferPath']['intermediaryVASP']['legalPerson']=new LegalPerson();
        $this->transferPath['transferPath']['sequence']='';

        $this->payloadMetadata['transliterationMethod'][]='';
    }
}
