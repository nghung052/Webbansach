<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use Analytics;
use App\Models\Bill;
use App\Models\Date;
use Spatie\Analytics\Period;
use Exception;
use App\Models\Rating;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class PageController extends Controller

{
    /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\PageRepository
     * 
     */
    protected $repository;



    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\PageRepository $repository
     *
     */
    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getIndex()
    {
        $slide = $this->repository->getSlide();
        $product_hightlights = $this->repository->getAllproductHighlights();
        $product_sale = $this->repository->getAllProductSale();
        $product_new = $this->repository->getAllproductNew();
        $product_type = $this->repository->getProductType();
        return view('layout_index.index',compact('product_new', 'product_type', 
                                                'slide', 'product_sale', 'product_hightlights')
        );
    }

    public function getDetail($id)
    {
        $product_detail = $this->repository->getProduct($id);
        $product_related = $this->repository->getProductRelated($id);
        $this->repository->ProductView($id);
        $image_detail = count($product_detail->imagedetail);
        $comments = $this->repository->getComment($id);
        $store = $this->repository->store($id);
        $rating = $this->repository->getRating($id);
        return view('layout_index.page.product_detail', compact('comments', 'product_detail', 'image_detail', 'rating','store','product_related' ));
    }


    public function getNews()
    {
        $content_fist = $this->repository->getContentFist();
        $content = $this->repository->getContent();
        return view('layout_index.page.news', compact('content', 'content_fist'));
    }
    public function getNewsContent($id)
    {
        $content = $this->repository->getContent();
        $content_detail = $this->repository->getContentDetail($id);

        return view('layout_index.page.news-detail', compact('content_detail', 'content'));
    }
    // tin tức

    public function getAllNew()
    {
        $product_new = $this->repository->getAllproductNew();
        $product_type = $this->repository->getProductType();
        return view('layout_index.page.view_all_new', compact('product_type', 'product_new'));
    }
    public function getAllSale()
    {
        $product_type = $this->repository->getProductType();
        $product_sale = $this->repository->getAllProductSale();
        return view('layout_index.page.view_all_sale', compact('product_type', 'product_sale'));
    }
    public function getAllHighlights()
    {
        $product_type = $this->repository->getProductType();
        $product_highlights = $this->repository->getAllproductHighlights();
        return view('layout_index.page.view_all_highlights', compact('product_type', 'product_highlights'));
    }
    // xem tất cả sach theo khuyến mãi , nổi bật

    public function AllBook()
    {
        $product_all = $this->repository->getAllproductbook();
        $product_type = $this->repository->getProductType();
        return view('layout_index.page.all_book', compact('product_all', 'product_type'));
    }
    // xem tất cả cá sách

    public function getMenuType($id)
    {
        $type_name = $this->repository->getProductTypeName($id);
        $product_types = $this->repository->getProductTypeID($id);
        return view('layout_index.page.view_type', compact('product_types', 'type_name'));
    }
    // xem sách của từng thể loại

    public function getMenuCompany($id)
    {
        $company_name = $this->repository->getProductCompanyName($id);
        $product_company = $this->repository->getProductCompanyID($id);
        return view('layout_index.page.product_company', compact('product_company', 'company_name'));
    }

    public function getIntroduce()
    {
        return view('layout_index.page.about');
    }

    public function getLogin()
    {
        return view('layout_index.page.login');
    }

    public function postComment($id, Request $request)
    {
        $this->repository->postComment($id, $request);
        return redirect()->back();
    }

    public function postRating($id, Request $request)
    {
        $this->repository->postRating($id, $request);
        return redirect()->back();
    }

    public function postLogin(Request $request)
    {
        $credentaials = array('username' => $request->username, 'password' => $request->password);
        if (Auth::attempt($credentaials)) {
            return redirect()->back()->with(['flag' => 'success', 'messege' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'messege' => 'Đăng nhập không thành công']);
        }
    }

    public function getSearch(Request $req)
    {
        $search = $this->repository->getSearch($req);
        return view('layout_index.page.search', compact('search'));
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function getCart()
    {
        return view('layout_index.page.cart');
    }

    public function getAddCart(Request $request, $id)
    {
        return $this->repository->getAddCart($request, $id);
    }

    public function updateCart(Request $request)
    {
        return $this->repository->postCart($request);
    }

    public function getDelcart($id)
    {
        return $this->repository->getDelcart($id);
    }

    public function getSignup()
    {
        return view('layout_index.page.register');
    }

    public function postSignup(PageRequest $request)
    {
        $this->repository->createuser($request);
        return redirect()->back()->with(['flag' => 'warning', 'message' => 'Một mail yêu cầu xác nhận tài khoản đã được gửi đến Gmail của bạn.']);
    }

    public function postVerifyAccount($id)
    {
        $this->repository->VerifyAccount($id);
        return redirect('signup')->with(['flag' => 'success', 'message' => 'Đăng ký thành công.']);
    }

    public function getRead($id)
    {
        $product_detail = $this->repository->getProduct($id);
        $pdf = $this->repository->getRead($id);
        return view('layout_index.page.Read_book', compact('pdf','product_detail'));
    }

    public function getCheckout()
    {
        $cart = Session::get('cart');
        $product_name = '';
        $product_quantity = '';
        $status = 'true';
        if (isset($cart)) {
            foreach ($cart->items as $key => $value) {
                $stored_product = Store::where('id_product', $key)
                    ->value('stored_product');
                if ($stored_product - $value['qty'] < 0) {
                    $product_name = $value['item']['name'];
                    $product_quantity = $stored_product;
                    $status = 'false';
                    break;
                }
            }
        }
        if ($status == 'true') {
            if (Auth::check()) {
                $name = Auth::user()->full_name;
                $email = Auth::user()->email;
                $address = Auth::user()->address;
                $phone = Auth::user()->phone;
            } else {
                $name = "";
                $email = "";
                $address = "";
                $phone = "";
            }
            return view('layout_index.page.checkout', compact('name', 'email', 'address', 'phone'));
        } else
            return back()->withErrors(['Sách "' . $product_name . '" chỉ còn lại ' . $product_quantity . ' sản phẩm!']);
    }

    public function postCheckout(Request $request)
    {
        if(Session::get('cart')){
            $this->repository->postCheckout($request);
            return redirect()->back()->with(['flag' => 'success', 'messege' => 'Đặt hàng thành công, một Mail đã được gửi đến Gmail của quý khách!!!']);
        }else {
            return redirect()->back()->with(['flag' => 'danger', 'messege' => 'Không tồn tại sản phẩm']);
        }
    }

    public function getAdmin()
    {
        return redirect(route('companies.index'));
        // $data["fetchTotalVisitorsAndPageViews"] = Analytics::fetchTotalVisitorsAndPageViews(Period::days(9));
        // $user = $this->repository->getAll();
        // $product = $this->repository->allBookAdm();
        // $store = $this->repository->getAllstore();
        // $company_name = $this->repository->getAllCompany();
        // $bill_by_company_id = $this->repository->getBillByCompanyId();
        // $listDay = Date::getListDayInMonth();  
        // $revenueMonthDone = Bill::whereMonth('created_at',date('m'))
        //     ->select(DB::raw('sum(total) as totalMoney'), DB::raw('DATE(created_at) day'))
        //     ->groupBy('day')
        //     ->get()
        //     ->toArray();
        // $revenueMonthPending = Bill::whereMonth('created_at',date('m'))
        //     ->select(DB::raw('sum(total) as totalMoney'), DB::raw('DATE(created_at) day'))
        //     ->groupBy('day')
        //     ->get()
        //     ->toArray();

        // $arrRevenueMonthDone = [];
        // $arrRevenueMonthPending = [];
        // foreach($listDay as $day){
        //     $total = 0;
        //     foreach ($revenueMonthDone as $key => $revenue) {
        //         if($revenue['day'] == $day){
        //             $total = $revenue['totalMoney'];
        //             break;
        //         }
        //     }
        //     $arrRevenueMonthDone[] = (int)$total;
        //     $total = 0;
        //     foreach ($revenueMonthPending as $key => $revenue) {
        //         if($revenue['day'] == $day){
        //             $total = $revenue['totalMoney'];
        //             break;
        //         }
        //     }
        //     $arrRevenueMonthPending[] = (int)$total;
        // }     
        // $viewData = [
        //     'bill_by_company_id'        => $bill_by_company_id,
        //     'company_name'              => $company_name,
        //     'product'                   => $product,
        //     'user'                      => $user,
        //     'store'                     => $store,
        //     'listDay'                   => json_encode($listDay),
        //     'arrRevenueMonthDone'       => json_encode($arrRevenueMonthDone),
        //     'arrRevenueMonthPending'    => json_encode($arrRevenueMonthPending)
        // ];
        // return view('layout_admin.index_admin',$viewData, $data);
    }

    public function getInfo($id)
    {
        $customer = $this->repository->getInfo($id);
        $bill = $this->repository->getBill();
        return view('layout_index.customer.info', compact('customer', 'bill'));
    }

    public function changeInfo(Request $request, $id)
    {
        $this->repository->changeInfo($request, $id);
        return redirect()->back()->with('thongbao', 'Cập nhật thông tin thành công');
    }

    public function updatePassword(UserRequest $request, $id)
    {
        $this->repository->updatePassword($request, $id);
        return redirect()->back()->with('thongbao', 'Đổi mật khẩu thành công');
    }

    public function changeLanguage($language)
    {
        Session::put('language', $language);
        return redirect()->back();
    }
}
