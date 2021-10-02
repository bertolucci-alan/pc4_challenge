<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form @submit.prevent="formRegisterSchool" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="name">Nome: </label>
                            <input type="text" v-model="forms.name" name="name">
                            <p v-if="errors.name" class="message-error">{{ errors.name }}</p>
                        </div>
                        <div class="input-container-edit-student">
                            <label for="street">Endereço: </label>
                            <input type="text" v-model="forms.street" name="street">
                            <p v-if="errors.street" class="message-error">{{ errors.street }}</p>
                        </div>

                        <button type="submit" class="save-informations-edit-student">Salvar alterações</button>
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

    data() {
        return {
            forms: {
                name:null,
                street: null,
            },
            errors: {},
            valid: null,
        }
    },

    methods: {
        formRegisterSchool() {
            this.errors = {};
            this.valid = true;

            if(!this.forms.name) {
                this.valid = false;
                this.errors.name = "Nome da escola obrigatório!";
            }

            if(!this.forms.street){
                this.valid = false;
                this.errors.street = "Endereço da escola obrigatório!";
            }

            if(this.valid) {
                axios.post('api/register-school', this.forms).then((response) => {
                    location.href = "/escolas";
                })
            }
        }
    },

    components: {
        Link,
        Layout,
    }

};
</script>