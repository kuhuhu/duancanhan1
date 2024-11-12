<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
    {
        // $account = Session::get('id_account');
        $link_img = asset('upload');
        $spnoibat = $this->user->getTop10Product();
        $spmoinhat = $this->user->getTop10NewProduct();
        $danhmuc = $this->user->getQuantityCategory();

        return view('index', compact('spnoibat', 'spmoinhat', 'link_img', 'danhmuc'));
    }




    //----------------------------------------------------------------------------------------------------------------------------------------
    //luồng đặt hàng
    public function product_detail($id)
    {
        $infoProduct = $this->user->getInfoProduct($id);

        $productOfCategory = $this->user->getProductOfCategory($infoProduct[0]->id_category);
        $allComment = $this->user->getComment($id);
        return view('user.content-layout.order_flow.product_details', compact('infoProduct', 'productOfCategory', 'allComment'));
    }
    public function cart()
    {
        $total = 0;
        $idAccount = Session::get('id_account');
        $cartMemory = [];
        $cart = $this->user->getCart($idAccount);
        return view('user.content-layout.order_flow.cart', compact('cart', 'total', 'cartMemory'));
    }
    public function post_cart(Request $request)
    {
        if ($request->quantity_remaining <= 0) {
            return redirect()->route('user.product_detail', ['id' => $request->id_product])->with('msg', 'Size sản phẩm này đã hết hàng. Vui lòng chọn size khác');
        }

        $idAccount = Session::get('id_account');
        $sizeProduct = $request->size_product;
        if ($idAccount == null) {
            return redirect()->route('user.login')->with('msg', 'Vui lòng đăng nhập');
        }

        if ($sizeProduct == null) {
            return redirect()->route('user.product_detail', ['id' => $request->id_product])->with('msg', 'Bạn vui lòng chọn size!!');
        } else {
            $this->user->addCart($idAccount, $request->id_product, $request->quantity_product, $request->size_product);
            return redirect()->route('user.cart');
        }

    }
    public function delete_cart($id_cart)
    {
        $this->user->deleteCart($id_cart);
        return redirect()->route('user.cart');
    }
    public function address()
    {
        if (Session::get('addressdefault') == null && count(Session::get('addressother')) == 0) {
            return redirect()->route('user.billing_details')->with('msg', 'Bạn chưa có địa chỉ, hãy tạo địa chỉ mới');
        } else if (Session::has('price')) {
            $price = Session::get('price');
            $id_cart = Session::get('id_cart');
            $pricesale = Session::get('pricesale');
            $sale = Session::get('sale');
            $idAccount = Session::get('id_account');
            $addressdefault = $this->user->getDefaultAddress($idAccount);
            $addressother = $this->user->getOtherAddress($idAccount);
            return view('user.content-layout.order_flow.address', compact('id_cart', 'addressother', 'addressdefault', 'price', 'pricesale', 'sale'));
        } else {
            return redirect()->route('user.cart')->with('msg', 'Bạn chưa chọn sản phẩm nào!');
        }
    }
    public function delete_address($id)
    {
        $this->user->deleteAddress($id);
        return redirect()->route('user.address')->with('msg', 'bạn đã xóa địa chỉ thành công');
    }
    public function post_address(Request $request)
    {
        Session::put('id_cart', $request->cartMemory);
        $idAccount = Session::get('id_account');
        $id_cart = Session::get('id_cart');
        $addressdefault = $this->user->getDefaultAddress($idAccount);
        $addressother = $this->user->getOtherAddress($idAccount);
        Session::put([
            'addressdefault' => $addressdefault,
            'price' => $request->price,
            'pricesale' => $request->pricesale,
            'sale' => $request->sale,
            'addressother' => $addressother
        ]);

        if ($id_cart == []) {
            return redirect()->route('user.cart')->with('msg', 'Bạn chưa chọn sản phẩm');
        } else {

            return redirect()->route('user.address');
        }
    }
    public function payment_method()
    {
        if (Session::has(key: 'address')) {
            $idAccount = Session::get('id_account');
            $address = Session::get('address');
            $price = Session::get('price');
            $pricesale = Session::get('pricesale');
            $sale = Session::get('sale');
            $account = Session::get('account');
            return view('user.content-layout.order_flow.payment_method', compact('address', 'idAccount', 'price', 'pricesale', 'sale'));
        } else {
            return redirect()->route('user.cart')->with('msg', 'Bạn chưa chọn sản phẩm nào!');
        }
    }
    public function post_payment_method(Request $request)
    {

        $idAddress = $request->flexRadioDefault;
        $address = $this->user->getAddress($idAddress);
        Session::put('address', $address);
        $pricesale = intval(Session::get('pricesale'));
        return redirect()->route('user.payment_method');
    }
    public function billing_details()
    {
        $price = Session::get('price');
        $pricesale = Session::get('pricesale');
        $sale = Session::get('sale');
        return view('user.content-layout.order_flow.billing_details', compact('price', 'pricesale', 'sale'));
    }
    public function post_billing_details(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'tel_address' => 'required|string|regex:/^[0-9]{10,15}$/',
            'address' => 'required|string|max:255',
        ];

        $messages = [
            'name.required' => 'Vui lòng nhập tên người nhận.',
            'name.string' => 'Tên người nhận phải là một chuỗi ký tự.',
            'name.max' => 'Tên người nhận không được vượt quá 255 ký tự.',

            'tel_address.required' => 'Vui lòng nhập số điện thoại.',
            'tel_address.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'tel_address.regex' => 'Số điện thoại phải có độ dài từ 10 đến 15 chữ số và chỉ chứa chữ số.',

            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];
        $request->validate($rules, $messages);
        $idAccount = Session::get('id_account');
        $addressdefault = $this->user->getDefaultAddress($idAccount);
        if ($addressdefault == null) {
            $role = 1;
            $this->user->addAddress_Account($idAccount, $request->name, $role, $request->tel_address, $request->address);
            Session::put('addressdefault', $this->user->getDefaultAddress($idAccount));
        } else {
            $role = 0;
            $this->user->addAddress_Account($idAccount, $request->name, $role, $request->tel_address, $request->address);
            Session::put('addressother', $this->user->getOtherAddress($idAccount));
        }
        return redirect()->route('user.address');
    }

    public function payment_success(Request $request)
    {
        $pricesale = Session::get('pricesale');
        $pricesale = str_replace('.', '', $pricesale); // "1734,58"
        $pricesale_float = floatval($pricesale); // 1734.58
        $pricesale_int = intval($pricesale_float); // 1734
        $idAccount = Session::get('id_account');
        $address = Session::get('address')->address;
        $username = Session::get('address')->name;
        $id_cart = Session::get('id_cart');
        $order_status = 1;
        $order_payment = 1;
        $payment_type = 1;
        $id_order = $this->user->addOrder($idAccount, $username, $address, $order_status, $order_payment, $payment_type, $pricesale_int);
        $id_product = [];

        foreach ($id_cart as $item) {
            $product = $this->user->getCartProduct($item);
            $id_product[] = $product;

        }
        foreach ($id_product as $item) {
            $this->user->addOrderDetail($item->id_product, $id_order, $item->quantity, $item->size);
            $this->user->deleteCart($item->id);
            $this->user->updateProductAfterPayment($item->id_product, $item->quantity, $item->size);
        }

        Session::forget('id_cart');
        Session::forget('addressother');
        Session::forget('price');
        Session::forget('pricesale');
        Session::forget('sale');

        return view('user.content-layout.order_flow.payment_success');
    }






    //----------------------------------------------------------------------------------------------------------------------------------------
    //login
    public function login()
    {
        return view('user.content-layout.login.login');
    }
    public function regiser()
    {
        return view('user.content-layout.login.regiser');
    }
    public function reset_password()
    {
        return view('user.content-layout.login.reset_password');
    }
    //--------------------sử lý post--------------------------------
    public function post_regiser(Request $request)
    {
        $rules = [
            'username' => 'required|string|min:6|max:255|unique:account', // Kiểm tra username không được trùng lặp trong bảng users
            'password' => 'required|string|min:8|max:255', // Mật khẩu ít nhất 8 ký tự
            'tel' => 'required|string|max:20', // Số điện thoại không quá 20 ký tự
            'email' => 'required|email|max:255|unique:account', // Kiểm tra email không được trùng lặp trong bảng users
        ];

        $messages = [
            'username.required' => 'Vui lòng nhập tên người dùng.',
            'username.min' => 'Tên người dùng phải có ít nhất 6 ký tự.',
            'username.max' => 'Tên người dùng không được quá 255 ký tự.',
            'username.unique' => 'Tên người dùng đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.max' => 'Mật khẩu không được quá 255 ký tự.',
            'tel.required' => 'Vui lòng nhập số điện thoại.',
            'tel.max' => 'Số điện thoại không được quá 20 ký tự.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.max' => 'Địa chỉ email không được quá 255 ký tự.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
        ];
        $request->validate($rules, $messages);

        $data = [
            $request->username,
            $request->tel,
            $request->email,
            $request->password,
            date('Y-m-d H:i:s'),
            0
        ];

        $this->user->addAccount($data);
        return redirect()->route('user.login')->with('msg', 'Bạn đã đăng ký thành công - hãy đăng nhập tài khoản của bạn');

    }
    public function post_login(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',

        ];

        $messages = [
            'username.required' => 'Vui lòng nhập tên người dùng.',
            'username.max' => 'Tên người dùng không được quá 255 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.max' => 'Mật khẩu không được quá 255 ký tự.',
        ];
        $request->validate($rules, $messages);

        $username = $request->username;
        $password = $request->password;

        $checkUser = $this->user->checkAccount($username, $password);
        if (count($checkUser) === 0) {
            return redirect()->route('user.login')->with('msg', 'Không tồn tại người dùng này, vui lòng đăng nhập lại');
        } else {
            $data = $this->user->getAccount($username);
            Session::put('id_account', $data[0]->id);
            if (Session::get('id_account') == 1) {
                return redirect()->route('admin')->with('msg', 'Bạn đã đăng nhập tài khoản quản trị thành công');
            } else {
                return redirect()->route('homepage')->with('msg', 'Bạn đã đăng nhập tài khoản người dùng thành công');

            }
        }
    }
    public function post_reset_password(Request $request)
    {
        $rules = [
            'newpassword' => 'required|min:8|confirmed',
            'confirmpassword' => 'required|min:8',
        ];

        $messages = [
            'newpassword.required' => 'Vui lòng nhập mật khẩu mới.',
            'newpassword.min' => 'Mật khẩu mới phải chứa ít nhất :min ký tự.',
            'newpassword.confirmed' => 'Mật khẩu mới không khớp với mật khẩu xác nhận.',
            'confirmpassword.required' => 'Vui lòng nhập lại mật khẩu mới.',
            'confirmpassword.min' => 'Mật khẩu mới phải chứa ít nhất :min ký tự.',
        ];
        $request->validate($rules, $messages);
        // $id =
        $password = $request->newpassword;
        // $this->user->reset_password($password, )
    }









    //----------------------------------------------------------------------------------------------------------------------------------------
    //accout
    public function account_profile()
    {
        return view('user.content-layout.account.account_profile');
    }
    public function account_orders()
    {
        $order = $this->user->getOrder(Session::get('id_account'));
        return view('user.content-layout.account.account_orders', compact('order'));
    }
    public function account_dashboard()
    {
        return view('user.content-layout.account.account_dashboard');
    }
    public function account_saved_address()
    {
        return view('user.content-layout.account.account_saved_address');
    }
    public function account_edit_profile()
    {
        return view('user.content-layout.account.account_edit_profile');
    }









    //----------------------------------------------------------------------------------------------------------------------------------------
    //công cụ tiện ích
    public function search()
    {
        return view('user.content-layout.extensions.search');
    }
    public function shop_grid_type_5()
    {
        $allProduct = $this->user->getAllProduct();
        return view('user.content-layout.extensions.shop_grid_type_5', compact('allProduct'));
    }
    public function shop_grid()
    {
        return view('user.content-layout.extensions.shop_grid');
    }
    public function wishlist()
    {
        $id_user = Session::get('id_account');
        $wishlist = $this->user->getWishList($id_user);
        $countWishlist = $this->user->getCountWishList($id_user);
        return view('user.content-layout.extensions.wishlist', compact('wishlist', 'countWishlist'));
    }
    public function post_wishlist($id)
    {
        $id_user = Session::get('id_account');
        $this->user->addWishList($id, $id_user);
        return redirect()->route('user.wishlist');
    }
    public function post_comment(Request $request, $id)
    {
        $account = Session::get('id_account');
        if ($account == null) {
            return redirect()->route('user.login')->with('msg', 'Vui lòng đăng nhập');
        } else {
            $this->user->postComment($request->comment, $account, $id);
            return redirect()->route('user.product_detail', ['id' => $id]);

        }

    }





}
