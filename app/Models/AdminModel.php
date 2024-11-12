<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AdminModel extends Model
{
    use HasFactory;


    //account------------------------------------------------------------------------------------------------------------------------------
    public function getAccount()
    {
        return DB::table('account')
            ->get();
    }
    public function getEditAccount($id)
    {
        return DB::table('account')
            ->where('id', $id)
            ->first();
    }
    public function delete_account($id_account)
    {
        return DB::table('account')
            ->where('id', $id_account)
            ->update(['isdelete' => 1]);
    }
    public function backup_account($id_account)
    {
        return DB::table('account')
            ->where('id', $id_account)
            ->update(['isdelete' => 0]);
    }
    public function put_edit_account($id_account, $username, $password, $email, $tel)
    {
        return DB::table('account')
            ->where('id', $id_account)
            ->update([
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'tel' => $tel,
            ]);
    }

    public function getCountAccount()
    {
        return DB::table('account')
            ->select(DB::raw('count(id) as countAccount'))
            ->first();

    }







    //order------------------------------------------------------------------------------------------------------------------------------
    public function getOrder()
    {
        return DB::table('order')
            ->orderBy('order.creat_at_order', 'desc')
            ->get();
    }
    public function getCountOrder()
    {
        return DB::table('order')
            ->select(DB::raw('count(id) as countOrder'))
            ->first();

    }
    public function getCountPendingOrder()
    {
        return DB::table('order')
            ->select(DB::raw('count(id) as countOrder'))
            ->where('order_status', 4)
            ->first();

    }
    public function updateOrder($id_order, $order_status)
    {
        return DB::table('order')
            ->where('id', $id_order)
            ->update(['order_status' => $order_status]);
    }





    //order_detail------------------------------------------------------------------------------------------------------------------------------
    public function getOrder_detail($id_order)
    {
        return DB::table('order_details')
            ->join('product', 'order_details.id_product', 'product.id')
            ->where('id_order', $id_order)
            ->get();
    }






    //product------------------------------------------------------------------------------------------------------------------------------
    public function getProduct()
    {
        return DB::table('product')
            ->join('category', 'category.id', '=', 'product.id_category')
            ->join('size_products', 'size_products.id_product', '=', 'product.id')
            ->select(
                'product.*',
                'category.name as category_name',
                'size_products.*'
            )

            ->get();
    }
    public function getCountProduct()
    {
        return DB::table('product')
            ->select(DB::raw('count(id) as countProduct'))
            ->first();

    }
    public function getImageProduct($id_product)
    {
        return DB::table('image_products')
            ->where('id_product', $id_product)
            ->get();
    }
    public function getProductEdit($id)
    {
        return DB::table('product')
            ->join('category', 'category.id', '=', 'product.id_category')
            ->join('size_products', 'size_products.id_product', '=', 'product.id')
            ->select(
                'product.*',
                'category.name as category_name',
                'size_products.*'
            )
            ->where('product.id', $id)
            ->first();
    }

    public function delete_product($id_product)
    {
        return DB::table('product')
            ->where('id', $id_product)
            ->update(['isdelete' => 1]);
    }
    public function backup_product($id_product)
    {
        return DB::table('product')
            ->where('id', $id_product)
            ->update(['isdelete' => 0]);
    }
    public function put_edit_product($id_product, $name, $category, $price, $price_sale, $description, $image)
    {
        return DB::table('product')
            ->where('id', $id_product)
            ->update([
                'name' => $name,
                'id_category' => $category,
                'price' => $price,
                'price_sale' => $price_sale,
                'description' => $description,
                'image' => $image,
                'isdelete' => 0
            ]);
    }
    public function put_edit_product_size($id_product, $size38, $size39, $size40, $size41, $size42)
    {
        return DB::table('size_products')
            ->where('id_product', $id_product)
            ->update([
                'size38' => $size38,
                'size39' => $size39,
                'size40' => $size40,
                'size41' => $size41,
                'size42' => $size42,
            ]);
    }
    public function put_edit_product_image($id, $id_product, $image_description)
    {
        return DB::table('image_products')
            ->where('id_product', $id_product)
            ->where('id', $id)
            ->update([
                'image_description' => $image_description,
            ]);
    }
    public function post_add_product($name, $id_category, $price, $price_sale, $description, $image)
    {
        return DB::table('product')->insertGetId([
            'name' => $name,
            'id_category' => $id_category,
            'price' => $price,
            'price_sale' => $price_sale,
            'description' => $description,
            'image' => $image,
            'isdelete' => 0,
            'purchases' => 0,
            'view' => 0,
            'creat_at_product' => date('Y-m-d H:i:s')
        ]);
    }
    public function post_edit_product_size($id_product, $size38, $size39, $size40, $size41, $size42)
    {
        return DB::table('size_products')
            ->insert([
                'size38' => $size38,
                'id_product' => $id_product,
                'size39' => $size39,
                'size40' => $size40,
                'size41' => $size41,
                'size42' => $size42,
            ]);
    }
    public function post_edit_product_image($id_product, $image_desscription)
    {
        return DB::table('image_products')
            ->insert([
                'id_product' => $id_product,
                'image_description' => $image_desscription,
            ]);
    }





    //category------------------------------------------------------------------------------------------------------------------------------
    public function getCategory()
    {
        return DB::table('category')
            ->get();
    }
    public function getCategoryEdit($id)
    {
        return DB::table('category')
            ->where('id', $id)
            ->first();
    }
    public function delete_category($id_Category)
    {
        return DB::table('category')
            ->where('id', $id_Category)
            ->update(['isdelete' => 1]);
    }
    public function backup_category($id_category)
    {
        return DB::table('category')
            ->where('id', $id_category)
            ->update(['isdelete' => 0]);
    }
    public function put_edit_category($id_category, $name, $image)
    {
        return DB::table('category')
            ->where('id', $id_category)
            ->update([
                'name' => $name,
                'image' => $image,
                'isdelete' => 0
            ]);
    }



}
