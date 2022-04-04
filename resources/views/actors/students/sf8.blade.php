<div class="modal fade" id="reportsf" aria-hidden="true">
    <div class="cover"  id="sf8">        
        <div class="header input-group-prepend ">
        <img id="img1"  src="{{ asset('images/white.png') }}" alt="">
            <div  class="center">
                <h3>Deparment of education</h3>
                <span>School Form 8 Learner's Basic Health and Nutrition Report for Senior High School (SF8-SHS)</span>
            </div>
        <img id="img2" src="{{ asset('images/deped.png') }}" alt="">
        </div>        
        <div class="test">
        <font size="1" face='Arial'>
        <table class="table table-bordered" id="table">
            <th>No.</th>  
            <th>LRN</th>
            <th class="text-align-center" style="width:200px;">Learner's Name (Last Name, First Name, Name Extension, Middle Name)</th>
            <th>Birthdate
            (MM/DD/YYYY)</th>
            <th>Age</th>
            <th>Weight (Kg)</th>
            <th>Height (m)</th>
            <th>BMI
            (kg/m²) </th>
            <th>BMI
            Category</th>
            <th>Height for Age (HFA)</th>
            <th>Remarks</th>
            <tbody id="Tsf8" class="">
            </tbody>            
        </table>
        </font>
        </div>
    </div>
    <div class="btn btn-success" style="margin: bottom 10px;">
        <button type="button" id="btn-dl"  class="btn btn-success form-control" data-id=0>Save</button>
    </div>
</div>