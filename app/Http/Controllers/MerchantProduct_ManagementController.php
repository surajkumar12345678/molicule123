<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\Category;
use App\Models\StoreDetail;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;
use DataTables;
use DB;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class MerchantProduct_ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

			$store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();

        
        $products = Product::where('store_detail_id',$store_detail_id->id)->get();
            return DataTables::of($products)
            ->editColumn('id', function ($products) {
                return $products->id;
            })
            ->editColumn('name', function ($products) {
                return $products->title;
            })
			->editColumn('Image', function ($products) {
                $images = explode(',',$products->feature_image);
                return $image = '<img class="productcss" src="'.asset('uploads/products/images/'.$images[0]).'">';
            })
			->editColumn('Price', function ($products) {
                return $products->price;
            })
			->editColumn('Category', function ($products) {
                return $products->category;
            })
			->editColumn('Description', function ($products) {
                return $products->description;
            })
			->editColumn('Type', function ($products) {
                return $products->product_type;
            })

            ->addColumn('status', function($products){
				if($products->status=='1'){
				    $checked = "checked";
                    $active = "active";
				}else{
					$checked = " ";
                    $active = "";
				}
				return $products = '<div class="toggle-btn '.$active.'">
                <input data-size="mini" data-id="'.$products->id.'"  '.$checked.' action="product-change-status" class="cb-value toggleProject" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                <span class="round-btn"></span>
                </div>';
            })
			->addColumn('action', function($products){
                $button = " ";
				if($products->product_type == "Variable product"){
				    $button .= '<a href="/variable-product-attribute/'.$products->id.'" class="active btn btn-sm btn-primary">Add Attribute</a>';
                }

                $button .= ' <a href="/edit-product/'.$products->id.'" class="active btn btn-sm btn-primary">Edit</a>';

				$button .= ' <a href="/delete-product/'.$products->id.'" class="active btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i></a>';
				return $button;
            })

            ->escapeColumns([])
            ->make(true);
        }


		
		$categories=Category::all();
        $product_types=ProductType::all();
        $store_detail_id = StoreDetail::select('id')->where('user_id', Auth::id())->first();
        
        $products = Product::where('store_detail_id',$store_detail_id->id)->get();
        return view('merchant-dashboard.product-management')->with(compact('products','categories','product_types'));
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
    public function store(Request $request)
    {

        $id = $request->post('id');
        $request->validate([
            'title' => 'required|max:255|string|unique:products,title,'.$id.',id',
            'price' => 'required|numeric|gt:0',
            'description' => 'required|min:3',
        ]);

       
        //products image upload
        $image_array = array();
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image){
                $image_update = 'product_image_'.rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
                $image_array[] = $image_update;
                $destinationPath = public_path('/uploads/products/images');
                $image->move($destinationPath, $image_update);
            }   
        }
        
        if(isset($_POST['images']) && !empty($_POST['images'])){
            $image_array=array_merge($_POST['images'],$image_array);
        }
        $proImage = implode(",",$image_array);
        $store_detail_id = StoreDetail::select('id')->where('user_id', Auth::id())->first();
        // digital_file
        if($request->hasFile('digital_file')) {
            $image = $request->file('digital_file');
            $image_update = rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products/digital_file');
            $image->move($destinationPath, $image_update);
        }else{
            $image = Product::where('id',$request->id)->first();
            if($image){
                $image_update=$image->digital_file;
            }else{
                $image_update=null;
            }
            
        }
        $digital_file=$image_update;

        if(isset($request->id)){

            $insert=DB::table('products')->where('id',$request->id)->update([
                'title' =>  $request->input('title'),
                'category' => $request->category,
                'product_type' => $request->input('product_type'),
                'description' => $request->input('description'),
                'feature_image' => $proImage,
                'sku' => $request->input('sku'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'gtin' => $request->input('gtin'),
                'price_in_currency_set' => $request->input('price_in_currency_set'),
                'product_mode' => $request->input('product_mode'),
                'digital_file' => $digital_file,
                'shipping' => $request->input('shipping'),
                'best_seller' => $request->input('best_seller'),
                'weight' => $request->input('weight'),
                'feature_home' => $request->input('feature_home'),
                'feature_category' => $request->input('feature_category'),
                'user_id' => Auth::id(),
                'store_detail_id' => $store_detail_id->id,
                ]);

                if($insert)
                {
                    return redirect()->back()->with('success','Product updated successfully');
                }else{
                    return redirect()->back()->with('error','Something went wrong! please try again');
                }
        }else{
            $insert=DB::table('products')->insert([
                'title' =>  $request->input('title'),
                'category' => $request->category,
                'product_type' => $request->input('product_type'),
                'description' => $request->input('description'),
                'feature_image' => $proImage,
                'sku' => $request->input('sku'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'gtin' => $request->input('gtin'),
                'price_in_currency_set' => $request->input('price_in_currency_set'),
                'product_mode' => $request->input('product_mode'),
                'digital_file' => $digital_file,
                'shipping' => $request->input('shipping'),
                'best_seller' => $request->input('best_seller'),
                'weight' => $request->input('weight'),
                'feature_home' => $request->input('feature_home'),
                'feature_category' => $request->input('feature_category'),
                'user_id' => Auth::id(),
                'store_detail_id' => $store_detail_id->id,
                ]);

                if($insert)
                {
                    return redirect()->back()->with('success','Product added successfully');
                }else{
                    return redirect()->back()->with('error','Something went wrong! please try again');
                } 
        }

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
    public function addProduct(Request $request, $id="")
    {
        $categories=Category::select('*')->where('user_id', Auth::id())->where('status', '1')->get();
        $product_types=ProductType::all();
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())->first();

        
        $product = Product::where('store_detail_id',$store_detail_id->id)->where('id',$id)->first();
      
        return view('merchant-dashboard.add-products',compact(['product','categories','product_types']));

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
    public function deleteProduct($id)
    {
        
        $products_review = DB::table('products_review')->where('product_id',$id)->get();
        foreach($products_review as $products_re){
            DB::table('products_review')->where('id',$products_re->id)->delete();
        }
        $product = Product::where('id',$id)->delete();
        return redirect()->back()->with('success','Product deleted successfully');

    }

    public function variableproductattribute(Request $request,$id)
    {
       $product = Product::where('id',$id)->get();
       $attributes =ProductAttribute::all();
       return view('merchant-dashboard.variable-product-attribute',compact(['product','attributes']));
    }

    public function variableattributevalue(Request $request,$id)
    {
        
        $str = $request->demo;
        if(array_filter($str)){
            $attribute_name = $request->attribute_name;

            $attributes_id =ProductAttribute::select('id')->where('attribute_name',$attribute_name)->get();

            foreach($attributes_id as $attributeid)
                {
                $attribute_id = $attributeid->id;
                }
            $str = $request->demo;
            $attribute_name = explode(' ,',$str[0]);
            $attribute_values_id=array();
            foreach($attribute_name as $attribute){

                $data = DB::table('product_attribute_value_id')->insert([

                    'product_attribute_id' => $attribute_id,
                    'product_id' => $id,
                    'attribute_value' => $attribute
                ]);

                $attribute_values_id[]= DB::getPdo()->lastInsertId();
            }

            $value_id = implode(',',$attribute_values_id);

            $attribute_values=ProductAttributeValue::create([
                'attribute_value' => $value_id,
                'product_attribute_id' => $attribute_id,
                'product_id' => $id
            ]);

            if($attribute_values)
            {
                return redirect()->back()->with('success','Value added successfully');
            }
        }else{
   
            return redirect()->back()->with('error','Attribute value field is required');
        }
    }

    //add attribute
    public function newattribute(Request $request)
    {

        $request->validate([
            'attribute_name' => 'required|unique:product_attributes,attribute_name',
        ]);
      
        $data = DB::table('product_attributes')->insert([
        'attribute_name' => $request->attribute_name,
        'created_at' => now(),
        'updated_at' => now()
        ]);
        if($data) {
            return redirect()->back()->with('success','Attributes added successfully');
        }
    }

    public function variableproductvariation(Request $request,$id)
    {
       $product = Product::where('id',$id)->get();
       $attribute_values = DB::table('product_attribute_values')
       ->join('product_attributes', 'product_attributes.id', '=', 'product_attribute_values.product_attribute_id')
       ->select('product_attribute_values.*', 'product_attributes.attribute_name')
       ->where('product_attribute_values.product_id',$id)
       ->get();

       $attributes_value_id =DB::table('product_attribute_value_id')->where('product_id',$id)->get();
       return view('merchant-dashboard.variable-product-variation',compact(['product','attribute_values','attributes_value_id']));
    }

    public function variableAttributeSave(Request $request)
    {

        if($request->ajax()){

            try{

                $product_id = $request->product_id;
                $attr_id = implode(',',$request->attr_id);
                $value_id = implode(',',$request->value_id);

                $html=view('merchant-dashboard.variation-add-form')->with(compact('product_id','attr_id','value_id'))->render();
                return response(array("error" => false, "message" => "Data fetched successfully.","html"=>$html),200);

             }catch (\Exception $e){
                 return response(array("error"
                 => true, "message" => $e->getMessage()),403);
             }

        }else{
            return response(['message'=>'Unauthorized access'],403);
        }

    }

    public function variableAttributeInsert(Request $request)
    {


      if(isset($request->weight)){$weight = $request->weight;}else{ $weight =0; }
      
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products/attribute_image');
            $image->move($destinationPath, $image_update);
        }else{
            $image_update=null;
        }
      $name=$image_update;

      $data = DB::table('product_combination')->insert([
        'product_attribute_id' => $request->attr_id,
        'product_id' => $request->product_id,
        'value_id' => $request->value_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->desc,
        'weight' => $weight,
        'image' =>$name
      ]);
      if($data){
        $request->session()->flash('success','Product attribute value add successfully');
        return redirect()->back();
      }else{
        $request->session()->flash('error','Something wrong please try again');
        return redirect()->back();
      }
    }


    public function ChangeStatus(Request $request)
    {

        $products = Product::find($request->id);
        $products->status = $request->status;
        $products->save();
        return response()->json(['success'=>'Status Change Successfully.']);
    }

    public function importExportView()
    {
       return view('merchant-dashboard.importexport');
    }
    public function import(Request $request) 
    {
        Excel::import(new ProductsImport,request()->file('file'));
        $request->session()->flash('success','Product import successfully');  
        return back();
    }

    public function fileExport() 
    {   
        return Excel::download(new ProductsExport, 'products.xlsx');
    }



}
