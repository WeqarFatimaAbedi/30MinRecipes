






$(document).ready(function() {

  $(document).on('click','.editbtn', function(){

    var r_id = $(this).attr("r_id");
    $.ajax({

      url:'product.php',
      method:'POST',
       dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 4,
                id : r_id,
            }),
      success: function(data){

          $('#title').val(data.name);
          $('#ing').val(data.ing);
          $('#steps').val(data.steps);
          $('#desc').val(data.desc);
          $('#cat').val(data.cat);
          $('#serv').val(data.serv);
          $('#time').val(data.time);
          $('#img').val(data.img);
          $('#edit_btn').val(data.r_id);
          $('#insert').val("update");
        $('#editmodal').modal('show');
      }
    });
  });
  
});







<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Recipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="editform.php">    <!--form ID=addRecipe-->
        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h5>Title :</h5>
                                </div>
                            </div>
                            <div class="form-row py-1">
                                <div class="form-group col-md-12">
                                    <input name="title" autocomplete="off" type="text" id="title"  class="form-control" placeholder="Title" required>
                                </div>
                            </div>

                            <!-- ADD INGREDIANTS  -->
                            <div id="ingrediants_field">              <!--id=ingrediants_field-->
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Ingrediants :</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 form-group text-center">
                                        <input type="text" class="form-control" autocomplete="off" id="ing" placeholder="Ingrediants" name="ingrediants[]" required/>   <!--name=ingrediants[]-->
                                    </div>
                                  </div>
                                    
                            </div>

                            <!-- ADD METHOD STEPS -->
                            <div id="steps_field">                   <!--id=steps_field-->
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Method :</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 form-group text-center">
                                        <input type="text" class="form-control" autocomplete="off" id="steps" placeholder="Write step" name="steps[]" required/>       <!--name=steps[]-->
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <h5>Description :</h5>
                                </div>
                            </div>
                            <div class="form-row py-1">
                                <div class="form-group col-md-12">
                                    <input name="description" autocomplete="off" id="desc" type="text"class="form-control" placeholder="Add description" required>
                                </div>
                            </div>

                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                    <h5>Category :</h5>
                                    <select name="category" class="form-control" id="cat">
                                        <option value="1">Vegetarian</option>
                                        <option value="2">Vegan</option>
                                        <option value="3">Lacto Veg</option>
                                        <option value="4">Ovo Veg</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h5>Servings :</h5>
                                    <input name="servings" autocomplete="off" id="serv"  type="text" class="form-control" placeholder="Add servings" required>
                                </div>
                                <div class="col-md-4">
                                    <h5>Time :</h5>
                                    <input name="timing" autocomplete="off" id="time" type="text" class="form-control" placeholder="Add timing" required>
                                </div>
                            </div>
                
                            <div id="images_field">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Add image :</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group text-center">
                                        <div class="custom-file">
                                            <input type="file" id="img" class="custom-file-input" name="image" required>
                                            <label class="custom-file-label" for="pimage">Upload Image</label>
                                        </div>
                                    </div>    
                                </div>
                              </div>

                                <input type="hidden" name="edit_btn" id="edit_btn">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                <button type="button" name="insertdata" id="insert" class="btn btn-primary" data-dismiss="modal">Update</button>
                              </div>

                            </div>
                        </form>

    </div>
  </div>
</div>








