<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
    use HasFactory;

    // sử lý câu lệnh product-------------------------------------------------------
    public function getTop10Product()
    {
        return DB::table('product')
            ->orderBy('view', 'desc')
            ->take(10)
            ->where('isdelete', 0)
            ->get(); // lấy top 10 sản phẩm có nhiều lượt xem nhất

    }
    public function getAllProduct()
    {
        return DB::table('product')
            ->where('isdelete', 0)
            ->get(); // lấy tất cả sản phẩm

    }
    public function getTop10NewProduct()
    {
        return DB::table('product')
            ->orderBy('creat_at_product', 'desc')
            ->where('isdelete', 0)
            ->take(10)
            ->get();// lấy top 10 sản phẩm mới nhất

    }

    public function getInfoProduct($id)
    {
        return DB::table('product')
            ->join('image_products', 'image_products.id_product', '=', 'product.id')
            ->join('size_products', 'size_products.id_product', '=', 'product.id')
            ->where('product.id', $id)
            ->get();
    }
    public function getProductOfCategory($id)
    {
        return DB::table('product')
            ->where('id_category', $id)
            ->where('isdelete', 0)
            ->get();
    }






    //----------------------------------------------------------------------------------------------------------------------------------------
    // sử lý câu lệnh category--------------------------------------------------------
    public function getQuantityCategory()
    {
        return DB::table('product')
            ->selectRaw('count(id_category) as quantity, category.name, category.image')
            ->groupBy('category.name', 'category.image')
            ->join('category', 'product.id_category', '=', 'category.id')
            ->where('product.isdelete', 0)
            ->get(); //lấy ra sỗ lượng của mỗi danh mục
    }
    public function updateProductAfterPayment($id_product, $quantity, $size)
    {
        if ($size == 38) {
            return DB::table('size_products')
                ->where('id_product', $id_product)
                ->decrement('size38', $quantity);
        } else if ($size == 39) {
            return DB::table('size_products')
                ->where('id_product', $id_product)
                ->decrement('size39', $quantity);
        } else if ($size == 40) {
            return DB::table('size_products')
                ->where('id_product', $id_product)
                ->decrement('size40', $quantity);
        } else if ($size == 41) {
            return DB::table('size_products')
                ->where('id_product', $id_product)
                ->decrement('size41', $quantity);
        } else {
            return DB::table('size_products')
                ->where('id_product', $id_product)
                ->decrement('size42', $quantity);
        }

    }







    //----------------------------------------------------------------------------------------------------------------------------------------
    // sử lý câu lệnh account----------------------------------------------------------
    public function addAccount($data)
    {
        return DB::insert('insert into account (username,tel,email,password,creat_at_account, role) values (?,?,?,?,?,?)', $data);
    }
    public function checkAccount($username, $password)
    {
        return DB::table('account')
            ->select('*')
            ->where([
                ['username', $username],
                ['password', $password],
                ['isdelete', 0],
            ])
            ->get();
    }
    public function getAccount($username)
    {
        return DB::table('account')
            ->where('username', [$username])
            ->where('isdelete', 0)
            ->get();
    }

    public function reset_password($password, $id_account)
    {
        $data = array_merge($password, [$id_account]);
        dd($data);
        return DB::update("UPDATE account SET password = ?  WHERE id = ?", $data);

    }





    //----------------------------------------------------------------------------------------------------------------------------------------
    // sử lý câu lệnh comment

    public function getComment($id)
    {
        return DB::table('comment')
            ->join('account', 'comment.id_user', '=', 'account.id')
            ->where('comment.id_product', $id)
            ->get();
    }
    public function postComment($content, $id_user, $id_product)
    {

        return DB::table('comment')->insert([
            'content' => $content,
            'id_user' => $id_user,
            'id_product' => $id_product,
            'creat_at_comment' => date('Y-m-d H:i:s')
        ]);
    }





    //----------------------------------------------------------------------------------------------------------------------------------------
    // sử lý câu lệnh cart
    public function getCart($id_user)
    {
        return DB::table('cart')
            ->select('product.name', 'cart.id', 'product.price', 'product.price_sale', 'cart.quantity', 'cart.size', 'product.image')
            ->join('product', 'product.id', '=', 'cart.id_product')
            ->where('cart.id_user', $id_user)
            ->get();
    }
    public function getCartProduct($id)
    {
        return DB::table('cart')
            ->where('id', '=', $id)
            ->first();
    }
    public function addCart($id_user, $id_product, $quantity, $size)
    {

        return DB::table('cart')->insert([
            'id_user' => $id_user,
            'id_product' => $id_product,
            'quantity' => $quantity,
            'size' => $size
        ]);
    }







    //----------------------------------------------------------------------------------------------------------------------------------------
    // sử lý câu lệnh order details
    public function deleteCart($id_cart)
    {
        return DB::table('cart')
            ->where('id', $id_cart)
            ->delete();
    }
    public function addOrderDetail($id_product, $id_order, $quantity, $size)
    {
        return DB::table('order_details')->insert([
            'id_product' => $id_product,
            'id_order' => $id_order,
            'quantity' => $quantity,
            'size' => $size
        ]);
    }








    // sử lý câu lệnh order

    public function addOrder($id_user, $username, $address, $order_status, $order_payment, $payment_type, $total_amount)
    {
        return DB::table('order')->insertGetId(
            [
                'id_user' => $id_user,
                'username' => $username,
                'address' => $address,
                'creat_at_order' => date('Y-m-d H:i:s'),
                'order_status' => $order_status,
                'order_payment' => $order_payment,
                'payment_type' => $payment_type,
                'total_amount' => $total_amount

            ]
        );
    }
    public function getOrder($id_user)
    {
        return DB::table('order')
            ->where('isdelete', 0)
            ->where('order.id_user', $id_user)
            ->orderBy('creat_at_order', 'desc')
            ->get();
    }







    // sử lý câu lệnh address_account
    public function getDefaultAddress($id_user)
    {
        return DB::table('address_account')
            ->where('id_user', $id_user)
            ->where('role', 1)
            ->where('isdelete', 0)
            ->first();
    }
    public function getOtherAddress($id_user)
    {
        return DB::table('address_account')
            ->where('id_user', $id_user)
            ->where('role', '=', 0)
            ->where('isdelete', 0)
            ->get();
    }
    public function getAddress($id)
    {
        return DB::table('address_account')
            ->select('address', 'name')
            ->where('id', $id)
            ->where('isdelete', 0)
            ->first();
    }
    public function addAddress_Account($id_user, $name, $role, $tel_address, $address)
    {
        return DB::table('address_account')->insert([
            'id_user' => $id_user,
            'name' => $name,
            'role' => $role,
            'tel_address' => $tel_address,
            'address' => $address,
            'creat_at_address' => date('Y-m-d H:i:s')
        ]);
    }
    public function deleteAddress($id)
    {
        return DB::table('address_account')
            ->where('id', $id)
            ->delete();
    }









    //sử lí câu lệnh wishlist
    public function addWishList($id_product, $id_user)
    {

        return DB::table('wishlist')->insert([
            'id_user' => $id_user,
            'id_product' => $id_product,
            'creat_at_wishlist' => date('Y-m-d H:i:s')

        ]);
    }

    public function getCountWishList($id_user)
    {
        return DB::table('wishlist')
            ->select(DB::raw('count(wishlist.id) as countWishlist'), 'wishlist.id_user')
            ->join('product', 'product.id', '=', 'wishlist.id_product')
            ->where('wishlist.id_user', $id_user)
            ->groupBy('wishlist.id_user')
            ->orderBy('creat_at_wishlist', 'desc')
            ->get();

    }
    public function getWishList($id_user)
    {
        return DB::table('wishlist')
            ->join('product', 'product.id', '=', 'wishlist.id_product')
            ->where('wishlist.id_user', $id_user)
            ->orderBy('creat_at_wishlist', 'desc')
            ->get();

    }






}
