<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\StoreDetail;
use App\Models\Page;
use App\Models\Cpanel;
use App\Models\PaymentOption;
use File;

class MerchantAccepting_PaymentsController extends Controller
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

    public function pagestore($store_detail_id)
    {
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
         $store_detail_id= $store_detail_id->id;
        $data = Page::create([
            'title' => 'About us',
            'slug' => 'about-us',
            'user_id' => Auth::id(),
            'store_detail_id' =>  $store_detail_id,
        ]);
     

        $data = Page::create([
            'title' => 'Contact us',
            'slug' => 'contact-us',
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id,
        ]);

        $data = Page::create([
            'title' => 'Privacy policy',
            'slug' => 'privacy-policy',
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id,
        ]);

        $data = Page::create([
            'title' => 'Faq',
            'slug' => 'faq',
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id,
        ]);

        $data = Page::create([
            'title' => 'Terms & Conditions',
            'slug' => 'terms-&-conditions',
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        
        $data = PaymentOption::create([
            'online' => $request->online,
            'online_link' => $request->online_link,
            'paypal' => $request->paypal,
            'paypal_link' => $request->paypal_link,
            'payfast' => $request->payfast,
            'payfast_link' => $request->payfast_link,
            'yoco' => $request->yoco,
            'yoco_link' => $request->yoco_link,
            'is_cash_on_delivery' => $request->is_cash_on_delivery,
            'user_id' => Auth::id(),
            'store_detail_id' => $store_detail_id->id,
        ]);
        if($data)
        {
           $store_detail_id->id;
            self::pagestore($store_detail_id->id);
            
            $subDomain = StoreDetail::select('*')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
            
            self::create_subdomain($subDomain);
            
              $cp_detail =Cpanel::select('*')
                    ->get()->first();
               
                return view('merchent.congratulations', compact('cp_detail','subDomain'));
            }
            
            // return redirect("/congratulations", [$link] );
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
   
    function create_subdomain($subDomain) {
        $domain_type = $subDomain->domain_type;
       // $subDomain = explode('.', $subDomain->domain_name)[0];
 
        $cp_detail =Cpanel::select('*')
                ->get()->first();
               
        $cPanelUser=$cp_detail->cpanelUserid;
        $cPanelPass=$cp_detail->cpanelPass;
        $rootDomain=$cp_detail->rootDomain;
        $cpanel_skin =$cp_detail->theme;
    
        $subdomain_add = explode('.', $subDomain->domain_name)[0];  ///sumdomain used in adddon creation 207.
        $subDomain = $subDomain->domain_name;
        
       switch ($domain_type) {
            case 'own_domain':
                $buildRequest = "/frontend/".$cpanel_skin."/addon/doadddomain.html?domain=" . $subDomain. "&subdomain=" . $subdomain_add . "&dir=public_html/molicule/public";
            break;
            case 'sub_domain':
                $buildRequest = "/frontend/".$cpanel_skin."/subdomain/doadddomain.html?rootdomain=" . $rootDomain . "&domain=" . $subDomain . "&dir=public_html/molicule/public";
            break;
           default:
          return ;
        }


    //  $buildRequest = "/frontend/x3/subdomain/doadddomain.html?rootdomain=" . $rootDomain . "&domain=" . $subDomain;
    
        $openSocket = fsockopen('localhost',2082);
        if(!$openSocket) {
            return "Socket error";
            exit();
        }
    
        $authString = $cPanelUser . ":" . $cPanelPass;
        $authPass = base64_encode($authString);
        $buildHeaders  = "GET " . $buildRequest ."\r\n";
        $buildHeaders .= "HTTP/1.0\r\n";
        $buildHeaders .= "Host:localhost\r\n";
        $buildHeaders .= "Authorization: Basic " . $authPass . "\r\n";
        $buildHeaders .= "\r\n";
    
        fputs($openSocket, $buildHeaders);
        while(!feof($openSocket)) {
        fgets($openSocket,128);
        }
        fclose($openSocket);
        
       $newDomain = "https://" . $subDomain ;
      
      //  $newDomain = "https://" . $subDomain . "." . $rootDomain . "/";
    }
}