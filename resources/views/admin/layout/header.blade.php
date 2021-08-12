<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="shortcut icon" href="img/favicon.html">

  <title>Admin Index</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('public/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{ asset('public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
  <link rel="stylesheet" href="{{ asset('public/admin/css/owl.carousel.css')}}" type="text/css">

  <!--right slidebar-->
  <link href="{{ asset('public/admin/css/slidebars.css')}}" rel="stylesheet">
  <!-- Yamm styles-->
  <link href="{{ asset('public/admin/css/yamm.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link href="{{ asset('public/admin/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('public/admin/css/style-responsive.css')}}" rel="stylesheet" />
  </head>
  <body>
    <section id="container">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips menu-button1" data-placement="right" data-original-title="Toggle Navigation"></div>
          </div>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="{{asset('/')}}">SmartOsc</a>
          </div>
          <div class="collapse navbar-collapse yamm " id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
              <li ><a href="{{asset('admin')}}">Home</a></li>
              <li><a href="{{asset('admin/category/list')}}">Categories</a></li>
              <li><a href="{{asset('admin/brand/list')}}">Brands</a></li>
              <li><a href="{{asset('admin/product/list')}}">Products</a></li>
              <li><a href="{{asset('admin/user/list')}}">Users</a></li>
              <li><a href="{{asset('admin/review')}}">Reviews</a></li>
              <li><a href="{{asset('admin/order')}}">Orders</a></li>
              <li><a href="{{asset('admin/banner/list')}}">Banner Ads</a></li>
              <li><a href="{{asset('admin/report')}}">Reports</a></li>
              <li><a href="{{asset('admin/config')}}">Customs</a></li>

              <li><form class="navbar-form navbar-right" method="get" action="{{ asset('admin/brand/list') }}">
                <div class="input-group">
                  <input type="text" name="se" class="form-control" placeholder="Search Brand">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
<div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
  <ul class="sidebar-menu" id="nav-accordion">
    <li><form action="{{ asset('admin/product/list') }}" method="get">
      <div class="input-group">
        <input type="text" name="pro_search" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" name="submit" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </li>
  <li>
    <a class="active" href="{{asset('admin')}}">
      <i class="fa fa-dashboard"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-book"></i>
      <span>Listing</span>
    </a>
    <ul class="sub">
     <li><a href="{{asset('admin/category/list')}}">Categories</a></li>
     <li><a href="{{asset('admin/brand/list')}}">Brands</a></li>
     <li><a href="{{asset('admin/product/list')}}">Products</a></li>
     <li><a href="{{asset('admin/user/list')}}">Users</a></li>
     <li><a href="{{asset('admin/review')}}">Reviews</a></li>
     <li><a href="{{asset('admin/order')}}">Orders</a></li>
     <li><a href="{{asset('admin/banner/list')}}">Banner Ads</a></li>
     <li><a href="{{asset('admin/report')}}">Reports</a></li>
     <li><a href="{{asset('admin/config')}}">Customs</a></li>
   </ul>
 </li>

 <li class="sub-menu">
  <a href="javascript:;" >
    <i class="fa fa-laptop"></i>
    <span>Add News</span>
  </a>
  <ul class="sub">
    <li><a  href="{{asset('admin/product/add')}}">Product</a></li>
    <li><a  href="{{asset('admin/brand/list')}}">Brand</a></li>
    <li><a  href="{{asset('admin/category/add')}}">Category</a></li>
    <li><a  href="{{asset('admin/user/add')}}">User</a></li>
  </ul>
</li>
<li class="active"><a href="{{ asset('logout') }}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</button></a></li>
</ul>
<!-- sidebar menu end-->
</div>
</section>

<!--sidebar end-->
<!-- js placed at the end of the document so the pages load faster -->
