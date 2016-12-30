<?php

namespace montserrat\Http\Controllers;

use Illuminate\Http\Request;
use montserrat\Http\Requests;
use montserrat\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }


public function autocomplete(){
    $term = Input::get('term');
    $results = array();
    $queries = \montserrat\Contact::orderBy('sort_name')->where('display_name','LIKE','%'.$term.'%')->whereDeletedAt(NULL)->take(20)->get();
    if (($queries->count() == 0)) {
        $results[0]='Add new contact (No results)';
    }
    foreach ($queries as $query) {
        $results[] = [ 'id' => $query->id, 'value' => $query->full_name_with_city ];
    }
    return Response::json($results);
}

public function getuser() {
    if (empty(Input::get('response'))) {
        $id = 0;
    } else {
        $id = Input::get('response');
    }
    // TODO: check contact_type field and redirect to appropriate parish, diocese, person, etc.
    if ($id==0) {
        return redirect()->action('PersonsController@create');
    } else {
        $contact = \montserrat\Contact::findOrFail($id);
        if ($contact->contact_type == CONTACT_TYPE_INDIVIDUAL) {
            return redirect()->action('PersonsController@show',$id);
        }
        switch ($contact->subcontact_type) {
            case CONTACT_TYPE_PARISH : return redirect()->action('ParishesController@show',$id); break;
            case CONTACT_TYPE_DIOCESE: return redirect()->action('DiocesesController@show',$id); break;
            case CONTACT_TYPE_VENDOR : return redirect()->action('VendorsController@show',$id); break;
            default : return redirect()->action('OrganizationsController@show',$id);
            
        }
    }
}
public function results(Request $request) {
        $this->validate($request, [
            'email_home' => 'email',
            'email_work' => 'email',
            'email_other' => 'email',
            'birth_date' => 'date',            
            'deceased_date' => 'date',            
            'url_main' => 'url',
            'url_work' => 'url',
            'url_facebook' => 'url|regex:/facebook\.com\/.+/i',
            'url_google' => 'url|regex:/plus\.google\.com\/.+/i',
            'url_twitter' => 'url|regex:/twitter\.com\/.+/i',
            'url_instagram' => 'url|regex:/instagram\.com\/.+/i',
            'url_linkedin' => 'url|regex:/linkedin\.com\/.+/i',
            'parish_id' => 'integer|min:0',
            'gender_id' => 'integer|min:0',
            'ethnicity_id' => 'integer|min:0',
            'religion_id' => 'integer|min:0',
            'contact_type' => 'integer|min:0',
            'subcontact_type' => 'integer|min:0',
            'occupation_id' => 'integer|min:0',
            
        ]);

    if (!empty($request)) {
            $persons = \montserrat\Contact::filtered($request)->orderBy('sort_name')->with('attachments')->paginate(100);
            $persons->appends(Input::except('page'));
            
    }
    return view('search.results',  compact('persons'));
    
}

public function search()
    {
        $person = new \montserrat\Contact;
        $parishes = \montserrat\Contact::whereSubcontactType(CONTACT_TYPE_PARISH)->orderBy('organization_name', 'asc')->with('address_primary.state','diocese.contact_a')->get();
        $parish_list[0]='N/A';
        $contact_types = \montserrat\ContactType::whereIsReserved(TRUE)->pluck('label','id');
        $contact_types->prepend('N/A',0); 
        $subcontact_types = \montserrat\ContactType::whereIsReserved(FALSE)->whereIsActive(TRUE)->pluck('label','id');
        $subcontact_types->prepend('N/A',0); 
        // while probably not the most efficient way of doing this it gets me the result
        foreach($parishes as $parish) {
            $parish_list[$parish->id] = $parish->organization_name.' ('.$parish->address_primary_city.') - '.$parish->diocese_name;
        }

        $countries = \montserrat\Country::orderBy('iso_code')->pluck('iso_code','id');
        $countries->prepend('N/A',0); 

        $ethnicities = \montserrat\Ethnicity::orderBy('ethnicity')->pluck('ethnicity','id');
        $ethnicities->prepend('N/A',0); 

        $genders = \montserrat\Gender::orderBy('name')->pluck('name','id');
        $genders ->prepend('N/A',0); 
        $groups = \montserrat\Group::orderBy('name')->pluck('name','id');
        $groups->prepend('N/A',0); 

        $languages = \montserrat\Language::orderBy('label')->whereIsActive(1)->pluck('label','id');
        $languages->prepend('N/A',0);
        $referrals = \montserrat\Referral::orderBy('name')->whereIsActive(1)->pluck('name','id');
        $referrals->prepend('N/A',0);
        $prefixes= \montserrat\Prefix::orderBy('name')->pluck('name','id');
        $prefixes->prepend('N/A',0); 
        $religions = \montserrat\Religion::orderBy('name')->whereIsActive(1)->pluck('name','id');
        $religions->prepend('N/A',0);
        $states = \montserrat\StateProvince::orderBy('name')->whereCountryId(1228)->pluck('name','id');
        $states->prepend('N/A',0); 
        $suffixes = \montserrat\Suffix::orderBy('name')->pluck('name','id');
        $suffixes->prepend('N/A',0); 
        $occupations = \montserrat\Ppd_occupation::orderBy('name')->pluck('name','id');
        $occupations->prepend('N/A',0); 
        
        //create defaults array for easier pre-populating of default values on edit/update blade
        // initialize defaults to avoid undefined index errors
        $defaults = array();
        $defaults['Home']['street_address']='';
        $defaults['Home']['supplemental_address_1']='';
        $defaults['Home']['city']='';
        $defaults['Home']['state_province_id']='';
        $defaults['Home']['postal_code']='';
        $defaults['Home']['country_id']='';
        $defaults['Home']['Phone']='';
        $defaults['Home']['Mobile']='';
        $defaults['Home']['Fax']='';
        $defaults['Home']['email']='';
        
        $defaults['Work']['street_address']='';
        $defaults['Work']['supplemental_address_1']='';
        $defaults['Work']['city']='';
        $defaults['Work']['state_province_id']='';
        $defaults['Work']['postal_code']='';
        $defaults['Work']['country_id']='';
        $defaults['Work']['Phone']='';
        $defaults['Work']['Mobile']='';
        $defaults['Work']['Fax']='';
        $defaults['Work']['email']='';
        
        $defaults['Other']['street_address']='';
        $defaults['Other']['supplemental_address_1']='';
        $defaults['Other']['city']='';
        $defaults['Other']['state_province_id']='';
        $defaults['Other']['postal_code']='';
        $defaults['Other']['country_id']='';
        $defaults['Other']['Phone']='';
        $defaults['Other']['Mobile']='';
        $defaults['Other']['Fax']='';
        $defaults['Other']['email']='';
        
        $defaults['Main']['url']='';
        $defaults['Work']['url']='';
        $defaults['Facebook']['url']='';
        $defaults['Google']['url']='';
        $defaults['Instagram']['url']='';
        $defaults['LinkedIn']['url']='';
        $defaults['Twitter']['url']='';
        
        foreach($person->addresses as $address) {
            $defaults[$address->location->name]['street_address'] = $address->street_address;
            $defaults[$address->location->name]['supplemental_address_1'] = $address->supplemental_address_1;
            $defaults[$address->location->name]['city'] = $address->city;
            $defaults[$address->location->name]['state_province_id'] = $address->state_province_id;
            $defaults[$address->location->name]['postal_code'] = $address->postal_code;
            $defaults[$address->location->name]['country_id'] = $address->country_id;
        }
        
        foreach($person->phones as $phone) {
            $defaults[$phone->location->name][$phone->phone_type] = $phone->phone;
        }
        
        foreach($person->emails as $email) {
            $defaults[$email->location->name]['email'] = $email->email;
        }
        
        foreach($person->websites as $website) {
            $defaults[$website->website_type]['url'] = $website->url;
        }
        //dd($person);

        return view('search.search',compact('prefixes','suffixes','person','parish_list','ethnicities','states','countries','genders','languages','defaults','religions','occupations','contact_types','subcontact_types','groups','referrals'));
    
    }

}


