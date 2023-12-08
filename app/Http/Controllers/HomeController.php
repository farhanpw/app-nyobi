<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Testimoni;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::all();
        $variants = Variant::all();
        return view('frontpage.index', compact('about', 'variants'));
    }

    public function products()
    {
        $products = Product::paginate(6);

        return view('frontpage.products', compact('products'));
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::where('id', 'like', '%' . $request->search . '%')
                ->orwhere('product_name', 'like', '%' . $request->search . '%')
                ->orwhere('price', 'like', '%' . $request->search . '%')
                ->get();

            $output = '';
            $test = '';
            if (count($data) > 0) {
                $output = '
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>';
                foreach ($data as $row) {
                    $output .=
                        '
                            <tr>
                            <th scope="row">' .
                        $row->id .
                        '</th>
                            <td>' .
                        $row->product_name .
                        '</td>
                            <td>' .
                        $row->price .
                        '</td>
                            </tr>
                            ';
                }
                $output .= '
                    </tbody>
                    </table>';

                $test = '
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">';

                foreach ($data as $product) {
                    $test .=
                        '
                        <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="/uploads/' .
                        $product->image .
                        '" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h3 class="product-title" style="text-decoration: none">
                                    <a href="/product/' .
                        $product->id .
                        '"
                                        style="text-decoration: none; color:black">' .
                        $product->product_name .
                        '</a>
                                </h3>
                                <!-- Product price-->
                                <span class="price">
                                    <ins>
                                        <span class="amount" style="text-decoration: none; color:black">Rp.
                                            ' .
                        number_format($product->price) .
                        '</span>
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
                }
                $test .= '</div>';
            } else {
                $test .= 'No results';
            }
            return $test;
        }
    }

    public function add_to_cart(Request $request)
    {
        try {
            $input = $request->all();
            $member_id = Auth::user()->id;
            $condition = ['product_id' => $input['product_id']];

            $data = array_merge($input, ['member_id' => $member_id]);
            $data['amount'] = DB::raw('amount + ' . $input['amount']);

            Cart::updateOrCreate($condition, $data);
            return response()->json(['message' => 'Item added to cart successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error adding item to cart: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function delete_from_cart(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }

    public function product($id_product)
    {
        $product = Product::with('size', 'variant')->find($id_product);

        $latest_products = Product::orderByDesc('created_at')
            ->offset(0)
            ->limit(10)
            ->get();

        if (!$product) {
            abort(404);
        }

        return view('frontpage.product', compact('product', 'latest_products'));
    }

    public function cart()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/province',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: 555596635942a0abda7a5e0a8dbdaa4d'],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        }

        $provinsi = json_decode($response);
        $carts = Cart::where('member_id', Auth::user()->id)
            ->where('is_checkout', 0)
            ->get();
        $cart_total = Cart::where('member_id', Auth::user()->id)
            ->where('is_checkout', 0)
            ->sum('total');
        $total_item = Cart::where('member_id', Auth::user()->id)
            ->where('is_checkout', 0)
            ->sum('amount');

            // dd($cart_total);

        return view('frontpage.cart', compact('carts', 'provinsi', 'cart_total', 'total_item'));
    }

    public function get_kota($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/city?province=' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: 555596635942a0abda7a5e0a8dbdaa4d'],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            echo $response;
        }
    }

    public function get_ongkir($destination, $weight)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/cost',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'origin=22&destination=' . $destination . '&weight=' . $weight . '&courier=jne',
            CURLOPT_HTTPHEADER => ['content-type: application/x-www-form-urlencoded', 'key: 555596635942a0abda7a5e0a8dbdaa4d'],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            echo $response;
        }
    }

    public function checkout_orders(Request $request)
    {
        $id = DB::table('orders')->insertGetId([
            'member_id' => $request->member_id,
            'invoice' => date('ymds'),
            'grand_total' => $request->grand_total,
            'status' => 'Baru',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        for ($i = 0; $i < count($request->product_id); $i++) {
            DB::table('order_details')->insert([
                'order_id' => $id,
                'product_id' => $request->product_id[$i],
                'amount' => $request->amount[$i],
                'total' => $request->total[$i],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        Cart::where('member_id', Auth::user()->id)->update([
            'is_checkout' => 1,
        ]);
    }
    public function checkout()
    {
        $about = About::first();
        $orders = Order::where('member_id', Auth::user()->id)->first();
        $cart_total = Cart::where('member_id', Auth::user()->id)
            ->where('is_checkout', 0)
            ->sum('total');
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/province',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: 555596635942a0abda7a5e0a8dbdaa4d'],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        }

        $provinsi = json_decode($response);
        return view('frontpage.checkout', compact('about', 'orders', 'provinsi', 'cart_total'));
    }

    // public function payments(Request $request)
    // {
    //     Payment::create([
    //         'order_id' => $request->order_id,
    //         'member_id' => Auth::guard('webmember')->user()->id,
    //         'amount' => $request->amount,
    //         'provinsi' => $request->provinsi,
    //         'kabupaten' => $request->kabupaten,
    //         'kecamatan' => '',
    //         'detail_alamat' => $request->detail_alamat,
    //         'status' => 'MENUNGGU',
    //         'no_rekening' => $request->no_rekening,
    //         'atas_nama' => $request->atas_nama,
    //     ]);

    //     return redirect('/orders');
    // }

    // public function orders()
    // {
    //     $orders = Order::where('member_id', Auth::guard('webmember')->user()->id)->get();
    //     $payments = Payment::where('member_id', Auth::guard('webmember')->user()->id)->get();
    //     return view('frontpage.orders', compact('orders', 'payments'));
    // }

    public function pesanan_selesai(Order $order)
    {
        $order->status = 'Selesai';
        $order->save();

        return redirect('/orders');
    }

    public function about()
    {
        $about = About::first();
        return view('frontpage.about', compact('about'));
    }

    public function profil()
    {
        return view('frontpage.profil');
    }

}
