<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Cart;
use App\Models\Slide;
use App\Models\Bill;
use App\Models\Date;
use App\Models\BillDetail;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Rating;
use App\Models\News;
use App\Models\Store;
use App\Mail\RegisterEmail;
use App\Services\GetSession;
use Illuminate\Http\Request;

class PageRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        $company_id = GetSession::getCompanyId();
        return User::where('id_company', $company_id)->orderBy('created_at', 'desc')->paginate(10);
    }

    public function allBookAdm()
    {
        $company_id = GetSession::getCompanyId();
        return Product::where('id_company', $company_id)->get();
    }

    public function getAllproductbook()
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::orderBy('unit_price', 'DESC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'duoi_70') {
                $product = Product::where('unit_price', '<=', 70000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == '70-100') {
                $product = Product::whereBetween('unit_price', [70000, 100000])->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tren_100') {
                $product = Product::where('unit_price', '>=', 100000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            }
        } else {
            $product = Product::orderBy('created_at', 'desc')->with('store')->paginate(20);
        }
        return $product;
    }

    public function getAllCompany()
    {
        $company_id = GetSession::getCompanyId();
        return  Company::where('id', $company_id)->value('name');
    }

    public function getAllstore()
    {
        $company_id = GetSession::getCompanyId();
        return  Store::join('product', 'store.id_product', '=', 'product.id')
            ->where('product.id_company', $company_id)
            ->sum('store.stored_product');
    }
    // sách hoạt động

    public function getAllproductNew()
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::where('status', 1)->orderBy('unit_price', 'DESC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::where('status', 1)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'duoi_70') {
                $product = Product::where('status', 1)->where('unit_price', '<=', 70000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == '70-100') {
                $product = Product::where('status', 1)->whereBetween('unit_price', [70000, 100000])->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tren_100') {
                $product = Product::where('status', 1)->where('unit_price', '>=', 100000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            }
        } else {
            $product = Product::orderBy('created_at', 'desc')
                ->where('status', 1)
                ->with('store')
                ->paginate(10);
        }
        return $product;
    }
    // sach mới

    public function getBillByCompanyId()
    {
        $company_id = GetSession::getCompanyId();
        return  BillDetail::join('product', 'bill_detail.id_product', '=', 'product.id')
            ->where('product.id_company', $company_id)
            ->count('bill_detail.id');
    }
    // sach mới

    public function VerifyAccount($id)
    {
        $user = User::find($id);
        $user->is_verified = 1;
        $user->save();
    }

    public function getAllProductSale()
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::where('promotion_price', '<>', 0)->where('status', 1)->orderBy('unit_price', 'DESC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::where('promotion_price', '<>', 0)->where('status', 1)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'duoi_70') {
                $product = Product::where('promotion_price', '<>', 0)->where('status', 1)->where('unit_price', '<=', 70000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == '70-100') {
                $product = Product::where('promotion_price', '<>', 0)->where('status', 1)->whereBetween('unit_price', [70000, 100000])->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tren_100') {
                $product = Product::where('promotion_price', '<>', 0)->where('status', 1)->where('unit_price', '>=', 100000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            }
        } else {
            $product = Product::where('promotion_price', '<>', 0)->where('status', 1)
            ->latest()
            ->with('store')
            ->paginate(10);
        }
        return $product;
    }
    // sách giảm giá

    public function getAllproductHighlights()
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::where('new', 1)->where('status', 1)->orderBy('unit_price', 'DESC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::where('new', 1)->where('status', 1)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'duoi_70') {
                $product = Product::where('new', 1)->where('status', 1)->where('unit_price', '<=', 70000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == '70-100') {
                $product = Product::where('new', 1)->where('status', 1)->whereBetween('unit_price', [70000, 100000])->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tren_100') {
                $product = Product::where('new', 1)->where('status', 1)->where('unit_price', '>=', 100000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            }
        } else {
            $product = Product::where('new', 1)->where('status', 1)
            ->latest()
            ->with('store')
            ->paginate(10);
        }
        return $product;
    }
    //sách nổi bật

    public function getProduct($id)
    {
        return Product::find($id);
    }

    public function getProductRelated($id){
        $product=Product::find($id);
        return Product::where(['id_type'=>$product->id_type])->paginate(5);
    }

    public function ProductView($id)
    {
        $product = Product::where('id',$id)->first();
        $product->product_view += 1;
        $product->save();
        
    }

    public function getSearch($req)
    {
        $product = Product::where('status', 1)
            ->where('name', 'like', '%' . $req->key . '%')
            ->orWhere('unit_price', $req->key)
            ->paginate(20);
        return $product;
    }

    public function getProductType()
    {
        return ProductType::all();
    }

    public function store($id)
    {
        return Store::where('id_product', $id)->first();
    }

    public function getProductTypeName($id)
    {
        return ProductType::find($id);
    }

    public function getProductCompanyName($id)
    {
        return Company::find($id);
    }

    public function postComment($id, $request)
    {
        $comment = new Comment();
        $comment->id_product = $id;
        $comment->id_user = Auth::user()->id;
        $comment->body = $request->input('body');
        $comment->save();
    }

    public function getComment($id)
    {
        $product =  Product::find($id);
        return $product->userComments;
    }

    public function getRating($id)
    {
        $ra_5 = Rating::where('ra_number', 5)->where('id_product', $id)->count();
        $ra_4 = Rating::where('ra_number', 4)->where('id_product', $id)->count();
        $ra_3 = Rating::where('ra_number', 3)->where('id_product', $id)->count();
        $ra_2 = Rating::where('ra_number', 2)->where('id_product', $id)->count();
        $ra_1 = Rating::where('ra_number', 1)->where('id_product', $id)->count();
        $count_ra = Rating::where('id_product', $id)->get();
        $product =  Product::find($id);
        $ra_date = $product->ratings()->orderBy('rating.created_at', 'desc')->paginate(5);
        return [
            'ra_date' => $ra_date, 'product' => $product, 'ra_5' => $ra_5,
            'ra_4' => $ra_4, 'ra_3' => $ra_3, 'ra_2' => $ra_2, 'ra_1' => $ra_1,
            'count_ra' => $count_ra
        ];
    }

    public function postRating($id, $request)
    {
        $rating = new Rating();
        $rating->id_product = $id;
        $rating->id_user = Auth::user()->id;
        $rating->ra_number = $request->input('rating');
        $rating->body = $request->input('body');
        $rating->save();

        $product = Product::find($id);
        $product->total_number += $request->input('rating');
        $product->total_ra += 1;
        $product->save();
    }

    public function getProductTypeID($id)
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::where('id_type', $id)->where('status', 1)->orderBy('unit_price', 'DESC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::where('id_type', $id)->where('status', 1)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'duoi_70') {
                $product = Product::where('id_type', $id)->where('status', 1)->where('unit_price', '<=', 70000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == '70-100') {
                $product = Product::where('id_type', $id)->where('status', 1)->whereBetween('unit_price', [70000, 100000])->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tren_100') {
                $product = Product::where('id_type', $id)->where('status', 1)->where('unit_price', '>=', 100000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            }
        } else {
            $product = Product::where('id_type', $id)->where('status', 1)->with('store')->paginate(10);
        }
        return $product;
    }

    public function getProductCompanyID($id)
    {
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::where('id_company', $id)->where('status', 1)->orderBy('unit_price', 'DESC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::where('id_company', $id)->where('status', 1)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'duoi_70') {
                $product = Product::where('id_company', $id)->where('status', 1)->where('unit_price', '<=', 70000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == '70-100') {
                $product = Product::where('id_company', $id)->where('status', 1)->whereBetween('unit_price', [70000, 100000])->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            } elseif ($sort_by == 'tren_100') {
                $product = Product::where('id_company', $id)->where('status', 1)->where('unit_price', '>=', 100000)->orderBy('unit_price', 'ASC')->with('store')->paginate(20);
            }
        } else {
            $product = Product::where('id_company', $id)->where('status', 1)->with('store')->paginate(10);
        }
        return $product;
    }

    public function getSlide()
    {
        return Slide::where('status', 1)->get();
    }

    public function getAddCart(Request $request, $id)
    {
        $store = Store::where('id_product', $request->id)->first();
        if ($store && $store->stored_product != 0) {
            $product = Product::find($id);
            $oldcart = Session('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldcart);
            $cart->add($product, $id);
            $request->session()->put('cart', $cart);
            return response()->json(array('cart' => $cart));
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'error',
            ], 500);
        }
    }

    public function postCart(Request $request)
    {
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->changeItem($request->id, $request->quantity);
        $request->session()->put('cart', $cart);
        return response()->json(array('cart' => $cart, 'id' => $request->id));
    }

    public function getDelcart($id)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'cart' => $cart,
        ], 200);
    }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');
        $image_products = [];
        $name_products = [];
        $quantity_products = [];
        $price = [];
        $id_account = Auth::user()->id;

        $bill = new Bill();
        $bill->id_user = Auth::user()->id;
        $bill->date_order = date('Y-m-d');
        $bill->email = $request->email;
        $bill->phone = $request->phone;
        $bill->address = $request->address;
        $bill->total = $cart->totalPrice;
        $bill->quantity = $cart->totalQty;
        $bill->payment = $request->payment;
        $bill->status = 0;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail();

            $i = Product::where('id', $key)
                            ->value('image');
            $n = Product::where('id', $key)
                            ->value('name');
            $q = $value['qty'];
            $p = $value['price'];
            $image_products[] = $i;
            $name_products[] = $n;
            $quantity_products[] = $q;
            $price[] = $p;

            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);           
            $bill_detail->save();
        }
        Mail::to(Auth::user()->email)->send(new \App\Mail\TestMail($image_products, $name_products, $quantity_products, $price, $id_account));
        Session::forget('cart');
    }

    public function createUser(Request $request)
    {
        $user = new User();
        $user_name = $request->input('username');
        $user->full_name = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('username');
        $user->password = hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        $id = User::where('username', $user_name)
                    ->value('id');               
        Mail::to($user_name)->send(new \App\Mail\RegisterEmail($id));   
    }

    public function getInfo($id)
    {
        return User::find($id);
    }

    public function changeInfo(Request $request, $id)
    {
        $customer = User::find($id);
        $customer->full_name = $request->input('fullname');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->save();
    }

    public function updatePassword(Request $request, $id)
    {
        if (Hash::Check($request->password, Auth::user()->password)) {
            $pa = User::find($id);
            $pa->password = $request->input('password');
            $request->user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            return redirect()->back()->with('success', 'Thay đổi thành công ');
        }
        return redirect()->back()->with('danger', 'Mật khẩu cũ không đúng ');
    }

    public function getBill()
    {
        return Bill::where('id_user', Auth::user()->id)->get();
    }

    public function destroy($id)
    {
        $supplier = User::find($id);
        $supplier->delete();
    }

    public function getRead($id)
    {
        return Product::find($id);
    }

    // tin tức
    public function getContent()
    {
        return News::where('status', 1)->get();
    }

    public function getContentDetail($id)
    {
        return News::where('id', $id)->get();
    }

    public function getContentFist()
    {
        return News::orderBy('id', 'desc')->where('status', 1)->first();
    }
}
