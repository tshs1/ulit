import fetch from '../../fetch.js';



$('body').on("click", '.btn-find', async (e) => state.onShow($(e.currentTarget).data("index")));
$('body').on("click", '.btn-delete', async (e) => state.onDestroy($(e.currentTarget).data("index")))
const state = {
    entity: {
        name: 'section',
        attributes: ['name', 'adviser'],
        actions: {
            find: ['fa fa-edit', 'Edit', 'info'],
            delete: ['fa fa-trash', 'Delete', 'danger']
        },
        baseUrl: './api'
    },

    models: [],
    activeIndex: 0,
    btnUpdate: null,
    btnEngrave: document.getElementById('engrave'),
    btnUpdate: null,
    btnDelete: null,
    btnNew: document.getElementById('btn-new'),
    key: document.getElementById('key'),
    look: document.getElementById("look"),


    init: async () => {
       let list= await fetch.ask("api/sections/list")
       list.forEach(val => {
        let sel =$("#selectUser")
            $('<option>', {
                html:val.name,
                value:val.id
            }).appendTo(sel)
        });
        let teacher = await fetch.ask('api/users/teachers', { key: state.key.value,role:2, list:true })
        teacher.forEach(val => {
         let teacher =$("#teacher_id")
             $('<option>', {
                 html:val.name,
                 value:val.id
             }).appendTo(teacher)
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
        state.look.addEventListener('click', state.ask);
        state.key.disable = false;
        state.ask();
    },
    ask: async () => {
        state.models = await fetch.translate(state.entity, { key: state.key.value })
        if (state.models)
            state.models.forEach(model => fetch.writer(state.entity, model))
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