<?php


namespace Vexel\NotabeneLib\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TfSimpleVASPsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'q' => 'string',

            //filter on email domain
            'emailDomain' => 'string',

            //filter on chainalysis name
            'chainalysisName' => 'string',

            //filter on hasAdmin true or false
            'hasAdmin' => 'boolean',

            //filter by badge
            'badge' => 'string',

            //filter by jurisdictions
            'jurisdictions' => 'string',

            //csv of fields to return
            'fields' => 'string',

            //page number
            'page' => 'integer',

            //records per page
            'per_page' => 'integer',

            //field to order by
            'order' => 'string',

            //return all records
            'all' => 'boolean',

            //Choose the way gateway VASPs and non-gateway VASPs are returned. By default, exclude_subsidiaries
            'listingType' => 'string',

            //include vasps that have not been internally checked
            'includeUncheckedVASPs' => 'boolean',

            //include only those vasps that are sending transactions
            'includeActiveSendersOnly' => 'boolean',

            //include only those vasps that are receiving transactions
            'includeActiveReceiversOnly' => 'boolean',

            //include only those vasps matching the specified regulatory status
            'regulatoryStatus' => 'string',

            //asset symbol, provide when filtering by wallet
            'asset' => 'string',

            //include reviewed vasps for specified did
            'reviewedByVaspDID' => 'string|regex:/^did:[a-zA-Z0-9]*:.*$/i',

            //include jurisdiction status information
            'jurisdictionStatus' => 'boolean',

            //include reviewed vasps containing specified value
            'reviewValue' => 'string',
        ];
    }
}
