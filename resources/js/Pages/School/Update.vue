<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form @submit.prevent="formUpdateSchool" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="name">Nome: </label>
                            <input type="text" name="name" v-model="forms.name">
                            <p v-if="errors.name" class="message-error">{{ errors.name }}</p>
                        </div>
                        <div class="input-container-edit-student">
                            <label for="street">Endereço: </label>
                            <input type="text" name="street" v-model="forms.street">
                            <p v-if="errors.street" class="message-error">{{ errors.street }}</p>
                        </div>

                        <p>TURMAS: </p>
                        <div class="box-students-class">
                            <h4  v-if="classes.length == 0">Nenhuma turma encontrada.</h4>
                            <div class="align-students-class" v-for="clasS in classes" :key="clasS.id">
                                <Link :href="link + clasS.id" class="link-edit-student">{{clasS.grade}}° ano - {{clasS.level}} {{clasS.day}} - {{clasS.year}}</Link>
                            </div>
                        </div>
                        
                        <button class="save-informations-edit-student">Salvar alterações</button>
                        <Link href="/escolas" class="back-to-students">Voltar</Link>
                    </form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Layout from '../../Layouts/App.vue';
export default {
    props: {
        school: Object | Array,
        classes: Object | Array,
    },

    data() {
        return {
            forms: {
                id: this.school.id,
                name: this.school.name,
                street: this.school.street,
            },
            errors: {},
            valid: null,
            link: "/editar-turma/",
        }
    },

    methods: {
        formUpdateSchool() {
            this.errors = {};
            this.valid = true;

            if(!this.forms.name) {
                this.valid = false;
                this.errors.name = "Nome da escola obrigatório!";
            }
            if(!this.forms.street) {
                this.valid = false;
                this.errors.street = "Endereço da escola obrigatório!";
            }

            if(this.valid) {
                axios.put('/api/update-school', this.forms).then((response) => {
                   location.href = "/escolas";
               });
            }

        }
    },


    components: {
        Link,
        Layout,
    }
};
</script>