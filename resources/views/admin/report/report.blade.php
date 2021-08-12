@extends('admin.layout.index')
@section('title', 'Report')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </br></br></br></br></br>
            <div class="row state-overview">
                <div class=" col-lg-5 col-md-offset-4 " style="height: 150px">
                    <form method="get" action="{{asset('admin/report/getAll')}}">
                        Start Day: <input name="start" type="date" ></br></br>
                        End Day  :<input name="end" type="date" >
                    <button type="submit">Result</button>
                    </form>
                </div>
                </br></br></br></br></br>

                <div>
                    <div class="col-lg-3 bg-success col-md-offset-2 color-gray">
                        <h3 class="text-center">Best Selling</h3>
                    </div>
                    <div class="col-lg-3 bg-success col-md-offset-2 color-gray">
                        <h3 class="text-center">Best Catagory</h3>
                    </div>
                </div>

              <div class="col-lg-6" style="height:700px">
                  </br></br></br></br></br>
                  @php
                  $dem=5;$duyet=0;
                  for($dem=1;$dem<6;$dem++){ @endphp
                  <div class="col-lg-12">
                    <section class="panel">
                        <div class="symbol red">
                            <h1>
                                @php switch($dem){
                                   case 1: echo $dem.' st'; break;
                                   case 2: echo $dem.' nd'; break;
                                    default: echo $dem.' th'; break;
                                    }
                                @endphp</h1>
                        </div>
                        <div class="value">
                            @php if(isset($selling[$duyet])){ @endphp
                            <h3 class="text-warning top">@php  echo $selling[$duyet]['pro_name'].'</br>'; @endphp</h3>
                              <h4>@php  echo 'Solded :'.$selling[$duyet]['total'].
                                             ' ,Total money :'.$selling[$duyet]['sumMoney'].
                                             ' ,  Price :'.$selling[$duyet]['pro_price']; @endphp</h4>
                                 @php $duyet++; } @endphp
                         </div>
                     </section>
                  </div>
                  @php } @endphp

                </div>

                <div class="col-lg-6 ">
                    </br></br></br></br></br>
                    @php
                        $dem=5;$duyet=0;
                        for($dem=1;$dem<6;$dem++){ @endphp
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="symbol terques">
                                <h1>
                                    @php switch($dem){
                                   case 1: echo $dem.' st'; break;
                                   case 2: echo $dem.' nd'; break;
                                    default: echo $dem.' th'; break;
                                    }
                                    @endphp</h1>
                            </div>
                            <div class="value">
                                @php if(isset($rateCata[$duyet])){ @endphp
                                <h3 class="text-warning top">@php  echo $rateCata[$duyet]['name'].'</br>'; @endphp</h3>
                                <h4>@php  echo 'Solded :'.$rateCata[$duyet]['total'];@endphp</h4>
                                @php $duyet++; } @endphp
                            </div>
                        </section>
                    </div>
                    @php } @endphp

            </div>
            </div>
            <!--state overview end-->

            <div class="row">
                <div class="col-lg-8">
                    <!--custom chart start-->
                    <div class="border-head">
                        </br></br></br>
                        <h3><strong>ORDERS PER MONTH</strong></h3>
                    </div>
                    <div class="col-lg-1">
                        <ul class="y-axis "  >
                            <li><span>10</span></li>
                            <li><span>8</span></li>
                            <li><span>6</span></li>
                            <li><span>4</span></li>
                            <li><span>2</span></li>
                            <li><span>0</span></li>
                        </ul></div>
                    <div class="custom-bar-chart col-lg-8">
                        <div class="bar" >
                            <div class="title">JAN</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[1])) echo $count[1]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[1])) echo (($count[1]/10)*100).'%'; @endphp%</div>
                        </div>
                        <div class="bar ">
                            <div class="title">FEB</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[2])) echo $count[2]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[2])) echo (($count[2]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">MAR</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[3]))echo $count[3]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[3])) echo (($count[3]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">APR</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[4])) echo $count[4]; @endphp" data-toggle="tooltip" data-placement="top">@php   if(isset($count[4])) echo (($count[4]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar">
                            <div class="title">MAY</div>
                            <div class="value tooltips" data-original-title="@php   if(isset($count[5])) echo $count[5]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[5])) echo (($count[5]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">JUN</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[6])) echo $count[6]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[6])) echo  (($count[6]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar">
                            <div class="title">JUL</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[7])) echo $count[7]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[7]))echo (($count[7]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">AUG</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[8])) echo $count[8]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[8]))echo (($count[8]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">SEP</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[9])) echo $count[9]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[9]))echo (($count[9]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">OCT</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[10])) echo $count[10]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[10])) echo (($count[10]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">NOV</div>
                            <div class="value tooltips" data-original-title="@php  if(isset($count[11])) echo $count[11]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[11])) echo (($count[11]/10)*100).'%'; @endphp</div>
                        </div>
                        <div class="bar ">
                            <div class="title">DEC</div>
                            <div class="value tooltips" data-original-title="@php   if(isset($count[12])) echo $count[12]; @endphp" data-toggle="tooltip" data-placement="top">@php  if(isset($count[12])) echo (($count[12]/10)*100).'%'; @endphp</div>
                        </div>
                    </div>
                    <!--custom chart end-->
                </div>

                <!--total earning end-->
            </div>
            </section>
    </section>
@stop