                         <div class="tab-pane" id="resp-tab2">
                         <div ng-app="fileUpload" ng-controller="MyCtrl">

                            <div class="box-body">
        

                             <div class="row">
                             <fieldset>

                               <legend><h4>Item Image</h4></legend>
                                  <form name="myForm">
                                    <div class="table-responsive">
                                  <table id="images" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                              <td class="text-left">Thumbnail</td>
                                              <td></td>
                                              <td></td>
 
                                              <td colspan="20%" class="text-left">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                          Photo
                                      <input type="file" ngf-select ng-model="picFile" name="file"    
                                             accept="image/*" ngf-max-size="2MB" required
                                             ngf-model-invalid="errorFile">
                                      <i ng-show="myForm.file.$error.required">*required</i><br></td>
                                    
                                          <td>
                                          <i ng-show="myForm.userName.$error.required">*required</i>
                                          Description <br>
                                          <input type="text" name="userName" ng-model="username" size="31" required></td>

                                          <td>
                                          <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 

                                          </td>

                                          <td colspan="20%"> 
                                          <button ng-click="picFile = null" ng-show="picFile"  data-toggle="tooltip" data-placement="bottom" title="Remove Image" class="btn btn-flat"><i class="fa fa-trash-o"></i></button>
                                            <button ng-click="uploadPic(picFile)" data-toggle="tooltip" title="Upload Image" data-placement="bottom" class="btn btn-flat "><i class="fa fa-upload"></i>
                                            </button>
                                            <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:{{picFile.progress}}%" 
                                            ng-bind="picFile.progress + '%'"></div>
                                            </span> 
                                          </td>
                                        </tr>
                                        <tr><i ng-show="myForm.file.$error.maxSize">File too large 
                                          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>

                                      <span ng-show="picFile.result">Upload Successful</span>
                                      <span class="err" ng-show="errorMsg">{{errorMsg}}</span></tr>
                                      </tbody>
                                      </table>
                                      </div>
                                      
                                    
    
                                  </form>

                                    </fieldset>
                                
                                 <fieldset>

                               <legend><h4>Additional Images</h4></legend>
                                  <form name="myForm2">
                                    <div class="table-responsive">
                                  <table id="images" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                              <td class="text-left">Image 1</td>
                                              <td></td>
                                              <td></td>
 
                                              <td colspan="20%" class="text-left">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                          Photo
                                      <input type="file" ngf-select ng-model="picFile" name="file"    
                                             accept="image/*" ngf-max-size="2MB" required
                                             ngf-model-invalid="errorFile">
                                      <i ng-show="myForm.file.$error.required">*required</i><br></td>
                                    
                                          <td>
                                          <i ng-show="myForm.userName.$error.required">*required</i>
                                          Description <br>
                                          <input type="text" name="userName" ng-model="username" size="31" required></td>

                                          <td>
                                          <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 

                                          </td>

                                          <td colspan="20%"> 
                                          <button ng-click="picFile = null" ng-show="picFile"  data-toggle="tooltip" data-placement="bottom" title="Remove Image" class="btn btn-flat"><i class="fa fa-trash-o"></i></button>
                                            <button ng-click="uploadPic(picFile)" data-toggle="tooltip" title="Upload Image" data-placement="bottom" class="btn btn-flat "><i class="fa fa-upload"></i>
                                            </button>
                                            <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:{{picFile.progress}}%" 
                                            ng-bind="picFile.progress + '%'"></div>
                                            </span> 
                                          </td>
                                        </tr>
                                        <tr><i ng-show="myForm.file.$error.maxSize">File too large 
                                          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>

                                      <span ng-show="picFile.result">Upload Successful</span>
                                      <span class="err" ng-show="errorMsg">{{errorMsg}}</span></tr>
                                      </tbody>
                                      </table>
                                      </div>
                                      
                                    
    
                                  </form>


                                     <form name="myForm2">
                                    <div class="table-responsive">
                                  <table id="images" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                              <td class="text-left">Image 1</td>
                                              <td></td>
                                              <td></td>
 
                                              <td colspan="20%" class="text-left">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                          Photo
                                      <input type="file" ngf-select ng-model="picFile" name="file"    
                                             accept="image/*" ngf-max-size="2MB" required
                                             ngf-model-invalid="errorFile">
                                      <i ng-show="myForm.file.$error.required">*required</i><br></td>
                                    
                                          <td>
                                          <i ng-show="myForm.userName.$error.required">*required</i>
                                          Description <br>
                                          <input type="text" name="userName" ng-model="username" size="31" required></td>

                                          <td>
                                          <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 

                                          </td>

                                          <td colspan="20%"> 
                                          <button ng-click="picFile = null" ng-show="picFile"  data-toggle="tooltip" data-placement="bottom" title="Remove Image" class="btn btn-flat"><i class="fa fa-trash-o"></i></button>
                                            <button ng-click="uploadPic(picFile)" data-toggle="tooltip" title="Upload Image" data-placement="bottom" class="btn btn-flat "><i class="fa fa-upload"></i>
                                            </button>
                                            <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:{{picFile.progress}}%" 
                                            ng-bind="picFile.progress + '%'"></div>
                                            </span> 
                                          </td>
                                        </tr>
                                        <tr><i ng-show="myForm.file.$error.maxSize">File too large 
                                          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>

                                      <span ng-show="picFile.result">Upload Successful</span>
                                      <span class="err" ng-show="errorMsg">{{errorMsg}}</span></tr>
                                      </tbody>
                                      </table>
                                      </div>
                                      
                                    
    
                                  </form>
                                   <form name="myForm2">
                                    <div class="table-responsive">
                                  <table id="images" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                              <td class="text-left">Image 1</td>
                                              <td></td>
                                              <td></td>
 
                                              <td colspan="20%" class="text-left">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                          Photo
                                      <input type="file" ngf-select ng-model="picFile" name="file"    
                                             accept="image/*" ngf-max-size="2MB" required
                                             ngf-model-invalid="errorFile">
                                      <i ng-show="myForm.file.$error.required">*required</i><br></td>
                                    
                                          <td>
                                          <i ng-show="myForm.userName.$error.required">*required</i>
                                          Description <br>
                                          <input type="text" name="userName" ng-model="username" size="31" required></td>

                                          <td>
                                          <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 

                                          </td>

                                          <td colspan="20%"> 
                                          <button ng-click="picFile = null" ng-show="picFile"  data-toggle="tooltip" data-placement="bottom" title="Remove Image" class="btn btn-flat"><i class="fa fa-trash-o"></i></button>
                                            <button ng-click="uploadPic(picFile)" data-toggle="tooltip" title="Upload Image" data-placement="bottom" class="btn btn-flat "><i class="fa fa-upload"></i>
                                            </button>
                                            <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:{{picFile.progress}}%" 
                                            ng-bind="picFile.progress + '%'"></div>
                                            </span> 
                                          </td>
                                        </tr>
                                        <tr><i ng-show="myForm.file.$error.maxSize">File too large 
                                          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>

                                      <span ng-show="picFile.result">Upload Successful</span>
                                      <span class="err" ng-show="errorMsg">{{errorMsg}}</span></tr>
                                      </tbody>
                                      </table>
                                      </div>
                                      
                                    
    
                                  </form>
                                                                       <form name="myForm2">
                                    <div class="table-responsive">
                                  <table id="images" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                              <td class="text-left">Image 1</td>
                                              <td></td>
                                              <td></td>
 
                                              <td colspan="20%" class="text-left">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                          Photo
                                      <input type="file" ngf-select ng-model="picFile" name="file"    
                                             accept="image/*" ngf-max-size="2MB" required
                                             ngf-model-invalid="errorFile">
                                      <i ng-show="myForm.file.$error.required">*required</i><br></td>
                                    
                                          <td>
                                          <i ng-show="myForm.userName.$error.required">*required</i>
                                          Description <br>
                                          <input type="text" name="userName" ng-model="username" size="31" required></td>

                                          <td>
                                          <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 

                                          </td>

                                          <td colspan="20%"> 
                                          <button ng-click="picFile = null" ng-show="picFile"  data-toggle="tooltip" data-placement="bottom" title="Remove Image" class="btn btn-flat"><i class="fa fa-trash-o"></i></button>
                                            <button ng-click="uploadPic(picFile)" data-toggle="tooltip" title="Upload Image" data-placement="bottom" class="btn btn-flat "><i class="fa fa-upload"></i>
                                            </button>
                                            <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:{{picFile.progress}}%" 
                                            ng-bind="picFile.progress + '%'"></div>
                                            </span> 
                                          </td>
                                        </tr>
                                        <tr><i ng-show="myForm.file.$error.maxSize">File too large 
                                          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>

                                      <span ng-show="picFile.result">Upload Successful</span>
                                      <span class="err" ng-show="errorMsg">{{errorMsg}}</span></tr>
                                      </tbody>
                                      </table>
                                      </div>
                                      
                                    
    
                                  </form>

                                  
                                    </fieldset>

                                
                              
                              
                              </div>
                              </div>
                              </div>
                              </div>