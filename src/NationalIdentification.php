<?php


namespace Vexel\NotabeneLib;


class NationalIdentification
{
    private array $nationalIdentifierTypes=[
        'ARNU', //Alien registration number - Number assigned by a government agency to identify foreign nationals.
'CCPT', //Passport number - Number assigned by a passport authority.
'RAID', //Registration authority identifier - Identifier of a legal entity as maintained by a registration authority.
'DRLC', //Driver license number - Number assigned to a driver's license.
'FIIN', //Foreign investment identity number - Number assigned to a foreign investor (other than the alien number).
'TXID', //Tax identification number - Number assigned by a tax authority to an entity.
'SOCS', //Social security number - Number assigned by a social security agency.
'IDCD', //Identity card number - Number assigned by a national authority to an identity card.
'LEIX', //Legal Entity Identifier - Legal Entity Identifier (LEI) assigned in accordance with ISO 17442 11 .
'MISC', //Unspecified - A national identifier which may be known but which cannot otherwise be categorized or the category of which the sender is unable to determine.
    ];
    private string $nationalIdentifier;
    private string $nationalIdentifierType;
    private string $countryOfIssue;
    private string $registrationAuthority;

}
