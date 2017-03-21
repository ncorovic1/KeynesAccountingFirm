$(document).ready(function() {
        var wrapper    = $("#allFields");     //Div surrounding
        var add_button = $(".addButton");     //Add button class
        var del_button = $(".removeButton");  //Remove button class
        var addRowField   = `<div class="form-group">
                                    <div class="col-md-2">
                                        <select style="width: 150px; border: none;" name="type[]">
                                            <option value=1> Paragraf        </option>
                                            <option value=2> Sporedni naslov </option>
                                            <option value=3> Bullets         </option>
                                        </select>
                                    </div>
                                    <textarea class="col-md-9" placeholder="Tekst" rows="3" name="text[]"></textarea>
                                    <div class="col-md-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-default removeButton redWhite">
                                                    <i class="fa fa-minus"></i></button>
                                                <button type="button" class="btn btn-default addButton redWhite">
                                                    <i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>`;
        //+ Field
        $(wrapper).on("click",".addButton", function(e) {
            e.preventDefault(); 
            $(this).parent('div').parent('div').parent('div').parent('div').before(addRowField); 
        });
        //- Field
        $(wrapper).on("click",".removeButton", function(e){ 
            e.preventDefault(); 
            $(this).parent('div').parent('div').parent('div').parent('div').remove();
        });
    });