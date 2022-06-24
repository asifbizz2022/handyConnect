<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>
    #scopes{ 
        text-align:justify; 
        width:100%;
    }
    select option{
        font-size: 14px;
    }
    table  tr td{ 
        font-size: 14px;
        text-align: justify-all;
        padding: 1px;
        font-face: calibri;
        color: #101010;
    }
    #lead-list-table tbody tr td input{
        width: 2cm;
        border-color:silver;
        height: 1cm;
        border-radius: none;
        margin-top: none;
        padding: none;
        margin: auto;
    }
    .close_btn{
        margin: 5px;
    }
    .s{
        width: 9cm;
    }
    
    label{
        font-weight: bold;
    }
</style>



<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id=" "  role="tabpanel" aria-labelledby="nav-home-tab">
      <div class='box' > 
        <div class="box-header with-border">
            <h5 class="">Add Quotation</h5>
            <div class="box-tools float-right">
                {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                    @lang('role.add') @lang('services.service')
                </a> --}}
            </div>
        </div>  
      <div class='box-body'> 
          
       <form method="POST" action="{{ route('invoice-residential') }}" id="form"> 
        @csrf 
            <section>
               <div class="row mt-1">
                    <div class="col-md-6">
                        <label>Customer Name</label>
                        <input type="text" class="form-control " name='customer-name' placeholder='Customer Name'>
                    </div>
                    <div class="col-md-6">
                        <label>Contact</label>
                        <input type='number' name='customer-contact' placeholder="Contact number" class="form-control"/>
                    </div>

               </div>
            </section>
<section>
   <div class="row mt-1">
        <div class="col-md-6">
           <label>Company</label>
           <select class="form-control" name="company-name">
                @foreach($companies as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div> 
        <div class="col-md-6">
           <label>Designers</label>
           <select class="form-control" name="designers">
                @foreach($designers as $d)
                <option value='{{$d->id}}'>{{$d->name}}</option>
                @endforeach
           </select>
        </div>
    </div>
    <section class='mt-2'>
         <h4>Address </h4>
        <div class='row mt-1'>
            <div class='col-md-6'>
                <label>Address</label>
                <input class="form-control" name='address' placeholder='Address'/>
            </div>
            <div class='col-md-6'>
                <label>Country</label>
                <input class="form-control" name='country' placeholder='Country'/>
            </div>
        </div>
        <div class='row mt-1'>
            <div class='col-md-6'>
                <label>State</label>
                <input class="form-control" name='state' placeholder='State'/>
            </div>
            <div class='col-md-6'>
                <label>Zip Code</label>
                <input class="form-control" name='zip-code' placeholder='Zip-Code'/>
            </div>
        </div>
        <div class='row mt-1'>
            <div class='col-md-6'>
                <label>E-mail</label>
                <input class="form-control" name='e-mail' placeholder='E-Mail'/>
            </div>
            <div class='col-md-6'>
                <label>Mobile</label>
                <input class="form-control" name='mobile' placeholder='Mobile'/>
            </div>
        </div>
    </section>
<h4 class="mt-2">Services</h4>  
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="list-group-item active" id="nav-residential-tab" data-bs-toggle="tab" data-bs-target="#residential" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Residential</button>
    <button class="list-group-item" id="nav-commercial-tab" data-bs-toggle="tab" data-bs-target="#commercial" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Commercial</button> 
  </div>
</nav>
    <div class="row mt-1"> 
        <div class="col-md-6"> 
             <div class="row" id="residential-menu">
                <div class="col-md-12">
                   <label>Residential</label> 
                   <select class="form form-control" name='service-type-residential'  >
                      @foreach($residential as $res)
                      <option value="{{ $res->type_name }}">{{ $res->type_name}}</option>
                      @endforeach
                   </select>   

                </div>  
                </div>
                <div class="row" id="commercial-menu">
                <div class="col-md-12">
                   <label>Commercial</label>
                   <select class="form form-control" name="service-type-commercial"   >
                       @foreach($commercial as $com)
                       <option value="{{$com->type_name}}">{{$com->type_name}}</option>
                       @endforeach
                   </select> 
                </div>  
               </div> 
        </div>
    </div>
</section>
    <div class="row mt-2">
        <div class='col-md-6'> 
        <label>List of Work Item</label> 
           <select class="form form-control select list-of-works"  name="list_of_work[]">  
            <option>
                -----CLICK TO CHOOSE WORK LIST-----
            </option>
           </option>
               @foreach($work as $rows)
               <option class="text-wrap" id="{{$rows->id}}" value="{{ $rows->work_name }}" > 
               {{ $rows->work_name }} 
               </option>
               @endforeach
           </select> 
        </div>
    </div> 

<div class="row mt-2">
   <div class='col-md-12'>
       <label>Scope Of Works</label>
       <select class="form form-control scopes_of_work "  name="scope_of_work[]" multiple>  
           
       </select> 
   </div>
   <!--  <div class="col-md-3">
        <h6>Price</h6>
        <input name='price' class="form form-control" required='required'>
    </div> -->
</div>
<section class="my-1">
<div class="row">
    <div class="col-md-12">
        <div class=" ">
            <div class="py-1"> 
               
            </div>
            <div class="   ">
                <div class="download_label" > 
                    Services  
                </div>
                <div class='display-services-table'>
                    
                </div> 
            </div>

        </div>
    </div>
</div>
</section>  
<section class="mt-1">
   <div class='text-right'>
       <span>Discount: </span>$<input name='discount' class='discount ml-2 font-weight-bold total-tax border-0 '> <br>
        <!--  <span>markup %</span>$<input nneame='net-discount' class=' discount ml-2 font-weight-bold total-tax border-0 '> <br>  -->
        <span>Margin</span>$<input name='margin' class='margin ml-2 font-weight-bold total-tax border-0 ' readonly> <br>
        <span>Total Price: </span>$<input name='net_price' class='net_price ml-2 font-weight-bold  border-0' readonly /> <br> 
       <span>Tax: </span>%<input name='tax' class='ml-2 font-weight-bold total-tax border-0 '> <br>
       <span>Grand Total: </span>$<input  name='final_grand_total' class='ml-2 font-weight-bold  border-0 net-total-price'  readonly> 
     
   </div>
</section>
<div class="row my-1" id="invoice-btn">
    <div class="col-md-12 text-right"> 
        <span class="scope_list">
            
        </span>
        <button type="submit" class="btn  btn-primary ">Save</button> 
        <a href="#" class="btn btn-danger" id='clear_all_page'>Cancel</a>
    </div>
   
</div>     
</form> 
</div> 
</div>
</div>
<script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){

    $('.list-of-works').append(' <p class="msg">CLICK HERE TO SEE WORK LIST ITEMS </p>');

    var workTitle = []; 
    var listofwork=[];
    var scopeList = [];
    var work_type_name;
   
     
  
    $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

    $(document).on('click','#clear_all_page', function(){
        location.reload();
    });
    work_table_prepare(1);
     
    
    function add_services(name = null) { 
        $(document).on('click','.select_scopes', function(e){
            e.preventDefault();
            workStack = $(workTitle).get(-1); 
            var works = ($(this).text());
            var str = works; 
            var scope_unit_array = str.split(',')[1];  
            var id = ($(this).attr('value')); 
            console.log(id);
            var scope_cat = (works.split(',')[3]);
            var display_services = 
                "<table class='table table-sm table-hover table-bordered display-works-table' id='lead-list-table'>\
                <thead class='text-center'>\
                <th><span>"+workStack+"</span></th>\
                <th>Unit</th>\
                <th>Cost Price</th>\
                <th>Price per Unit</th>\
                <th>Unit Of Measurement</th>\
                <th>Grand Total</th>\
                <th>Action</th>\
                </thead>\
                <tbody style='width:1cm;' class='text-center'>\
                <tr class='alert added-works text-justify align-content-center'>\
                <td class='s'>\
                <input type='hidden' class='scopes' name='scopes_stack[]' value='"+id+"'>\
                <textarea class='rounded-0 form-control scope_value' name='scope_name[]'>"+works+"</textarea></td>\
                <td><input class='unit-input form-control rounded-0' name='unit[]'></td>\
                <td><input class='cost-price form-control rounded-0' name='cost-price[]'></td>\
                <td><input class='price-per-unit-input form-control rounded-0' name='price-per-unit[]'></td>\
                <td><input class='unit-of-measurement-input form-control rounded-0' name='unit-of-measure[]'></td>\
                <td><input class='grand-total form-control rounded-0' name='grand-total[]' ></td>\
                <td><a href='javascript:void(0)' class='close-btn rounded-0 btn btn-xsm btn-danger' >x</a></td>\
                </tr>\
                </tbody>\
                </table>";  
            $('.display-services-table').append(display_services);console.log(listofwork);

        }); 
    }
   
    add_services(work_type_name);
 
    function work_table_prepare(value){
        
        $(document).on('change','.list-of-works', function(e){  
        e.preventDefault();

        $('.jquery-pdf .pdf-table').append("<tr><td><p>"+this.value+"</p></td></tr>");

        var id = $('.select option:selected').attr("id"); 
        var val =$('.select option:selected').val();  
        var text =$('.select option:selected').text();

       
        workTitle.push(text);  
            $('.scopes_of_work').empty();   
                
            $.ajax({
                url:'{{url("get/scope")}}'+'/'+id,
                type:'get',
                dataType:'json',
                data:{id:id},
               
                success :function(data){ 
                    $('.scopes_of_work').append('<optgroup label="Choose scope of work here"></optgroup>');
                    var scopes;  
                    $.each(data, function(key ,scope_name){   
                        scopes = scope_name.work_description;
                        scopeList.push(scope_name);
                        var element = '<option value="'+scope_name.id+'" class="font-weight-bold select_scopes">'+ scope_name.work_description +'</option>'; 
                        $('.scopes_of_work').append(element);
                        var list ="<input type='hidden' class='units_cost' name='units_stack[]' value='"+scope_name.scope_id+"'>"
                        $('.scope_list').append(list);
                        // console.log(list);

                    });
                       
                     
                }  
            });  
    });
    }  
    $('.scopes_of_work').on('change', function(){
        var text =$('.scopes_of_work option:selected').text();
        $('.pdf-table tr td').append('<span>'+text+'<span><br>');
    });
        $('#commercial-menu').hide();
        $('#residential-menu').show(); 
        $('#nav-residential-tab').on('click', function(){
        $('#commercial-menu').hide();
        $('#residential-menu').show();
        $('#form').attr('method',"post");
        $('#form').attr('action',"{{ route('invoice-residential') }}");
    }); 

    $(document).on('click','#nav-commercial-tab', function(){
        $('#commercial-menu').show();
        $('#residential-menu').hide();
        $('#form').attr('method',"get");
        $('#form').attr('action',"{{ route('invoice-commercial') }}");
    }); 


$(document).on('keyup','.added-works', function(e){
        e.preventDefault();
        // console.log(scopeList);
        var units_cost=$(this).find('.units_cost').val();
        var scopes = $(this).find('.scopes').val();
        var unit = $(this).find('.unit-input').val(); 
        var cost_price = $(this).find('.cost-price').val(); 
        var price_per_unit = $(this).find('.price-per-unit-input').val();  
        var unit_of_measurement = $(this).find('.unit-of-measurement-input').val();  

        var total = parseFloat(unit*price_per_unit);
        var final_result = $(this).find('.grand-total').val(total);

        var Total = 0;

         $(".grand-total").each(function() {      
            Total += +this.value;
             console.log($('.grand-total').val());
         });
           
         $(document).on('keyup','.discount', function(e){
            var discount = $(this).val();
            var total_with_discount = parseFloat(Total-discount);
            $('.net_price').val(parseFloat(total_with_discount));
            // console.log($('.net_price').val());
    
        });

         var cost = 0;

          $(".cost-price").each(function() {      
            cost += +this.value;
             // console.log($('.cost-price').val());

         });

        $(document).on('keyup','.total-tax', function(){
       
        var total_price = $('.net_price').val();
        var tax = $(this).val();
        var str =  parseFloat(tax/100);
        var result =  parseFloat(str * total_price) ;
        var grand_total =parseFloat(result)+parseFloat(total_price)
        $('.net-total-price').val(parseFloat(grand_total)); 
        // console.log(grand_total);
        
        var margin = parseFloat(total_price)-parseFloat(cost);
        $('.margin').val(parseFloat(margin));
        });

      
    });

    
    
    $(document).on('click', '.calculate', function(){

        var tab = $('.display-works-table').clone();
        //$('.jquery-pdf').append(tab);
        var get_discount = $('.discount').val();

        var get_tax = $('.total-tax').val();

        console.log( get_tax);
    });

    $('table tbody').on('click', '.cancel-btn', function(){ 
        $(this).closest('tr').remove();
        $('#grand-total-bottom').val(''); 
    });

        $(document).on('click', '.close-btn', function(){ 
        $(this).closest('.display-services-table table').remove();
        $('#grand-total-bottom').val(''); 
        
    });
    
 
   
});
</script>