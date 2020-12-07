
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
                                  <input class="form-control" type="text" placeholder="Address"
                                      required name="address" value="<?php if(isset($_SESSION['address1'])){echo $_SESSION['address1']['address'];}?>">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="City"
                                      required name="city" value="<?php if(isset($_SESSION['address1'])){echo $_SESSION['address1']['city'];}?>">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="State/Province"
                                      required name="state"value="<?php if(isset($_SESSION['address1'])){echo $_SESSION['address1']['state'];}?>">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Country"
                                      required name="country"value="<?php if(isset($_SESSION['address1'])){echo $_SESSION['address1']['country'];}?>">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Post code"
                                      required name="postCode"value="<?php if(isset($_SESSION['address1'])){echo $_SESSION['address1']['postCode'];}?>">
                              </div>
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-6">
                              <button  class="button gradient-btn w-100">Add</button>
                          </div>
                      </div>                  
                  </form>
                  <form action="process.php" method='post'>
                      <!-- remove button -->
                      <div class="row justify-content-center mt-3">
                          <button  class="button gradient-btn w-50 px-3 ">Remove</button>
                      </div>
                      <input type="hidden" name='_token' value='<?php echo $_SESSION['_token'];?>'>
                      <input type="hidden" name='request_name' value='remove an address'>
                      <input type="hidden" name='number' value='1'>
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
                                  <input class="form-control"  type="text" placeholder="Address"
                                      required name="address"value="<?php if(isset($_SESSION['address2'])){echo $_SESSION['address2']['address'];}?>">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="City"
                                      required name="city"value="<?php if(isset($_SESSION['address2'])){echo $_SESSION['address2']['city'];}?>">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="State/Province"
                                      required name="state"value="<?php if(isset($_SESSION['address2'])){echo $_SESSION['address2']['state'];}?>">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Country"
                                      required name="country"value="<?php if(isset($_SESSION['address2'])){echo $_SESSION['address2']['country'];}?>">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Post code"
                                      required name="postCode"value="<?php if(isset($_SESSION['address2'])){echo $_SESSION['address2']['postCode'];}?>">
                              </div>
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php echo $_SESSION['_token']?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-6">
                              <button  class="button gradient-btn w-100">Add</button>
                          </div>
                      </div>
                  </form>
                  <form action="process.php" method='post'>
                      <!-- remove button -->
                      <div class="row justify-content-center mt-3">
                          <button  class="button gradient-btn w-50 px-3 ">Remove</button>
                      </div>
                      <input type="hidden" name='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>
                      <input type="hidden" name='request_name' value='remove an address'>
                      <input type="hidden" name='number' value='2'>
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
                                  <h3 class="text-center">Address 3</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="Address"
                                      required name="address"value="<?php if(isset($_SESSION['address3'])){echo $_SESSION['address3']['address'];}?>">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="City"
                                      required name="city"value="<?php if(isset($_SESSION['address3'])){echo $_SESSION['address3']['city'];}?>">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="State/Province"
                                      required name="state"value="<?php if(isset($_SESSION['address3'])){echo $_SESSION['address3']['state'];}?>">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Country"
                                      required name="country"value="<?php if(isset($_SESSION['address3'])){echo $_SESSION['address3']['country'];}?>">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Post code"
                                      required name="postCode"value="<?php if(isset($_SESSION['address3'])){echo $_SESSION['address3']['postCode'];}?>">
                              </div>
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-6">
                              <button  class="button gradient-btn w-100">Add</button>
                          </div>
                      </div>
                  </form>
                  <form action="process.php" method='post'>
                      <!-- remove button -->
                      <div class="row justify-content-center mt-3">
                          <button  class="button gradient-btn w-50 px-3 ">Remove</button>
                      </div>
                      <input type="hidden" name='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>
                      <input type="hidden" name='request_name' value='remove an address'>
                      <input type="hidden" name='number' value='3'>
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
                                  <h3 class="text-center">Address 4</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="Address"
                                      required name="address"value="<?php if(isset($_SESSION['address4'])){echo $_SESSION['address4']['address'];}?>">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="City"
                                      required name="city"value="<?php if(isset($_SESSION['address4'])){echo $_SESSION['address4']['city'];}?>">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="State/Province"
                                      required name="state"value="<?php if(isset($_SESSION['address4'])){echo $_SESSION['address4']['state'];}?>">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Country"
                                      required name="country"value="<?php if(isset($_SESSION['address4'])){echo $_SESSION['address4']['country'];}?>">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Post code"
                                      required name="postCode"value="<?php if(isset($_SESSION['address4'])){echo $_SESSION['address4']['postCode'];}?>">
                              </div>
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-6">
                              <button  class="button gradient-btn w-100">Add</button>
                          </div>
                      </div>
                  </form>
                  <form action="process.php" method='post'>
                      <!-- remove button -->
                      <div class="row justify-content-center mt-3">
                          <button  class="button gradient-btn w-50 px-3 ">Remove</button>
                      </div>
                      <input type="hidden" name='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>
                      <input type="hidden" name='request_name' value='remove an address'>
                      <input type="hidden" name='number' value='4'>
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
                                  <h3 class="text-center">Address 5</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="Address"
                                      required name="address"value="<?php if(isset($_SESSION['address5'])){echo $_SESSION['address5']['address'];}?>">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="City"
                                      required name="city"value="<?php if(isset($_SESSION['address5'])){echo $_SESSION['address5']['city'];}?>">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="State/Province"
                                      required name="state"value="<?php if(isset($_SESSION['address5'])){echo $_SESSION['address5']['state'];}?>">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Country"
                                      required name="country"value="<?php if(isset($_SESSION['address5'])){echo $_SESSION['address5']['country'];}?>">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Post code"
                                      required name="postCode"value="<?php if(isset($_SESSION['address5'])){echo $_SESSION['address5']['postCode'];}?>">
                              </div>
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-6">
                              <button  class="button gradient-btn w-100">Add</button>
                          </div>
                      </div>
                  </form>
                  <form action="process.php" method='post'>
                      <!-- remove button -->
                      <div class="row justify-content-center mt-3">
                          <button  class="button gradient-btn w-50 px-3 ">Remove</button>
                      </div>
                      <input type="hidden" name='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>
                      <input type="hidden" name='request_name' value='remove an address'>
                      <input type="hidden" name='number' value='5'>
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
                                  <h3 class="text-center">Address 6</h3>
                              </div>
                              <!-- Address -->
                              <div class="form-group">
                                  <label for="addressTwo" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="Address"
                                      required name="address"value="<?php if(isset($_SESSION['address6'])){echo $_SESSION['address6']['address'];}?>">
                              </div>
                              <!-- city -->
                              <div class="form-group">
                                  <label for="city" class="d-none"></label>
                                  <input class="form-control"  type="text" placeholder="City"
                                      required name="city"value="<?php if(isset($_SESSION['address6'])){echo $_SESSION['address6']['city'];}?>">
                              </div>
                              <!-- state\province -->
                              <div class="form-group">
                                  <label for="state" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="State/Province"
                                      required name="state"value="<?php if(isset($_SESSION['address6'])){echo $_SESSION['address6']['state'];}?>">
                              </div>
                              <!-- country-->
                              <div class="form-group">
                                  <label for="country" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Country"
                                      required name="country"value="<?php if(isset($_SESSION['address6'])){echo $_SESSION['address6']['country'];}?>">
                              </div>  
                              <!-- post code-->
                              <div class="form-group">
                                  <label for="postCode" class="d-none"></label>
                                  <input class="form-control" type="text" placeholder="Post code"
                                      required name="postCode"value="<?php if(isset($_SESSION['address6'])){echo $_SESSION['address6']['postCode'];}?>">
                              </div>
                              <input type="hidden" name='request_name' value='add new address'>
                              <input type="hidden" name ='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>                               
                          </div>                            
                          <!-- save button -->
                          <div class="col-6">
                              <button  class="button gradient-btn w-100">Add</button>
                          </div>
                      </div>
                  </form>
                  <form action="process.php" method='post'>
                      <!-- remove button -->
                      <div class="row justify-content-center mt-3">
                          <button  class="button gradient-btn w-50 px-3 ">Remove</button>
                      </div>
                      <input type="hidden" name='_token' value='<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>'>
                      <input type="hidden" name='request_name' value='remove an address'>
                      <input type="hidden" name='number' value='6'>
                  </form>                       
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
