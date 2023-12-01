<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list']);
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
    }

    public function list()
    {
        $sizes = Size::all();
        $variants = Variant::all();

        if (request()->ajax()) {
            $products = Product::with('size', 'variant')->latest();
            return DataTables::of($products)
            ->make();
        }
        return view('admin.product.index', compact('sizes', 'variants'));

        // return view('product.index', compact('categories', 'subcategories'), [
        //     "product" => Product::latest()
        // ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('size', 'variant')->get();

        return response()->json([
            'data' => $products,
        ]);
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
        $validator = Validator::make($request->all(), [
            'size_id' => 'required',
            'variant_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'material' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();

        if ($request->has('image')) {
            $image = $request->file('image');
            $name_image = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $name_image);
            $input['image'] = $name_image;
        }
        // dd($request->all());
        $Product = Product::create($input);

        return response()->json([
            'success' => true,
            'data' => $Product,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        return response()->json([
            'data' => $Product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product)
    {
        $validator = Validator::make($request->all(), [
            'size_id' => 'required',
            'variant_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'material' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();

        if ($request->has('image')) {
            File::delete('uploads/' . $Product->image);
            $image = $request->file('image');
            $name_image = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $name_image);
            $input['image'] = $name_image;
        } else {
            unset($input['image']);
        }

        $Product->update($input);

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $Product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        File::delete('uploads/' . $Product->image);
        $Product->delete();

        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    // public function search(Product $product){
    //     $query = $product->input('q');

    //     // Lakukan pencarian di model
    //     $results = Product::where('column_name', 'LIKE', '%' . $query . '%')->get();

    //     return view('search', compact('results'));
    // }

    public function search(Request $request){

        if($request->ajax()){
    
            $data=Product::where('id','like','%'.$request->search.'%')
            ->orwhere('product_name','like','%'.$request->search.'%')->get();
            
            $data=variant::where('id','like','%'.$request->search.'%')
            ->orwhere('name','like','%'.$request->search.'%')->get();
    
            $output='';
        if(count($data)>0){
    
             $output ='<div class="col mb-5">
             <div class="card h-100">
                 <!-- Sale badge-->
                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                 </div>
                 <!-- Product image-->
                 <img class="card-img-top" src="/uploads/{{ $product->image }}" alt="..." />
                 <!-- Product details-->
                 <div class="card-body p-4">
                     <div class="text-center">
                         <!-- Product name-->
                         <h3 class="product-title" style="text-decoration: none">
                             <a href="/product/{{ $product->id }}"
                                 style="text-decoration: none; color:black">{{ $product->product_name }}</a>
                         </h3>
                         <!-- Product price-->
                         <span class="price">
                             <ins>
                                 <span class="amount" style="text-decoration: none; color:black">Rp.
                                     {{ number_format($product->price) }}</span>
                             </ins>
                         </span>
                     </div>
                 </div>
                 <!-- Product actions-->
                 <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                     <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Buy <i
                                 class="bi bi-bag"></i> </a></div>
                 </div>
             </div>
         </div>';
    
                    foreach($data as $row){
                        $output .='
                        <tr>
                        <th scope="row">'.$row->id.'</th>
                        <td>'.$row->title.'</td>
                        <td>'.$row->description.'</td>
                        </tr>
                        ';
                    }
    
    
    
             $output .= '
                 </tbody>
                </table>';
    
    
    
        }
        else{
    
            $output .='No results';
    
        }
    
        return $output;
    
        }
    
    
    
    
      }
}
