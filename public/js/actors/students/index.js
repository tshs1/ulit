import fetch from './../../fetch.js';



$('body').on("click", '.btn-find', async (e) => state.onShow($(e.currentTarget).data("index")));
$('body').on("click", '.btn-delete', async (e) => state.onDestroy($(e.currentTarget).data("index")))
$('body').on("click", '#btn-print', async (e) => state.onPrint($(e.currentTarget).data("index")))
$('body').on("click", '#btn-dl', async (e) => state.onDL($(e.currentTarget).data("index")))
const state = {
    entity: {
        name: 'user',
        attributes: ['name', 'sectionname', 'weight', 'height', 'bmi','status','remark','updated_at'],
        actions: {
            find: ['fa fa-edit', 'Edit', 'info'],
            delete: ['fa fa-trash', 'Delete', 'danger']
        },
        baseUrl: './api'
    },


    attrsf8:['lrn', 'name', 'dob', 'age', 'weight', 'height', 'bmi', 'status','hfa','remark'],

    models: [],
    activeIndex: 0,
    btnUpdate: null,
    btnEngrave: document.getElementById('engrave'),
    btnUpdate: null,
    btnDelete: null,
    btnNew: document.getElementById('btn-new'),
    key: document.getElementById('key'),
    sf8: document.getElementById('sf8').innerHTML,
    look: document.getElementById("look"),
    


    init:async () => {
        // $('#reportsf').modal('show')
        for (let i = 2022; i < 2050 ; i++) {
            let tsy =$("#tsy")
            $('<option>', {
                html:`${i}-${i+1}`,
                value:`${i}-${i+1}`
            }).appendTo(tsy)
        }
        
       let list= await fetch.ask("api/sections/list")
       list.forEach(val => {
        let sel =$("#section")
            $('<option>', {
                html:val.name,
                value:val.id
            }).appendTo(sel)
        });
        state.btnNew.addEventListener('click', state.onCreate);
        state.btnNew.disable = false;
        state.btnEngrave.addEventListener('click', state.onStore);
        state.btnEngrave.disable = false;
        state.key.addEventListener('keydown', function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                state.ask();
            }
        });
        document.getElementById("tsy").addEventListener('change', state.ask)
        document.getElementById("section").addEventListener('change', state.ask)
        state.look.addEventListener('click', state.ask);
        state.key.disable = true;
        state.ask();
    },
    
    ask: async () => {
        console.log(`${$("#section").val()}`)
        if (state.key.value||`${$("#section").val()}` != null||`${$("#tsy").val()}` != null) { $("#table-main").empty(),$("#Tsf8").empty()}
        state.models = await fetch.ask('api/users/students', { key: state.key.value,  role:"3", section_id:`${$("#section").val()}`!= 'null'?`${$("#section").val()}`:`${$("#section_id").val()}`, sy:`${$("#tsy").val()}` != 'null'?`${$("#tsy").val()}` : `${$("#sy").val()}` })
        if (state.models){
        await  state.models[0].forEach(model => fetch.writer(state.entity, model))
        let tr = $('<tr>');
        $('<td>', { html:'Male' }).appendTo(tr);
        state.attrsf8.forEach(()=> {
               $('<td>', ).appendTo(tr)
        })
         $('#Tsf8').append(tr); 
         await state.models[0].forEach(model =>  state.writerY(model,state.models[1]))
    }   
},


    onReport:async () =>{
        $('#reportsf').modal('show')
    },


    writerY: (model,male) =>{
        var index = $("#Tsf8 tr").length;
        index = $(`#model-${model.id}`).length == 0 ? index : $(`#model-${model.id}`).data('index');
        let tr = $('<tr>', {
            id: `model-${model.id}`,
            'data-index': index
        });
        if (index+1 === male) {
            $('<td>', { html:'Female' }).appendTo(tr);
            state.attrsf8.forEach(()=> {
                   $('<td>', ).appendTo(tr)
            })
            let tr2 = $('<tr>', {
                id: `model-${model.id}`,
                'data-index': index
            });
            $('<td>', { html: `${index + 1}.` }).appendTo(tr2);
            const attriMap = new Map(Object.entries(model))
            /**
             * Attribute
             */
             state.attrsf8.forEach(attri => {
                    $('<td>', { html: attriMap.get(attri) }).appendTo(tr2)
            })
         $('#Tsf8').append(tr2); 
        }else{
        $('<td>', { html: `${index + 1}.` }).appendTo(tr);
        const attriMap = new Map(Object.entries(model))
        /**
         * Attribute
         */
         state.attrsf8.forEach(attri => {
                $('<td>', { html: attriMap.get(attri) }).appendTo(tr)
        })}
        /**
         * Check if actions is available the append action in thead
         */
         $('#Tsf8').append(tr); 
    },



    onPrint: () => {
        let printContents = document.getElementById("sf8").innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;    
    },
    onDL: () => {
        var doc = new jsPDF();
     
        let printContents = document.getElementById("sf8").innerHTML;
        doc.fromHTML(`<html><head><title>asd</title></head><body>` + printContents + `</body></html>`);
         doc.save('div.pdf');
    },
    

    onFind: async() => {
        state.models=await state.models.find(model=>{
            model.name == state.key.value})
        console.log(state.models);
    },

    onCreate: async () => {
        state.btnEngrave.innerHTML = 'Save';
        state.btnEngrave.removeEventListener("click", state.onUpdate);
        state.btnEngrave.addEventListener("click", state.onStore)
        fetch.showModal();
    },
    onShow: async (i) => {
        console.log(state.models[i]);
        state.activeIndex = i;
        state.btnEngrave.innerHTML = 'Update';
        state.btnEngrave.addEventListener("click", state.onUpdate);
        state.btnEngrave.removeEventListener("click", state.onStore)
        state.btnEngrave.setAttribute('data-id', state.models[i].id)
        fetch.setModal(state.models[i]);
    },
    onUpdate: async () => {
        let params = $('#set-Model').serializeArray();
        let pk = state.btnEngrave.getAttribute('data-id');
        let models = await fetch.update(state.entity, pk, params);
        if (models) {
            state.ask();
            $('#modal-main').modal('hide')
        }
    },
    onStore: async (e) => {
        e.preventDefault();
        let params = $('#set-Model').serializeArray();
        let models = await fetch.store(state.entity, params)
        state.models.push(models);
        state.ask();
        $('#modal-main').modal('hide')
    },
    onDestroy: async (i) => {
        let pk = state.models[i].id;
        let del = await fetch.destroy(state.entity, pk);
        if (del) {
            state.models.slice(i, 1)
        }
    },

};
window.addEventListener("load", state.init)