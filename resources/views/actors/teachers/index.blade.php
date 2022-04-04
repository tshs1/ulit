@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header with border colorT">
        <a href="javascript:void(0)"  id="btn-new"></a>
        <a href="javascript:void(0)" class="btn btn-info mb-2" id="btn-export"><i class="fa fa-download"></i></a>
            <h1 class="text-center">Teacher</h1>
        </div>
        <div class="card-body bodyT" style="height:500px; overflow:scroll;">
            <table class="table table-hover" id="table">
            <th>#</th>
            <th>Name</th>
            <th>Advisory</th>
            <th>Students</th>
            <th>Underweight</th>
            <th>Normal</th>
            <th>Overweight</th>
            <th>Obese</th>
            <th>Action</th>  
            <tbody id="table-main" class="text-align-center"></tbody>          
            </table>
            @include('actors.teachers.modal')
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
   function html_table_to_excel(type)
    {
        var data = document.getElementById('table');
        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
        XLSX.write(file, {bookType: type, boolSST:true, type:"base64"} );
        XLSX.writeFile(file, 'teachers.' + type);
    }
    const export_table = document.getElementById('btn-export').addEventListener('click', ()=>{
        html_table_to_excel('xlsx');
    });
</script>
<script type="module" src="{{ asset('js/actors/teachers/index.js') }}"></script>
@endsection