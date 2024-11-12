@include('admin.page_layout.header')
@include('admin.page_layout.menu')
@include('admin.page_layout.sidebar')

@yield('category')
@yield('product')
@yield('account')
@yield('order_detail')
@yield('order')
@yield('edit_account')
@yield('edit_category')
@yield('edit_product')
@yield('add_product')
@yield('add_account')


{{-- @include('admin.page_layout.footer') --}}
