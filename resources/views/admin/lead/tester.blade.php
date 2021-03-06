<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pdf</title>
	<style type="text/css">
		*{
			font-size: 12px;
		}
		input[type=text]{
			border: none;
			font-size: 10px;
			color: navy;
		}
		table {
			width: 100%;
			border-collapse: collapse;
		}
		table thead th{
			text-align: left;
			font-size: 12px;
			color: red;
			width: auto;
		}
		table tbody tr td span{
			font-size: 11px;  color: blue;
			width: 100%;
		}
		span{
			color: navy;
		}
		sope-rows{
			border: 1px solid blue;
		}
	</style>
</head>
<body> 
 
<section>
    <table  width="100%">
    <tr>
        <td>
           <h3>
               <input type="text" value="Office /Showroom" disabled>
           </h3>
            <span>{{ $company_name }}</span><br><br> 
        </td>
        <td>
            <h3>
                <input type="text" value="Agreed & Accepted By" disabled>
            </h3>
            <span>Customer Signature ___________________</span> <br>
             <span>{{$customer_name}}</span> 
          <span>Customer COntract</span><br>
          
        </td>
    </tr>
</table>
</section>
<br>
<section>
    <table border>
    	@foreach($designers as $d)
    <tr width="50%">
        <td> 
            <span>
            Name : {{ $d->name }}
            </span>
        </td>
        <td rowspan="3"> 
            <span> {{ $type }}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>
            E-mail: {{$d->email }}
            </span>
        </td>
    </tr>
    <tr>    
        <td>
            <span>
            Contact: {{$d->contact }}
            </span> 
        </td>
    </tr>
 
    @endforeach
</table>
</section>
<br>
<section>
    <table border>
    <tr>
        <td width="50%">
            Date : {{ $date }}
        </td>
        <td width="50%">
           Quotation No : {{$company_name }}  
        </td>
    </tr>
    <tr>
        <td width="50%">
            Name : <span>{{ $customer_name }}</span>
        </td>
        <td>co.reg.no : <span>{{ $company_name }}</span></td>
    </tr>
    <tr>
        <td width="50%">Address : {{ $company_address }}</td>
        <td width="50%">Payment Terms</td>
    </tr>
    <tr>
        <td width="50%">Postal Code :<span>{{$company_zip}}</span></td>
    </tr> 
    
</table>
</section>
 <br><br>
<section>
	<h4><input type="text" value="Residential : {{$service_type}}" disabled width="100%"></h4>
	<h5><input type="text" value="Selected Work List"></h5>
	<ol style="width:100%">
	@foreach($list as $l)
	<li>
		<h5><input type="text" value="{{$l->work_name}}" width="100%"></h5>
	</li>
	@endforeach
	</ol>  
	<section> 
	<table border>
		<thead> 
			<th>Scope</th>
			<th>Cost</th>
			<th>Markup</th>
			<th>Markup %</th>
			<th>Margin</th>
			<th>Discount</th>
			<th>Unit</th>
			<th>Qty</th>
			<th>Net Total</th> 
		</thead>
		<tbody>
		<tr id="scope-rows">
			<td style='width: 3in;'>
			@foreach(explode('-', $scopes) as $s)  
			<span>{{$s}}</span><br>
			@endforeach
			</td>	
			<td>
			@foreach(explode('-', $price) as $p)  
			<span>{{$p}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $markupPercent) as $mp)  
			<span>{{$mp}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $markupAmount) as $ma)  
			<span>{{$ma}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $margin) as $m)  
			<span>{{$m}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $discount) as $d)  
			<span>{{$d}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $unit) as $u)  
			<span>{{$u}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $quantity) as $q)  
			<span>{{$q}} </span><br>
			@endforeach
			</td>
			<td>
			@foreach(explode('-', $finalPrice) as $fp)  
			<span>{{$fp}} </span><br>
			@endforeach
			</td>
		</tr>
		</tbody>
	</table>
</section>
	 
 
 </body>
</html>
  