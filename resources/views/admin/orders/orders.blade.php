<style>
    table tbody tr td span{
        font-size:13px;
    }
</style>
<div>
    <h5>
        Order Details
    </h5>
    <div class="row d-flex justify-content-end mb-2">
        <div class="col-md-3">
           <!--  <select id="" class="form-control order-status"> 
                <option value="1">Approved</option>
                <option value="2">Completed</option>
                <option value="3">Cancelled</option>
                <option value="4">Pending</option> 
            </select> -->
        </div>
    </div>
<!--     <table class="table table-sm table-bordered  ">
    <thead> 
        <th>Customer</th>
        <th>Quotation</th>
        <th>Services</th>
        <th>Status</th>
    </thead>
    <tbody class="order-table-row "></tbody>
    </table> -->
    <table class="table table-sm table-bordered order-table "  id="order-list">
        <thead> 
        <th>Customer</th>
        <th>Quotation</th>
        <th>Services</th>
        <!-- <th>Status</th> -->
        </thead>
        <tbody>
            @foreach($orders as $row)
         
            <tr class="">
                   
                <td>
                    <span>
                    {{ $row->name}}
                    </span><br>
                    <span>
                    {{ $row->email}}
                    </span><br>
                    <span>
                    {{ $row->mobile}}
                    </span><br>
                </td>
                <td>
                    <span>
                    {{ $row->customer_name}}
                    </span><br>
                    <span>
                    {{ $row->customer_contact}}
                    </span><br>
                    <span>
                    {{ $row->service_type}}
                    </span><br>
                </td>
                <td>
                <span>
                    {{ $row->service_name}}
                    </span><br>
                    <span>
                    {{ $row->price}}
                    </span><br>
                    <span>
                    {{ $row->tax}}
                    </span><br>
                </td>
                <td>  
                  <!--  
                    @if($row->order_status == 1)
                    <a href="javascript:void(0)">
                    <a href="javascript:void(0)" class="badge badge-danger not-approve-it" value="{{$row->order_id}}">De Approved</a>
                        
                    </a> 
                    @endif
                    @if($row->order_status == 2)
                    <a href="javascript:void(0)">
                        <span class="badge badge-success">Completed</span><br>
                    </a> 
                    @endif
                    @if($row->order_status == 3)
                    <a href="javascript:void(0)">
                        <span class="badge badge-danger">Cancelled</span><br>
                    </a> 
                    @endif
                    @if($row->order_status == 4)
                    <a href="javascript:void(0)" class="badge badge-danger approve-it" value="{{$row->order_id}}">Approve It</a>
                    <a href="javascript:void(0)">
                        <span class="badge badge-primary">Pending</span><br>
                    </a> 
                    @endif   -->
                    <br>
                    <!-- <select name="status" id="status-id" class="form-control form-sm">
                        <option value="1">Approved</option>
                        <option value="2">Completed</option>
                        <option value="3">Cancelled</option>
                        <option value="4">Pending</option>
                    </select><br>
                    <button class="btn btn-sm btn-primary" id="set-status">Submit</button> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>