@extends('front.layout.master')

@section('style')
@endsection

@section('breadcrumb')
<section class="parallax-section single-par" data-scrollax-parent="true">
   <div class="bg par-elem "  data-bg="{{$settings->getFirstMediaUrl('breadcrumb','breadcrumbthumb')}}" data-scrollax="properties: { translateY: '30%' }"></div>
   <div class="overlay op7" style="background: #252525;"></div>
   <div class="container">
       <div class="section-title center-align big-title">
            <h2><span>{{$service->append_name}}</span></h2>
           <span class="section-separator"></span>
       </div>
   </div>
   <div class="header-sec-link">
       <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
   </div>
</section>
@endsection

@section('content')

<section class="gray-bg" id="sec1">
   <div class="container">

       <div class="fl-wrap ">
           <div class="row">
               <div class="col-md-12">
                   <ul id="progressbar" class="no-list-style">
                       <li class="active"><span class="tolt" data-microtip-position="top" data-tooltip="{{trans('lang.seedlings_or_trees')}}">01.</span></li>
                       <li><span class="tolt" data-microtip-position="top" data-tooltip="{{trans('lang.Choose_names')}}">02.</span></li>
                       <li><span class="tolt" data-microtip-position="top" data-tooltip="{{trans('lang.Payment_and_review')}}">03.</span></li>
                       <li><span class="tolt" data-microtip-position="top" data-tooltip="{{trans('lang.Confirmation')}}">04.</span></li>
                   </ul>
                   <div class="bookiing-form-wrap block_box fl-wrap">
                       <!--   list-single-main-item -->
                       <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                           <div class="profile-edit-container">
                               <div class="custom-form">
                                   <form action="{{route('order')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                       <fieldset class="fl-wrap">
                                           <div class="list-single-main-item-title fl-wrap">
                                               <h3>{{trans('lang.choose_seedling')}}</h3>
                                           </div>
                                           <div class="row">
                                               
                                               <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid four-columns-grid">
                                                   @foreach($service->trees as $tree_item )
                                                   @php
                                                      $tree_details = \App\Models\Tree::find($tree_item->tree_id);
                                                   @endphp
                                                   @if($tree_details->getMedia('photo')->count())
                                                   <div class="listing-item">
                                                       <article class="geodir-category-listing fl-wrap">
                                                           <div class="geodir-category-img">
                                                               <div class="geodir-js-favorite_btn info-btn" onclick="getinfo({{$tree_details->id}})"><i class="fal fa-info"></i><span>{{trans('lang.more')}}</span></div>
                                                               <a href="javascript:void(0)" class="geodir-category-img-wrap fl-wrap">
                                                               <img src="{{$tree_details->getFirstMediaUrl('photo','thumb')}}" alt="{{$tree_details->append_title}}"> 
                                                               </a>
                                                           </div>
                                                           <div class="geodir-category-content fl-wrap title-sin_item">
                                                               <div class="geodir-category-content-title fl-wrap" style="padding-top: 0px;padding-bottom: 0px;">
                                                                   <div class="geodir-category-content-title-item">
                                                                       <h3 class="title-sin_map fl-wrap" style="text-align: center;"><a href="javascript:void(0)">{{$tree_details->append_title}}</a></h3>
                                                                       
                                                                   </div>
                                                               </div>
                                                               <div class="geodir-category-text custom-form fl-wrap">
                                                                   <div class="quantity">
                                                                       <div class="quantity-item">
                                                                           <input type="button" value="-" class="minus">
                                                                           <input type="text"    name="quantity[]"  title="Qty" class="qty color-bg" min="0" max="{{$tree_item->target}}" data-step="1" value="0">
                                                                           <input type="button" value="+" class="plus">
                                                                       </div>
                                                                   </div>
                                                                   <div class="geodir-category-location"><h2>{{$tree_item->price}}  </h2> {{trans('lang.sar')}}</div>
                                                               </div>
                                                               <input type="hidden" name="tree_id[]" value="{{$tree_item->id}}" />
                                                               <input type="hidden" name="tree_details[]" value="{{$tree_details}}" />
                                                               <input type="hidden" name="tree_item[]" value="{{$tree_item}}" />
                                                           </div>
                                                       </article>
                                                   </div>
                                                   @endif
                                                   @endforeach                                                 
                                                   <input type="hidden" name="service_id" value="{{$service->id}}" />
                                               </div>
                                           </div>
                                           <span class="fw-separator"></span>
                                           <div class="clearfix"></div>
                                           <a  href="#"  class="next-form action-button color-bg">{{trans('lang.next')}}</a>
                                       </fieldset>
                                       <fieldset class="fl-wrap">
                                           <div class="list-single-main-item-title fl-wrap">
                                               <h3>{{trans('lang.Registration_choosing_names')}}</h3>
                                           </div>
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <label class="vis-label">{{trans('lang.type')}} </label>
                                                           <div class="listsearch-input-item ">
                                                               <select data-placeholder="{{trans('lang.choose_type')}}" class="chosen-select no-search-select" id="type" disabled >
                                                                   <option value="1" @if (auth()->guard('web')->user()->type == 'individual') selected @endif>{{trans('lang.individual')}}</option>
                                                                   <option value="2" @if (auth()->guard('web')->user()->type == 'government') selected @endif>{{trans('lang.government')}}</option>
                                                                   <option value="2" @if (auth()->guard('web')->user()->type == 'private') selected @endif>{{trans('lang.private')}}</option>
                                                                   <option value="2" @if (auth()->guard('web')->user()->type == 'school') selected @endif>{{trans('lang.school')}}</option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <label class="vis-label">{{trans('lang.full_name')}} <i class="fal fa-user"></i> </label>
                                                           <input type="text" placeholder="{{auth()->guard('web')->user()->name}}" value="{{auth()->guard('web')->user()->name}}" readonly />                                                  
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <label class="vis-label">{{trans('lang.phone')}}  <i class="fal fa-phone"></i> </label>
                                                           <input type="text" placeholder="{{auth()->guard('web')->user()->phone}}" value="{{auth()->guard('web')->user()->phone}}" readonly />                                                  
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <label class="vis-label">{{trans('lang.email')}}   <i class="fal fa-envelope"></i> </label>
                                                           <input type="text" placeholder="{{auth()->guard('web')->user()->email}}" value="{{auth()->guard('web')->user()->email}}" readonly />                                                  
                                                       </div>
                                                   </div>
                           
                                               </div>
                                               <div class="col-sm-6" id="morename" @if (auth()->guard('web')->user()->type == 'individual') style="display: none;" @endif >
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <label class="vis-label" style="text-align: center;"> {{trans('lang.Excel_file')}} </label>
                                                           <input type="file" class="upload" name="file" value=""/>                                                  
                                                       </div>
                                                   </div>

                                                   <div class="log-separator fl-wrap" style="margin-bottom: 25px;"><span>{{trans('lang.or')}}</span></div>

                                                   <br><br>
                                                   <div id="repeater">
                                                       <a href="javascript:void(0)" id="createElement" class="btn color2-bg">{{trans('lang.names_manually')}}</a>
                                                       <div class="row" id="structure" style="display: none;" >
                                                           <div class="col-xs-10">
                                                               <input type="text" placeholder="{{trans('lang.bname')}} " name="follwers" value=""/>                                                  
                                                           </div>
                                                       </div>
                                                       <br><br><br>
                                                       <div id="containerElement"></div>
                                                   </div>

                                               </div>
                                           </div>

                                           <span class="fw-separator"></span>
                                           <a  href="#"  class="previous-form action-button back-form   color2-bg">{{trans('lang.previous')}}</a>
                                           <a  href="#"  class="next-form add-cart action-button color-bg" data-token="{{ csrf_token() }}" >{{trans('lang.next')}}</a>
                                       </fieldset>
                                       <fieldset class="fl-wrap">
                                           <div class="list-single-main-item-title fl-wrap">
                                               <h3>{{trans('lang.Payment_and_review')}}</h3>
                                           </div>
                                           <div class=" fl-wrap">
                                               <table class="table table-border checkout-table" id="listtree">
                                                   <tbody>
                                                       <tr>
                                                           <th class="hidden-xs">#</th>
                                                           <th>{{trans('lang.bname')}}</th>
                                                           <th class="hidden-xs">{{trans('lang.bqty')}}</th>
                                                           <th>{{trans('lang.bprice')}}</th>
                                                           <th>{{trans('lang.btotal')}}</th>
                                                       </tr>
                                                       
                                                       
               
                                                   </tbody>
                                               </table>
                                           </div>
                                           <!-- /CHECKOUT TABLE --> 
                                           <!-- CART TOTALS  -->
                                           <div class="row">
                                               <div class="col-sm-7">
                                                   
                                                   <div class="cart-totals">
                                                        {!! $settings->payment !!}
                                                   </div>

                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <label class="vis-label" style="text-align: center;">{{trans('lang.Upload_bank_receipt')}}</label>
                                                           <input type="file" class="upload" name="payment" value=""/>                                                  
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-sm-5">
                                                   <div class="cart-totals">
                                                       

                                                       <table class="table table-border checkout-table">
                                                           <tbody>
                                                               <tr>
                                                                   <th>{{trans('lang.Total_seedlings')}}</th>
                                                                   <td id="totalqty"></td>
                                                               </tr>
                                                               <tr>
                                                                   <th>{{trans('lang.btotal')}}:</th>
                                                                   <td id="totalprice"></td>
                                                               </tr>
                                                           </tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                           </div>
                                           <!-- /CART TOTALS  --> 
                                           <span class="fw-separator"></span>
                                           <a  href="#"  class="previous-form remove-cart back-form action-button    color2-bg">{{trans('lang.previous')}}</a>
                                           <button type="submit"  class="  action-button   color-bg">{{trans('lang.next')}}</button>                                               
                                       </fieldset>
                                   
                                       <fieldset class="fl-wrap">
                                           <div class="list-single-main-item-title fl-wrap">
                                               <h3>{{trans('lang.Confirmation')}}</h3>
                                           </div>
                                           <div class="success-table-container">
                                               <div class="success-table-header fl-wrap">
                                                   <i class="fal fa-check-circle decsth"></i>
                                                   <h4>{{trans('lang.contributing_initiative')}}</h4>
                                                   <div class="clearfix"></div>
                                                   <p>{{trans('lang.confirmed_successfully')}}</p>
                                                   <a href="javascript:;" class="color-bg">{{trans('lang.order_number')}} </a>
                                               </div>
                                           </div>
                                       </fieldset>
                                    </form>
                               </div>
                           </div>
                       </div>
                       <!--   list-single-main-item end -->
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>

<div class="main-register-wrap info-modal">
   <div class="reg-overlay"></div>
   <div class="main-register-holder tabs-act">
       <div class="main-register fl-wrap  modal_main-info-modal">
           <div class="main-register_title">{{trans('lang.additional_information')}}</div>
           <div class="close-reg"><i class="fal fa-times"></i></div>
           <!--tabs -->                       
           <div class="list-single-main-item_content fl-wrap info-p" style="text-align: right;">

           </div>
       </div>
   </div>
</div>
@endsection

@section('script')
<script src="{{asset('front/assets/js/jquery.repeater.js')}}"></script> 
<script>
    $(function() {
        $('#repeater').repeater({
            // options here
        });
    });

    $('#type').on('change', function() {
        if( $('#type').find(":selected").val() != 1 ) {
            $('#morename').show();
        } else {
            $('#morename').hide();
        }
    });

    $('.add-cart').click(function () {

        var quantitys = $("input[name='quantity[]']")
              .map(function(){return $(this).val();}).get();

        var tree_details = $("input[name='tree_details[]']")
              .map(function(){return $(this).val();}).get();

        var tree_items = $("input[name='tree_item[]']")
              .map(function(){return $(this).val();}).get();

        var totalQty = 0;
        var totalPrice = 0;
        quantitys.forEach(function(data,index){
            if(data > 0) {
                $('#listtree tr:last').after('<tr id="newrow"><td class="hidden-xs"><h5 class="order-money">'+(index)+'</h5></td><td><h5 class="product-name">'+$.parseJSON(tree_details[index]).append_title+'</h5></td><td class="hidden-xs"><h5 class="order-money">'+data+'</h5></td><td><h5 class="order-money">'+$.parseJSON(tree_items[index]).price +' {{trans("lang.sar")}}</h5></td><td><h5 class="order-money">'+($.parseJSON(tree_items[index]).price * data)+' {{trans("lang.sar")}}</h5></td></tr>');
                totalQty += Number(data);
                totalPrice += Number($.parseJSON(tree_items[index]).price) * Number(data);
            }
        });
        
        $('#totalqty').html(totalQty);
        $('#totalprice').html(totalPrice+ "{{trans('lang.sar')}}");
        
    });

    $('.remove-cart').click(function () {
        $('#listtree tr[id=newrow]').remove();
    });
</script>

<script>

function getinfo(id) {
   $.ajax({
      url : "{{url('treemodel')}}/"+id,
      type : 'GET',
      dataType : 'json',
      success : function(data) {
         $('.info-p').html(data.data);
      }
   });
}

</script>
@endsection