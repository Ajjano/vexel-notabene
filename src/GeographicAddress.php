<?php


namespace Vexel\NotabeneLib;


class GeographicAddress
{
    private array $addressTypes = [
        'HOME', //Residential - Address is the home address.
'BIZZ', //Business - Address is the business address.
'GEOG', //Geographic - Address is the unspecified physical (geographical) address suitable for identification of the natural or legal person.
    ];


    private string $addressType;
    private string $department;
    private string $subDepartment;
    private string $streetName;
    private string $buildingNumber;
    private string $buildingName;
    private string $floor;
    private string $postBox;
    private string $room;
    private string $postCode;
    private string $townName;
    private string $townLocationName;
    private string $districtName;
    private string $countrySubDivision;
    private array $addressLine;
    private string $country;

}
