<div class="modal fade modal-quote" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
             <form id="get_quote_form-form" name="get_quote_form" class="default-form" action="{{ route('get_quote_email')}}" method="post" onsubmit ="alert('Thank You For Contact Us')">
               @csrf
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Get A Quote</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                    <div class="col-md-12 mt-2">
                      <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                  </div>
                  <div class="col-md-12 mt-2">
                      <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                  </div>

                  <div class="col-md-12 mt-2">
                      <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile"> 
                  </div>
                 
              </div>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block" style="background-color: #b49f64; border-color: #b49f64;">SUBMIT</button>
            </div>
          </form>
          </div>
        </div>
      </div>