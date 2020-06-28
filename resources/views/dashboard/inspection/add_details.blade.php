@extends('dashboard.index')

@section('content')
        <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add Inspection Details</h1>
{{-- <p class="mb-4"></p> --}}

        <div class="card shadow">
            <div class="card-header">
                <h5 class="text-center">Inspection Form</h5>
            </div>
            <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sectionInput">Select a Department</label>
                            <select name="" id="" class="custom-select">
                                <option value="">a</option>
                                <option value="">b</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="partsInput">Select area for Inspection</label>
                            <select name="" id="" class="custom-select">
                                <option value="">a</option>
                                <option value="">b</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <form action="" method="">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="itemInput">Item</label>
                                <input type="text" class="form-control" placeholder="Item">
                            </div>
                        </div>
                        <div class="form-row">

                            {{-- Particulars --}}
                            <div class="form-group col-md-4" id="particular_wrapper">
                                <label for="particularInput">Particulars</label>
                                <div class="row">
                                    <input type="text" class="form-control col-8 m-1" placeholder="Particular">
                                    <button type="button" id="add_particular" class="btn btn-success btn-circle btn-sm mt-2" title="Add field">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div> 
                            </div>

                            {{-- Inspection Checks --}}
                            <div class="form-group col-md-4" id="checks_wrapper">
                                <label for="inspectionInput">Inspection Checks</label>
                                <div class="row">
                                    <input type="text" class="form-control col-8 m-1" placeholder="Inspection Checks">
                                    <button type="button" id="add_checks" class="btn btn-success btn-circle btn-sm mt-2" title="Add field">
                                            <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- Remarks --}}
                            <div class="form-group col-md-4" id="remarks_wrapper">
                                <label for="remarksInput">Remarks</label>
                                <div class="row">
                                <input type="text" class="form-control col-8 m-1" placeholder="Remarks">
                                    <button type="button" id="add_remarks" class="btn btn-success btn-circle btn-sm mt-2" title="Add field">
                                                <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
<script type="text/javascript">
    window.onload = function(){
        
        // 
        // 
        //  PARTICULARS
        // 
        // 
        var maxField = 10;
        var x = 1;
        var particularFieldHTML = '<div class="row"><input type="text" class="form-control col-8 m-1" placeholder="Particular"><button type="button" id="remove_particular" class="btn btn-danger btn-circle btn-sm mt-2" title="Add field"><i class="fas fa-minus"></i></button></div>';

        
        $('#add_particular').click(function(){

            if(x < maxField){ 
                x++;
                $("#particular_wrapper").append(particularFieldHTML);
            }
        });
        
        $("#particular_wrapper").on('click', '#remove_particular', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });


        // 
        // 
        // INSPECTION CHECKS
        // 
        // 
        var y = 1;
        var checksFieldHTML = '<div class="row"><input type="text" class="form-control col-8 m-1" placeholder="Inspection Check"><button type="button" id="remove_checks" class="btn btn-danger btn-circle btn-sm mt-2" title="Add field"><i class="fas fa-minus"></i></button></div>';

        $("#add_checks").click(function(){

            if(y < maxField){
                y++;
                $("#checks_wrapper").append(checksFieldHTML);
            }
        });

        $("#checks_wrapper").on('click', '#remove_checks', function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            y--;
        });

        // 
        // 
        // REMARKS
        // 
        // 
        var z = 1;
        var remarksFieldHTML = '<div class="row"><input type="text" class="form-control col-8 m-1" placeholder="Remarks"><button type="button" id="remove_remarks" class="btn btn-danger btn-circle btn-sm mt-2" title="Add field"><i class="fas fa-minus"></i></button></div>';

        $("#add_remarks").click(function(){

            if(z < maxField){
                z++;
                $("#remarks_wrapper").append(remarksFieldHTML);
            }
        });

        $("#remarks_wrapper").on('click', '#remove_remarks', function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            z--;
        });
    }
       
</script>

@endsection