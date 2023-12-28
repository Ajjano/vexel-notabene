<?php


namespace Vexel\NotabeneLib\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TfSimpleVaspsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //List of VASPInfoSimple
            'vasps'=>[
                //Decentralized Identifier
                'did'=>$this['vasps']['did'],
                'name'=>$this['vasps']['name'],
                'website'=>$this['vasps']['website'],
                'logo'=>$this['vasps']['logo'],
                'incorporationCountry'=>$this['vasps']['incorporationCountry'],
                'documents'=>$this['vasps']['documents'],
                'hasAdmin'=>$this['vasps']['hasAdmin'],
                'isNotifiable'=>$this['vasps']['isNotifiable'],
                'isActiveSender'=>$this['vasps']['isActiveSender'],
                'isActiveReceiver'=>$this['vasps']['isActiveReceiver'],
                'issuers'=>$this['vasps']['issuers'],
            ],
            'pagination'=>[
                //Page number
                'page'=>$this['pagination']['page'],
                //Records per page
                'per_page'=>$this['pagination']['per_page'],
                //Field to order by
                'order'=>$this['pagination']['order'],
                'total'=>$this['pagination']['total'],
            ]
        ];
    }
}
