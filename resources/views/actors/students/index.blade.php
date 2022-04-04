@extends('layouts.app')

@section('content')
<div class="container" id="ss" >
    <div class="card">
        <input type="hidden" id="section_id" value="{{ Auth::user()->advisory_id }}">
        <input type="hidden" id="sy" value="{{ Auth::user()->sy }}">
        <div class="card-header with border colorT">
        <a href="javascript:void(0)" id="btn-new"></a>
        <div class="input-group input-group-sm">
        <a href="javascript:void(0)" id="btn-export"></a>
        <a href="javascript:void(0)" class="btn btn-info mb-2 ml-2" id="btn-print"><i class="fa fa-file"></i></a>
            </div>
            <h1 class="text-center">Student</h1>
            <div width="4">
        <!-- <input type="text" id="tsy" class="mb-2" > -->
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text bodyT">sy</span>
            </div>
                <select name="tsy" id="tsy">
                    <option disabled selected hidden>{{ Auth::user()->sy }}</option>  

                </select>
                @if(Auth::user()->role_id == 1)
                <div class="input-group-prepend">
                    <span class="input-group-text bodyT">Section</span>
                </div>
                <select name="section" id="section">
                    <option disabled selected hidden>Section</option>  
                </select>
                @else
                <input type="hidden" id="section" value='null' >
                @endif
        </div>
        </div>
        
        <!-- <a href="javascript:void(0)" class="btn btn-info mb-2" id="btn-export"><i class="fa fa-download"></i></a> -->
        </div>
        <div  id="s2s" class="card-body bodyT" style="height:500px; overflow:scroll;">
            <table class="table table-hover" id="table">
            <th>#</th>  
            <th>Name</th>
            <th>Section</th>
            <th>Weight (Kg)</th>
            <th>Height (m)</th>
            <th>Bmi</th>
            <th>Status</th>
            <th>Remark</th>
            <th>Updated at</th>
            <th>Action</th>  
            <tbody id="table-main"></tbody>          
            </table>
            @include('actors.students.modal')
            @include('actors.students.sf8')
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
   var doc = new jsPDF();

    function saveDiv(divId, title) {
    doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById('s2s').innerHTML + `</body></html>`);
    doc.save('div.pdf');
    }
    const export_table = document.getElementById('btn-export').addEventListener('click', ()=>{
        saveDiv('ss','Title');
    });
</script>
<script type="module" src="{{ asset('js/actors/students/index.js') }}"></script>
@endsection

<!-- $2y$10$4SNHN5lx3WR7btp/Fl0o0.F0ejwe3p0g9sOQ/3bYCxp/t4ydjA9fK -->