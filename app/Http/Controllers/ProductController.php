<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Department;
use App\Models\Category;
use App\Models\Karat;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('admin.product.index', ['products'=>$products]);
    }

    public function filter($dept_id)
    {
        if(Auth::check()){
            if(Auth::User()->name == "admin"){
                return redirect('/departments');
            }
        }
        $products = Product::where('department_id',$dept_id)->orderBy('id', 'DESC')->with('karat')->get();
        $departments = Department::all();
        $prices = json_decode(file_get_contents('http://sabayiks.net/kw/public/api/feed'), true);
        foreach ($prices as $key => $value) {
            $prices[$key] = str_replace(',' , '', $value);
        }
        // dd($prices);
        return view('home',compact('products','prices','departments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        $categories  = Category::get();
        $karats = Karat::get();

        return view('admin.product.create', [
            'departments' => $departments,
            'categories' => $categories,
            'karats' => $karats,
        ]);
    }


    public function payment(Request $request)
    {
        $token = "lX983KGEleKvNrHnijRZYea_mhyjzSQSN_DHIOPu5pNIiRiP0Bf075ZR-Q2M0Tli9hhtOxfdpwQEDq5qWobI4Sa2FWf9j5GdI39Sgk6UiZBrppSyfq8bwPXbolK4nQlsI68s1x4lTP-ffZ5PX5PGVMLnMaxjOLmMQ-1e35fd2zmKcHg3s-YrtmuQTxNOqvDDSrgrS9NsUZJ5QPUXtHH1vlaVkT1jWBgQUTECGJP8huHGgrCnniUZ0FAnEpTq24Te4Hc_em4orWpsHTgnNIwaa7uCeqcvHNrEGXT3wrZzz6bLiaEkkEtVhiwVKuvxMpySZp1tdqqBwogJTAG1V433E7EyrJyzJh6lK3K72vEqDAo9i7btWnY83BCCRb52uqVA_IPI00_tiaA8A82GrGBU4fsulTRiC8Jcn4uJb_Gypm2i2ZoQ0izpSN_b6r7hzmUl_hRChYcmp2uElK1-IlMNyEQlqvUWWeS9qmzlVBa3fnQu2qlW9jSSo7fxbMFVMkqNGwZu89IwNWvVYJzhRowlR-gA8f1MJ82JU8_4txWyOGVOi7DUMmNpNDpQbi7SpXE-iUt4oqZ-mTLp4kiXbTSwGbmqQxwPLegY769_TE3DVus8zt1qzOohG4E5ofmnOAzHqVe3ceQy0qbkZ3PhOTBHsffn5rkXWsc8narmjwevj-IwP5yW"; #token value to be placed here;
        $basURL = "https://api.myfatoorah.com";
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "$basURL/v2/InitiatePayment",
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"InvoiceAmount\": ".$request->total_price.",\"CurrencyIso\": \"KWD\"}",
          CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
        //   echo "cURL Error #:" . $err;
        } else {
        //   echo "$response 'sadsda <br />'";
        }

        ####### Execute Payment ######
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$basURL/v2/ExecutePayment",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"PaymentMethodId\":\"1\",\"CustomerName\": \"".$request->userName."\",\"DisplayCurrencyIso\": \"KWD\", \"MobileCountryCode\":\"+965\",\"CustomerMobile\":".$request->phone."\"\",\"CustomerEmail\": \"xx@yy.com\",\"InvoiceValue\": ".$request->total_price.",\"CallBackUrl\": \"http://sabayik.net/success\",\"ErrorUrl\": \"http://sabayik.net/error\",\"Language\": \"en\",\"CustomerReference\" :\"ref 1\",\"CustomerCivilId\":12345678,\"UserDefinedField\": \"Custom field\",\"ExpireDate\": \"\",\"CustomerAddress\" :{\"Block\":\"\",\"Street\":\"\",\"HouseBuildingNo\":\"\",\"Address\":\"\",\"AddressInstructions\":\"\"},\"InvoiceItems\": [{\"ItemName\": \"Product 01\",\"Quantity\": 1,\"UnitPrice\": ".$request->total_price."}]}",
            CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        //   echo "cURL Error #:" . $err;
        } else {
        //   echo "$response <br /";
          $con = json_encode($response);

        //   dd($con);
        return response()->json($response, 200);

        }
    }

    public function get_category_products($category_id)
    {
        $products = Category::find($category_id)->prodcuts->paginate(12);
        return response()->json($products, 200);
    }

    public function get_current_price($key)
    {
        $data = json_decode(file_get_contents('http://sabayiks.net/kw/public/api/feed'), true);
        // dd($data[$key]);
        return response()->json($data[$key], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->only([
            'title_en',
            'title_ar',
            'department_id',
            'category_id',
            'karat_id',
            'weight',
            'effort_price',
            'stone_price',
            'stone_weight',
            'image_url'
        ]));

        return redirect()->back()->with(['success'=>__('Created Successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->with('karat')->find($id);

        if (!$product)
            return entityNotFound();

        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        $departments = Department::get();
        $categories  = Category::get();
        $karats = Karat::get();

        return view('admin.product.edit', [
            'product'=>$product,
            'departments' => $departments,
            'categories' => $categories,
            'karats' => $karats,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        $product->update($request->only([
            'title_en',
            'title_ar',
            'department_id',
            'category_id',
            'karat_id',
            'weight',
            'effort_price',
            'stone_price',
            'stone_weight',
            'image_url'
        ]));
        return redirect()->back()->with(['success' => __('Updated Successfully') ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);
        // Session::flash('message', "Special message goes here");

        $product->delete();

        return redirect()->back()->with(['success' => __('Deleted Successfully') ]);
    }
}
