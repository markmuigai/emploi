 <!-- Advert Modal -->
    <div class="modal fade" id="advertModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">Advertise here</h4>
              </div>
                <div class="modal-body">               
                      <form  method="post" action="/employers/publish"  enctype="multipart/form-data">
                          @csrf                              
                          <div class="form-group">
                              <label for="">Your Name<strong class="text-danger">*</strong></label>
                              <input type="text" name="name" required="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Phone Number<strong class="text-danger">*</strong></label>
                              <input type="text" name="phone_number" value="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Email Address<strong class="text-danger">*</strong></label>
                              <input type="email" name="email" required="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Job Title</label>
                              <input type="text" name="title" maxlength="100" class="form-control" placeholder="">
                          </div>
                          <div class="form-group">
                              <label for="description">Job Description</label>
                              <input type="text" name="" name="description" class="form-control">
                          </div>                  

                          <div class="text-center">                 
                                
                              <input type="submit" class="btn btn-success" value="Submit">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                          </div>                                               
                      </form>
                  </div>                         
            </div>                  
        </div>
    </div>
  <!-- Advert Modal End-->
