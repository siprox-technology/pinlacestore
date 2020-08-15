
<!-- edit address Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select address:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form class="getin_form" id="edit-address-form">
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                             <select class="form-control">
                                  <option default id="default">...</option>
                                  <option id="address1">Address 1</option>
                                  <option id="address2">Address 2</option>
                                  <option id="address3">Address 3</option>
                                  <option id="address4">Address 4</option>
                                  <option id="address5">Address 5</option>
                                  <option id="address6">Address 6</option>
                              </select>
                              </div>
                              <!-- address line 1 -->
                              <div class="form-group">
                                  <label for="addressOne" class="d-none"></label>
                                  <input class="form-control" id="addressOne" type="text" placeholder="Address line 1"
                                      required name="addressOne">
                              </div>
                              <!-- address line 2 -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="addressTwo" type="text" placeholder="Address line 2"
                                      required name="addressTwo">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control" id="city" type="text" placeholder="City"
                                      required name="city">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" id="state" type="text" placeholder="State/Province"
                                      required name="state">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" id="country" type="text" placeholder="Country"
                                      required name="country">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" id="postCode" type="text" placeholder="Post code"
                                      required name="postCode">
                              </div>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button id="save-pers-det-btn" class="button gradient-btn w-100">Save</button>
                          </div>
                          <!-- result label -->
                          <label class="text-success mt-3" id="save-pers-det-result">success</label>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>