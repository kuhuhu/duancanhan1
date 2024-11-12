<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Session;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    private $admin;

    public function __construct()
    {
        $this->admin = new AdminModel();
    }

    public function index()
    {
        $countProduct = $this->admin->getCountProduct();
        $countAccount = $this->admin->getCountAccount();
        $countOrder = $this->admin->getCountOrder();
        $CountPendingOrder = $this->admin->getCountPendingOrder();
        // dd($countAccount, $countOrder, $countProduct, $CountPendingOrder);
        return view('admin.index', compact('countAccount', 'countProduct', 'countOrder', 'CountPendingOrder'));
    }





    //Category--------------------------------------------------------------------------------------------------------------------------------
    public function category()
    {
        $data = $this->admin->getCategory();
        return view('admin.content_layout.category', compact('data'));
    }
    public function delete_category($id)
    {
        $this->admin->delete_category($id);
        return redirect()->route('admin.category');
    }
    public function backup_category($id)
    {
        $this->admin->backup_category($id);
        return redirect()->route('admin.category')->with('msg', 'Bạn đã back up danh mục thành công');
    }
    public function edit_category($id)
    {
        $data = $this->admin->getCategoryEdit($id);
        return view('admin.content_layout.edit_category', compact('data'));
    }
    public function put_edit_category($id, Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);
            $this->admin->put_edit_category($id, $request->name, $imageName);
            return redirect()->route('admin.edit_category', ['id' => $id])->with('msg', 'Bạn đã cập nhật danh mục thành công');

        } else {
            $imageName = $this->admin->getCategoryEdit($id)->image;
            $this->admin->put_edit_category($id, $request->name, $imageName);
            return redirect()->route('admin.edit_category', ['id' => $id])->with('msg', 'Bạn đã cập nhật danh mục thành công');
        }
    }





    //Order--------------------------------------------------------------------------------------------------------------------------------

    public function order()
    {
        $data = $this->admin->getOrder();
        return view('admin.content_layout.order', compact('data'));
    }
    public function update_order(Request $request)
    {
        $id_order = $request->id_order;
        $order_status = $request->order_status;
        $this->admin->updateOrder($id_order, $order_status);
        return redirect()->route('admin.order');
    }









    //Order_details--------------------------------------------------------------------------------------------------------------------------------

    public function order_detail($id)
    {
        $order_details = $this->admin->getOrder_detail($id);
        return view('admin.content_layout.order_detail', compact('order_details'));
    }










    //Account--------------------------------------------------------------------------------------------------------------------------------

    public function account()
    {
        $data = $this->admin->getAccount();
        return view('admin.content_layout.account', compact('data'));
    }
    public function delete_account($id)
    {
        $this->admin->delete_account($id);
        return redirect()->route('admin.account')->with('msg', 'Bạn đã xóa sản phẩm thành công');
    }
    public function backup_account($id)
    {
        $this->admin->backup_account($id);
        return redirect()->route('admin.account')->with('msg', 'Bạn đã back up sản phẩm thành công');
    }
    public function edit_account($id)
    {
        $data = $this->admin->getEditAccount($id);
        return view('admin.content_layout.edit_account', compact('data'));
    }
    public function put_edit_account($id, Request $request)
    {
        $this->admin->put_edit_account($id, $request->username, $request->password, $request->email, $request->tel);
        return redirect()->route('admin.edit_account', ['id' => $id])->with('msg', 'Bạn đã update tài khoản thành công');
    }













    //Product--------------------------------------------------------------------------------------------------------------------------------

    public function product()
    {
        $data = $this->admin->getProduct();
        return view('admin.content_layout.product', compact('data'));
    }
    public function delete_product($id)
    {
        $this->admin->delete_product($id);
        return redirect()->route('admin.product')->with('msg', 'Bạn đã xóa sản phẩm thành công');
    }
    public function add_product()
    {
        $data2 = $this->admin->getCategory();

        return view('admin.content_layout.add_product', compact('data2'));
    }
    public function post_add_product(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255|unique:product',
            'id_category' => 'required|exists:category,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_description.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'price_sale' => 'numeric',
            'size38' => 'numeric',
            'size39' => 'numeric',
            'size40' => 'numeric',
            'size41' => 'numeric',
            'size42' => 'numeric',
            'description' => 'required|string',
        ];

        $messages = [
            'name.required' => 'Trường Tên sản phẩm không được để trống.',
            'name.max' => 'Tên sản phẩm không được vượt quá :max ký tự.',
            'name.unique' => 'Tên sản phẩm đã tồn tại trong cơ sở dữ liệu.',
            'id_category.required' => 'Vui lòng chọn Danh mục.',
            'id_category.exists' => 'Danh mục đã chọn không hợp lệ.',
            'image.required' => 'Vui lòng chọn ảnh.',
            'image.image' => 'Tệp được chọn phải là ảnh.',
            'image.mimes' => 'Định dạng ảnh phải là jpeg, png, jpg, gif hoặc svg.',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
            'image_description.*.image' => 'Tệp được chọn phải là ảnh.',
            'image_description.*.mimes' => 'Định dạng ảnh phải là jpeg, png, jpg, gif hoặc svg.',
            'image_description.*.max' => 'Kích thước ảnh không được vượt quá 2MB.',
            //
        ];
        $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);
            $id = $this->admin->post_add_product($request->name, $request->id_category, $request->price, $request->price_sale, $request->description, $imageName);
            $this->admin->post_edit_product_size($id, $request->size38, $request->size39, $request->size40, $request->size41, $request->size42);
            $image_description = $request->file('image_description');
            foreach ($image_description as $data) {
                $image_descriptionName = uniqid() . '.' . $data->getClientOriginalExtension();
                $data->move(public_path('upload'), $image_descriptionName);
                $this->admin->post_edit_product_image($id, $image_descriptionName);
            }
            return redirect()->route('admin.product')->with('msg', 'Bạn đã thêm sản phẩm thành công');
        }
    }
    public function backup_product($id)
    {
        $this->admin->backup_product($id);
        return redirect()->route('admin.product')->with('msg', 'Bạn đã back up sản phẩm thành công');
    }
    public function edit_product($id)
    {
        $data = $this->admin->getProductEdit($id);
        $data2 = $this->admin->getCategory();
        $image = $this->admin->getImageProduct($id);
        // dd($image[0]);
        return view('admin.content_layout.edit_product', compact('data', 'data2', 'image'));
    }
    public function put_edit_product($id, Request $request)
    {
        if ($request->hasFile('image') && $request->hasFile('image_description')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $imageName);
            $this->admin->put_edit_product($request->id, $request->name, $request->id_category, $request->price, $request->price_sale, $request->description, $imageName);
            $this->admin->put_edit_product_size($request->id, $request->size38, $request->size39, $request->size40, $request->size41, $request->size42);
            $image_description = $request->file('image_description');
            $get_image_description = $this->admin->getImageProduct($id);
            foreach ($get_image_description as $key => $data) {
                $image_descriptionName = uniqid() . '.' . $image_description[$key]->getClientOriginalExtension();
                $image_description[$key]->move(public_path('upload'), $image_descriptionName);
                $this->admin->put_edit_product_image($data->id, $id, $image_descriptionName);
            }
            return redirect()->route('admin.edit_product', ['id' => $id])->with('msg', 'Bạn đã cập nhật sản phẩm thành công');

        } else if ($request->hasFile('image_description')) {
            $image_description = $request->file('image_description');
            $get_image_description = $this->admin->getImageProduct($id);
            foreach ($get_image_description as $key => $data) {
                $image_descriptionName = uniqid() . '.' . $image_description[$key]->getClientOriginalExtension();
                $image_description[$key]->move(public_path('upload'), $image_descriptionName);
                $this->admin->put_edit_product_image($data->id, $id, $image_descriptionName);
            }
            $imageName = $this->admin->getProductEdit($id)->image;
            $this->admin->put_edit_product($request->id, $request->name, $request->id_category, $request->price, $request->price_sale, $request->description, $imageName);
            $this->admin->put_edit_product_size($request->id, $request->size38, $request->size39, $request->size40, $request->size41, $request->size42);
            return redirect()->route('admin.edit_product', ['id' => $id])->with('msg', 'Bạn đã cập nhật sản phẩm thành công');
        } else {
            $get_image_description = $this->admin->getImageProduct($id);
            foreach ($get_image_description as $data) {
                $this->admin->put_edit_product_image($data->id, $id, $data->image_description);
            }
            $imageName = $this->admin->getProductEdit($id)->image;
            $this->admin->put_edit_product($request->id, $request->name, $request->id_category, $request->price, $request->price_sale, $request->description, $imageName);
            $this->admin->put_edit_product_size($request->id, $request->size38, $request->size39, $request->size40, $request->size41, $request->size42);
            return redirect()->route('admin.edit_product', ['id' => $id])->with('msg', 'Bạn đã cập nhật sản phẩm thành công');
        }
    }

}
