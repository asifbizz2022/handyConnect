<style type="text/css">
    
   div table{
    width: 50%;
        float: left;
         
    }
    div {
        width: 100%;
        
    }
    
    input{
        border: 0px;
    }
</style>
 
   
<body>      
    <div style="width:100%"> 
    <div class="justify-content-around p-1" >
        <img src="{{ url('logo/goodmanlogo.png') }}" alt="asd" style="width:100%"> 
    </div> 
    <div>
        <h3>Agreed and Accepted By </h3>
    </div>
    
    <div>
       
         <table>
                <tr>
                    <td>
                       <strong>Office/Showroom :</strong> 
                    </td>
                    <td>
                         <input type="text" value="{{ $office_address }}" > 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Tel :</strong>
                    </td>
                    <td>
                         <input type="text" value="{{ $office_contact }}"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Email :</strong>
                    </td>
                    <td>
                        <input type="text"  value="{{ $office_email }}">
                    </td>
                </tr>
            </table>
          
            <table>
                <tr>
                    <td>
                    <strong>Customer Signature</strong>
                    </td>
                    <td>
                        <input type="text" name="" value="{{ $customer_signature }}">
                    </td>
                </tr>
                <tr>
                    <td>
                    <strong>Name :</strong>
                    </td>
                    <td>
                        <input type="text" value="{{ $customer_name }} " >
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Contact :</strong>
                    </td>
                    <td>
                        <input type="text" value="{{ $customer_phone}}" > 
                    </td>   
                </tr>
               
                
            </table> 
    </div>
    
    <br><br><br><br>
    <br> 
    <hr>
   <div>
       <table>
    <tr>
        <td>
           <strong>Name : </strong> 
        </td>
        <td>
           <input type="text" value="{{ $customer_name }}"  >      
        </td>
    </tr>
    <tr>
        <td>
            <strong>Address : </strong> 
        </td>
        <td>
            <input type="text" value="{{ $customer_address}}" >
        </td>
    </tr>
    <tr>
        <td>
            <strong>Postal Code : </strong>
        </td>
        <td>
            <input type="text" value="{{$postalcode}}" >
        </td>
    </tr>
    </table>  
     <table >
    <tr>
        <td>
           <strong>Quotation/CONTRACT NO : </strong> 
        </td>
        <td>
           <input type="text" name="residentail-value" value="{{$contract_no}}"  >      
        </td>
    </tr>
    <tr>
        <td>
            <strong>Co Reg No : </strong> 
        </td>
        <td>
            <input type="text" value="{{ $co_reg_no }}" >
        </td>
    </tr>
    <tr>
        <td>
            <strong>Payment Terms : </strong>
        </td>
        <td>
            <input type="text"  value="{{$payment_terms}}">
        </td>
    </tr>
    </table>
    </div>
    <br><br><br>
    <br><br><br>
<hr>
    <div>
         <table >
        <tr>
            <td>
                <strong>Residential </strong>
            </td>
            <td> 
                <input type="text"  value="{{ $residential_value }}" style="width:100%">
            </td>
        </tr>
        <tr>
            <td>
                <strong>Work Type</strong>
            </td>
            <td colspan="5">
                <input type="text"  value="{{ $type_of_work}}" style="width:100%">
            </td>
        </tr>
        <tr>
            <td><strong>Scope of Work</strong></td>
            <td colspan="5"><input type="text"  value="{{ $scope_of_work }}"></td>
        </tr>
    </table>
    </div>
  
    </div> 
</body>
   



 
 
