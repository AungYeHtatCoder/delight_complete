<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
 @foreach (Auth::user()->roles as $role)
 @if ($role->title === "Admin")
 <li class="active"><a href="{{ url('/home') }}"><i class="la la-home"></i><span class="menu-title"
    data-i18n="eCommerce Dashboard">Dashboard</span></a>
 </li>
 <li class=" navigation-header"><span data-i18n="Ecommerce">Delight</span><i class="la la-ellipsis-h"
   data-toggle="tooltip" data-placement="right" data-original-title="Ecommerce"></i>
 </li>
 <li class=" nav-item"><a href="{{ url('/full-calendar') }}"><i class="la la-calendar"></i><span class="menu-title"
    data-i18n="Shop">My Content
    Calendar</span></a>
 </li>
 <li class=" nav-item"><a href="{{ url('/clients') }}"><i class="la la-calendar"></i><span class="menu-title"
    data-i18n="Shop">Client
    Calendar</span></a>
 </li>

 <li class=" navigation-header"><span data-i18n="User Interface">User Interface</span><i class="la la-ellipsis-h"
   data-toggle="tooltip" data-placement="right" data-original-title="User Interface"></i>
 </li>
 <li class=" nav-item">
  <a href="#">
   <i class="la la-server"></i>
   <span class="menu-title" data-i18n="Components">UserManagement</span>
  </a>
  <ul class="menu-content">
   <li><a class="menu-item" href="{{ route('admin.permissions.index') }}"><i></i><span
      data-i18n="Alerts">Permission</span></a>
   </li>
   <li><a class="menu-item" href="{{ route('admin.roles.index') }}"><i></i><span data-i18n="Callout">Role</span></a>
   </li>
   <li><a class="menu-item" href="{{ route('admin.users.index') }}"><i></i><span data-i18n="Basic Buttons">Users
     </span></a>
   </li>
   <li><a class="menu-item" href="{{ route('admin.our_clients.index') }}"><i></i><span data-i18n="Basic Buttons">Our
      Clients
     </span></a>
   </li>
  </ul>
 </li>


 <li class=" nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title"
    data-i18n="Form Layouts">ArtManagenment</span></a>
  <ul class="menu-content">
   <li><a class="menu-item" href="{{ url('/plans') }}"><i></i><span data-i18n="Basic Forms">Plans</span></a>
   </li>
   <li><a class="menu-item" href=""><i></i><span data-i18n="Basic Forms">Services</span></a>
   </li>
   <li><a class="menu-item" href="form-layout-horizontal.html"><i></i><span data-i18n="Horizontal Forms">Motion
      Video</span></a>
   </li>
   <li><a class="menu-item" href="{{ url('/samples') }}"><i></i><span data-i18n="Hidden Labels">Service
      Samples</span></a>
   </li>
   <li><a class="menu-item" href="form-layout-form-actions.html"><i></i><span data-i18n="Form Actions">Form
      Actions</span></a>
   </li>
   <li><a class="menu-item" href="form-layout-row-separator.html"><i></i><span data-i18n="Row Separator">Row
      Separator</span></a>
   </li>
   <li><a class="menu-item" href="form-layout-bordered.html"><i></i><span data-i18n="Bordered">Bordered</span></a>
   </li>
   <li><a class="menu-item" href="form-layout-striped-rows.html"><i></i><span data-i18n="Striped Rows">Striped
      Rows</span></a>
   </li>
   <li><a class="menu-item" href="form-layout-striped-labels.html"><i></i><span data-i18n="Striped Labels">Striped
      Labels</span></a>
   </li>
  </ul>
 </li>
 @endif
 @endforeach

 {{-- <li class=" nav-item"><a href="ecommerce-product-detail.html"><i class="la la-list"></i><span class="menu-title"
    data-i18n="Product Detail">Product Detail</span></a>
 </li>
 <li class=" nav-item"><a href="ecommerce-shopping-cart.html"><i class="la la-shopping-cart"></i><span
    class="menu-title" data-i18n="Shopping Cart">Shopping Cart</span></a>
 </li>
 <li class=" nav-item"><a href="ecommerce-checkout.html"><i class="la la-credit-card"></i><span class="menu-title"
    data-i18n="Checkout">Checkout</span></a>
 </li>
 <li class=" nav-item"><a href="ecommerce-order.html"><i class="la la-check-circle-o"></i><span class="menu-title"
    data-i18n="Order">Order</span></a>
 </li>
 <li class=" nav-item"><a href="#"><i class="la la-clipboard"></i><span class="menu-title"
    data-i18n="Invoice">Invoice</span></a>
  <ul class="menu-content">
   <li><a class="menu-item" href="invoice-summary.html"><i></i><span data-i18n="Invoice Summary">Invoice
      Summary</span></a>
   </li>
   <li><a class="menu-item" href="invoice-template.html"><i></i><span data-i18n="Invoice Template">Invoice
      Template</span></a>
   </li>
   <li><a class="menu-item" href="invoice-list.html"><i></i><span data-i18n="Invoice List">Invoice List</span></a>
   </li>
  </ul>
 </li> --}}

 {{-- <li class=" nav-item"><a href="#"><i class="la la-unlock"></i><span class="menu-title"
    data-i18n="Authentication">Authentication</span></a>
  <ul class="menu-content">
   <li><a class="menu-item" href="login-with-bg-image.html" target="_blank"><i></i><span>Login</span></a>
   </li>
   <li><a class="menu-item" href="register-with-bg-image.html" target="_blank"><i></i><span>SignIn</span></a>
   </li>
   <li><a class="menu-item" href="recover-password.html" target="_blank"><i></i><span>Forgot Password</span></a>
   </li>
  </ul>
 </li> --}}

 {{-- <li class=" nav-item"><a href="#"><i class="la la-paste"></i><span class="menu-title" data-i18n="Form Wizard">Form
    Wizard</span></a>
  <ul class="menu-content">
   <li><a class="menu-item" href="form-wizard-circle-style.html"><i></i><span data-i18n="Circle Style">Circle
      Style</span></a>
   </li>
   <li><a class="menu-item" href="form-wizard-notification-style.html"><i></i><span
      data-i18n="Notification Style">Notification Style</span></a>
   </li>
  </ul>
 </li> --}}
</ul>