<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        table{
            border-collapse: collapse  ;
        }
        table tbody tr td{
            padding: 3px;
            font-size: 15px;
        }
        table thead th{
            text-align: left;
        }
        .bottom{
            width: 50% ; float: left;
        }
    </style>
</head>
<body> 
     <section class="header">
        <img src="{{ $pdf_banner_img }}" width="110%" >
    </section>
    <br><br>

     
        <h3>Interior Quotation</h3>
        @foreach($company_name as $company)
         <img src="{{ $company->logo }}" width="50%" >
        @endforeach
         <br><br> 
   
 <br><br>
    <section class="mt-10">
        <table>
            <tr>
                <td>Date :</td><td>{{$date}}</td><td></td><td><b>QUOTATION NO:</b></td><td><b>{{ $quotation_number}}</b></td>
            </tr>
            <tr>
                <td>Name :</td><td>{{$customer_name}}</td><td></td><td>Co.Reg.No :</td><td>{{$co_reg_no}}</td>
            </tr>
            <tr>
                <td>Address :</td><td>{{$company_address}}</td><td></td><td>Payment Terms :</td><td style="font-size:9px">15% UPON CONFIRMATION</td> 
            </tr>
            <tr>
                <td>Postal Code :</td><td>{{$company_zip}}</td><td></td><td><b>_______</b></td><td style="font-size:9px" >40% UPON COMMENCEMENT OF WORK</td> 
            </tr>
            <tr>
                <td></td><td></td><td></td><td>I acknowledge the payment terms.</td><td style="font-size:9px">40% UPON MEASUREMENT OF CARPENTRY</td> 
            </tr> 
            <tr>
                <td></td><td></td><td></td><td></td><td style="font-size:9px">5% UPON HANDOVER OF KEYS</td> 
            </tr> 


        </table>
    </section>
    <br>
<table border="1" width="100%"> 
    <thead> 
        <th>Work Description</th>
        <th>Amount</th>
    </thead>
   <tbody>
    @foreach($title as $t) 
        
        <tr>
        <td>
            <span style="color:red"><u>{{$t->work_name}}</u> </span>  
        </td>
        </tr> 
         
            @foreach($scope as $s)
             
                @if($s->scope_id ==  $t->id)  
                <tr>
                <td> 
                    {{$s->work_description}}
                </td>
                <td>
                    {{$s->cost}}
                </td>
                </tr> 
                <br>  
                @endif 
              
            @endforeach   
       
    @endforeach 
      <tr>
                <td  style="text-align:right;">
                    Discount
                </td>
                <td> - {{ $discount }}</td>
            </tr>
            <tr>
                <td  style="text-align:right;">
                    Total
                </td>
                <td>{{ $net_price }}</td>
            </tr>
             <tr>
                <td  style="text-align:right;">
                    Tax
                </td>
                <td>{{ $tax }} %</td>
            </tr>

            <tr>
                <td style="text-align:right;">
                    Grand Total
                </td>
                <td>{{ $final_grand_total }}</td>
            </tr>
</tbody>  
</table>
   <section>
    <table>
        @foreach($company_name as $company)
       <tr><p>* Quotation is valid for 30 days from date of offer.  Items not stated in the quotation will be considered as variation orders.</p></tr>
        <tr><p>* Payment mode for all progressive & final payments include: Cheque or Cashier's Order in favour of "<b> {{ $company->name}} </b>"
        </p></tr>                     
        <tr><p>* Other payment modes include: Inter-Bank Transfer to our OCBC Bank A/C No:<b> "{{ $company->bank_account_no}}"</b> or via PayNow to UEN No: <b>"{{ $company->uen_no}}"</b></p></tr>
        <tr><p>NOTE:  PLEASE REQUEST FOR GOODMAN CREATIVES' OFFICIAL RECEIPT AS PROOF OF PAYMENT.</p></tr> @endforeach
    </table>                     
    </section>
    <br>
    <section style="text-align: left;" class="footer">
        <table   class="bottom">
           <tr>
              <td style='text-align: center; font-weight: bold;'> 
                     __________ <br>
                    <br>
                </td>
           </tr>
            <tr>
                <td style='text-align: center; font-weight: bold;'> 
                        Goodman Creatives Pte Ltd <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td><span>Name</span>:_____ 
                 <span>Mobile</span>:_____</td>
            </tr>
            <tr style="font-size:10px">
                <td>
                Office / Showroom: 1 Pemimpin Drive #04-02 One Pemimpin Singapore 576151
                <br>
                Tel: 6734 1229  Fax: 6734 1132
                </td>
            </tr>
            <tr>
                 <td>Email ______</td>
            </tr>
        </table> 
        <table   class="bottom">
            <tr>
              <td style='text-align: center; font-weight: bold;'> 
                     __________ <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; font-weight: bold;">
                    <span>Agreed & Accepted By</span>
                    <br>
                    <span>Customer's Name & Signature</span><br>
                </td>
            </tr>
            <br>
            <tr>
                <td><span>Name</span>:_____ 
                  <span>Mobile</span>:_____</td>
            </tr>
            <tr style="font-size:10px">
                <td>
                Find us on: https://goodmaninterior.com
                <br>
                Like us on: www.facebook.com/goodmaninterior
                <br>
                Follow us on Instagram: @goodmaninterior.sg
                </td>
            </tr>
        </table> 
    </section>
 
</body>
</html>