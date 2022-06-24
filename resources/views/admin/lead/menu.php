<div class="row mt-3">
    <div class='col-md-6'>
    <div>
    <h5>List of Work Item</h5> 
       <select class="form form-control select list-of-works"  id='' name="list-of-work"> 
           @foreach($work as $rows)
           <option class="text-wrap" id="{{$rows->id}}" value="{{ $rows->id }}">
               <p>{{ $rows->work_name }}</p>
           </option>
           @endforeach
       </select>  
   
    </div>
    </div>
</div> 

<div class="row mt-2">
   <div class='col-md-12'>
       <h5>Scope Of Works</h5>
       <select class="form form-control scopes_of_work" id=" " name="scope-of-work">  
           
       </select> 
   </div>
</div>


