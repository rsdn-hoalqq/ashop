<?php

namespace App\Http\Controllers\Shop;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Model\Products;
use Illuminate\Support\Facades\Auth;
use App\Model\TypeProducts;
use App\Model\Order;
use App\Model\ModelDetail;
use App\Model\Province;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        $id= $request->idCart;
        $producBuy = DB::table('products')->where('pid', $id)->first();
        $type = TypeProducts::where('id', $producBuy->id_type)->first();
        if($producBuy->soluong>0){
            $contents = Cart::add(array('id' => $id, 'name' => $producBuy->name,
             'qty' => 1, 'price' => $producBuy->promotion_price,
            'options' => array('img' => $producBuy->image, 'soluong' => $producBuy->soluong, 'type_pro' => $type->name)));
        }else{
           return false;
        }
    }
    public function giohang()
    {
        $data['content'] = Cart::content();
        $data['total'] = Cart::subtotal();
        $data['countCart'] = Cart::count();
        return view('shop.cart.cart', $data);
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('shop.cart.index');
    }

    public function capnhat(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        if (!empty($id) && !empty($qty))
            Cart::update($id, $qty);
        echo 'ok';
    }

    public function checkout(Request $request)
    {
        $content = Cart::content();
        $province=Province::all();
        $request->session()->push('content', $content);
        $carts = $request->session()->get('content');
        $total = Cart::subtotal();
        if (Cart::count() < 1) {
            $request->session()->flash('msgs', 'Bạn cần mua hàng trước khi thanh toán');
            return redirect()->route('shop.index.index');
        }
        if (Auth::check()) {
//            $id = Auth::user()->id;
//            $content = Cart::content();
//            $total1 = Cart::subtotal();
//            $total2 = str_replace(",", "", $total1);// chuyển để lưu vào db
//            $arItem = array(
//                'id_user' => $id,
//                'total' => $total2,
//            );
//            $order = Order::create($arItem);
//            foreach ($content as $item) {
//                $arDetail = array(
//                    'id_order' => $order->id_order,
//                    'id_products' => $item->id,
//                    'quantity' => $item->qty,
//                    'price' => $item->price,
//                );
//                ModelDetail::insert($arDetail);
//            }

        } else {
            $request->session()->flash('message', 'fail');
            return redirect()->route('shop.login.login');
        }
        return view('shop.cart.checkout', ['contents' => $content, 'total' => $total, 'carts' => $carts,'provinces'=>$province]);
    }

    public function order(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $content = Cart::content();
            $total1 = Cart::subtotal();
            $total2 = str_replace(",", "", $total1);// chuyển để lưu vào db
            $arItem = array(
                'id_user' => $id,
                'total' => $total2,
            );
            $order = Order::create($arItem);
            foreach ($content as $item) {
                $arDetail = array(
                    'id_order' => $order->id_order,
                    'id_products' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                );
                $tam=Products::find($item->id);
                $count=$tam->soluong;
                $data['item']=  DB::table('products')
                    ->where('pid',$item->id )
                    ->update(['soluong' =>$count-$item->qty ]);
                ModelDetail::insert($arDetail);
            }

            $update = User::find($id);
            $update->phone = $request->phone;
            $update->province = $request->province;
            $update->town = $request->town;
            $update->commune = $request->commune;
            $update->hamlet = $request->hamlet;
            $update->update();
           Cart::destroy();


            $request->session()->flash('success', 'success');
            return redirect()->route('shop.index.index');
        }
    }
}
