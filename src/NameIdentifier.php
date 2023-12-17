<?php


namespace Vexel\NotabeneLib;


class NameIdentifier
{
    private $nameIdentifierTypes = [
        'ALIA', //Alias name - A name other than the legal name by which a natural person is also known.
'BIRT', //Name at birth - The name given to a natural person at birth.
'MAID', //Maiden name - The original name of a natural person who has changed their name after marriage.
'LEGL', //Legal name - The name that identifies a natural person for legal, official or administrative purposes.
'MISC', //Unspecified - A name by which a natural person may be known but which cannot otherwise be categorized or the category of which the sender is unable to determine.
    ];

    private string $primaryIdentifier;
    private string $secondaryIdentifier;
    private string $nameIdentifierType;
    /**
     * NameIdentifier constructor.
     */
    public function __construct()
    {
    }
}
