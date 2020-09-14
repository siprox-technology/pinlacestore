
<!-- edit address1 Modal -->
<div class="modal fade" id="editAddressModal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New Address Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form id="edit-address-form1" method='post' action='process.php'>
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                                  <input type="hidden" name='number' value='1'>
                                  <h3 class="text-center">Address 1</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="address" type="text" placeholder="Address"
                                      required name="address">
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
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button  class="button gradient-btn w-100">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- edit address2 Modal -->
<div class="modal fade" id="editAddressModal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New Address Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form id="edit-address-form2" method='post' action='process.php'>
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                                  <input type="hidden" name='number' value='2'>
                                  <h3 class="text-center">Address 2</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="address" type="text" placeholder="Address"
                                      required name="address">
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
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button  class="button gradient-btn w-100">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- edit address3 Modal -->
<div class="modal fade" id="editAddressModal3" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New Address Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form id="edit-address-form3" method='post' action='process.php'>
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                                  <input type="hidden" name='number' value='3'>
                                  <h3 class="text-center">Address 2</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="address" type="text" placeholder="Address"
                                      required name="address">
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
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button  class="button gradient-btn w-100">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- edit address4 Modal -->
<div class="modal fade" id="editAddressModal4" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New Address Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form id="edit-address-form4" method='post' action='process.php'>
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                                  <input type="hidden" name='number' value='4'>
                                  <h3 class="text-center">Address 2</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="address" type="text" placeholder="Address"
                                      required name="address">
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
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button  class="button gradient-btn w-100">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- edit address5 Modal -->
<div class="modal fade" id="editAddressModal5" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New Address Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form id="edit-address-form5" method='post' action='process.php'>
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                                  <input type="hidden" name='number' value='5'>
                                  <h3 class="text-center">Address 2</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="address" type="text" placeholder="Address"
                                      required name="address">
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
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button  class="button gradient-btn w-100">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- edit address6 Modal -->
<div class="modal fade" id="editAddressModal6" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New Address Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- edit user personal details -->
            <div class="col-12">
              <div class="heading-title">
                  <form id="edit-address-form6" method='post' action='process.php'>
                      <div class="row px-2 justify-content-center">
                          <div class="col-md-12 col-sm-12" id=""></div>
                          <div class="col-md-12 col-sm-12">
                             <!-- addresses -->
                             <div class="form-group">
                                  <input type="hidden" name='number' value='6'>
                                  <h3 class="text-center">Address 2</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control" id="address" type="text" placeholder="Address"
                                      required name="address">
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
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-md-12 col-sm-12">
                              <button  class="button gradient-btn w-100">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
