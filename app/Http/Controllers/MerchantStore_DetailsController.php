<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreDetail;
use App\Models\CoverImage;
use App\Models\BannerImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Validator;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Cpanel;
use App\Models\shippinginfo;
use Illuminate\Validation\Rule;
use App\Models\Domaindetail;
use Redirect;

class MerchantStore_DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function domainname(Request $request)
    {
            
        	 
            $validatedData = $request->validate([
                 'domain_name' => ['required','unique:store_details,domain_name']
            ]);
    
            $store_detail_id = StoreDetail::select('id')
                                 ->where('user_id', Auth::id())
                                  ->get()->first();
            $domain_type = $request->domain_type; 
            
            if($domain_type == "sub_domain" || $domain_type == "buy_new_domain" ){
              
                $validatedData = $request->validate([
                'domain_name' => ['not_regex:/[.]/','unique:store_details,domain_name']
                ]);
            };

            switch ($domain_type) {
                case 'buy_new_domain':
                    $domainData = self::domainCreate($request);
                    $result =  json_decode($domainData);
                    if($result->intReturnCode == 0){
                        //return view('merchent.domain_name',[$message=>"domain not create due to Insufficient Funds"]);
                        return Redirect::back()->withErrors(['msg'=>'Something went to wrong']);
                    } else if($result->intReturnCode == 19){
                        //return view('merchent.domain_name',[$message=>"domain not create due to Insufficient Funds"]);
                        return Redirect::back()->withErrors(['msg'=>'Something went to wrong']);
                    } else if($result->intReturnCode == 1) {
                        $request['domain_name'] = $request->domain_name.'.'.'za.co'; 
                        Domaindetail::create([
                            'domain_name' => $request->domain_name,
                            'registrant_id'=> $result['registrant_id'],
                            'createdate'=>$result['intCrDate'],
                            'expiredate'=>$result['intExDate'],
                            'store_detail_id'=>$store_detail_id->id
                        ]); 
                    }
                   
                break;
                case 'sub_domain':
                    $pieces = parse_url(config('custom.host_name')); //config('custom.host_name');
                    $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
                    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
                          $request['domain_name'] = $request->domain_name.'.'.$regs['domain']; 
                    }
                break;
                default:
            }     

        $data = StoreDetail::where('id',$store_detail_id->id)->update(array('domain_name' => $request->domain_name,'domain_type'=>$request->domain_type));
        return redirect('/store_details');
    }

    public function planid(Request $request)
    {
     $plan_id = $request->plan_id;
    
        if (Auth::check())
        {  
            $data = StoreDetail::create([
                'plan_id' => $plan_id,
                'user_id' => Auth::id(),
                'layout_id' => 1
            ]);
          
        return redirect('/domain_name');
        }
        else
        {
            return redirect('/register'); 
        }
    }

    public function store(Request $request)
    {
       
        
        $validatedData = $request->validate([
            'store_name' => ['required'],
            'store_logo' => ['image','mimes:jpeg,png,jpg,gif,svg']
        ]);
        
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        
       if($request->file('store_logo'))
       {
            $originName = $request->file('store_logo')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('store_logo')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('store_logo')->move(public_path('/uploads/storelogos/'), $fileName);
       }
        $data = StoreDetail::where('user_id',Auth::id())->where('id', $store_detail_id->id)->update([
            'store_name' => $request->store_name,
            'store_logo' => $fileName,
            'about_store' => $request->about_store,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'youtube_link' => $request->youtube_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link'=> $request->linkedin_link
        ]);    
        if($data)
        {
            return redirect('/selectlayout'); 
        }                          
        
    }

    public function layoutid(Request $request)
    {

        //get store detail id
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        
        //update layout id
        $data = StoreDetail::where('id', $store_detail_id->id)->update([
            'layout_id' => $request->layout_id,
            'color' => $request->color
        ]);

        //cover image insertion.    
            $coverimages = [
                'image1',
                'image2',
                'image3',
                'image4',
                'image5'
            ];

            foreach ($coverimages as $coverimage)
            {
            if($request->file($coverimage))
            {
                $originName = $request->file($coverimage)->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file($coverimage)->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
                $request->file($coverimage)->move(public_path('/uploads/sliders/'), $fileName);
                $insert = CoverImage::create([
                    'image' => $fileName,
                    'user_id' => Auth::id(),
                    'store_detail_id' => $store_detail_id->id
                ]);
            }
            }

            //Banner image insertion.    
            $bannerimages = [
                'image6',
                'image7',
                'image8',
                'image9',
                'image10'
            ];

            foreach ($bannerimages as $bannerimage)
            {
            if($request->file($bannerimage))
            {
                $originName = $request->file($bannerimage)->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file($bannerimage)->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
                $request->file($bannerimage)->move(public_path('/uploads/banners/'), $fileName);
                $insert = BannerImage::create([
                    'image' => $fileName,
                    'user_id' => Auth::id(),
                    'store_detail_id' => $store_detail_id->id
                ]);
            }
            }
       return redirect("/shipping_information");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function domainNamecheck(Request $request){
       
        if (StoreDetail::where('domain_name',  '=',$request->get('sld'))
                    ->orWhere('domain_name', 'LIKE', "%{$request->get('sld')}%")->exists()) {
            $data['strMessage']= "";
            $data['strMessage'] == "Domain Available";
            $data['from']='db';
            echo json_encode($data);
        } else {
           
            $url = "https://api-v3.domains.co.za/api/domain/domain/check";
            $post_data = $request->all();
            $post_data['key']='44e398e379d8194d4118c608cd344c67';
            return  self::SendCurl($url,$post_data);  
        }        
    }

    public  function domainCreate(Request $request)
    {   
        
      
        $user =   User::select('*')
                    ->where('id', Auth::id())
                    ->get()->first();

        $cp_detail =Cpanel::select('*')
                ->get()->first();

        $tld=['sld'=>$request->domain_name,"tld"=>'co.za'];
        $domain_tld = $tld['tld'];
           
    //   $url ="https://api-dev3.domains.co.za/";
        $url ="https://api-v3.domains.co.za/api/domain/domain/create";
        $post_data = $tld;
        $post_data['registrantName']= $user->first_name.' '.$user->last_name;
        $post_data['registrantEmail']= $user->email;
        $post_data['registrantAddress1']= 'location';
        $post_data['registrantCountry']= 'IN';
        $post_data['registrantCity']= 'surat';
        $post_data['registrantPostalCode']= '395044';
        $post_data['key']='44e398e379d8194d4118c608cd344c67';
        $post_data['registrantContactNumber']= "+91.".$user->mobile_number;
        $post_data['registrantProvince']= 'surat';
        $post_data['ns1'] =$cp_detail->ns1;
        $post_data['ns2'] =$cp_detail->ns2;
        return self::SendCurl($url,$post_data);  
       
    }
    
   

    public function SendCurl($url,$post_data,$headers=NULL, $auth=NULL){
      
        $ch = curl_init();
         
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if($auth){
            curl_setopt($ch, CURLOPT_USERPWD, $auth);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $html_response = curl_exec($ch);
        $curl_info = curl_getinfo($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($html_response, 0, $header_size);
        $body = substr($html_response, $header_size);

        curl_close($ch);
      
        return $body;   
      
    }

    

}
