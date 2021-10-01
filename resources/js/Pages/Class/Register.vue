<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form @submit.prevent="formRegisterClass" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="year">Ano: </label>
                            <input type="text" v-model="forms.year" name="year" placeholder="Ex:2020">
                        </div>
                        <p v-if="errors.year" class="message-error">{{ errors.year }}</p>

                        <div class="input-container-edit-student level-container">
                            <label for="level">Nível de ensino: </label>
                            <p class="p-level-class">Fundamental</p><input type="radio" v-model="forms.level"  name="level" value="elementary">
                            <p class="p-level-class">Médio</p><input type="radio" v-model="forms.level"  name="level" value="high">
                        </div>
                        <p v-if="errors.level" class="message-error">{{ errors.level }}</p>

                        <div class="input-container-edit-student">
                            <label for="grade">Série: </label>
                            <input type="text" v-model="forms.grade" name="grade" placeholder="Ex: 3">
                        </div>
                        <p v-if="errors.grade" class="message-error">{{ errors.grade }}</p>

                        <div class="input-container-edit-student level-container">
                            <label for="level">Turno: </label>
                            <p class="p-level-class">Matutino</p><input type="radio" v-model="forms.day" name="day" value="morning">
                            <p class="p-level-class">Vespertino</p><input type="radio" v-model="forms.day" name="day" value="afternoon">
                            <p class="p-level-class">Noturno</p><input type="radio" v-model="forms.day" name="day" value="night">
                        </div>
                        <p v-if="errors.day" class="message-error">{{ errors.day }}</p>

                        <div class="input-container-edit-student">
                            <label for="gender">Escola: </label>
                            <select  name="" v-model="forms.school_id" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione a escola do aluno</option>
                                <option v-for="school in schools" :key="school.id" :value="school.id">{{ school.name }}</option>
                            </select>
                        </div>
                        <p v-if="errors.school" class="message-error">{{ errors.school }}</p>

                        <button class="save-informations-edit-student">Salvar alterações</button>
                        <Link href="/turmas" class="back-to-students">Voltar</Link>
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
                year: null,
                level: null,
                grade:null,
                day: null,
                school_id:null,
            },
            schools: {},
            errors: {},
            valid: null,
        }
    },

    methods: {
        formRegisterClass() {
            this.errors = {};
            this.valid = true;

            if(!this.forms.year) {
                this.valid = false;
                this.errors.year = "Ano da turma obrigatório!";
            }

            if(!this.forms.level){
                this.valid = false;
                this.errors.level = "Nível de ensino obrigatório!";
            }

            if(!this.forms.grade) {
                this.valid = false;
                this.errors.grade = "Série da escola obrigatória!";
            }

            if(!this.forms.day){
                this.valid = false;
                this.errors.day = "Turno da escola obrigatório!";
            }

            if(!this.forms.school_id){
                this.valid = false;
                this.errors.school = "Escola obrigatória!";
            }

            if(this.valid) {
                axios.post('api/register-class', this.forms).then((response) => {
                    location.href = "/turmas"
                })
            }

        }
    },

    mounted() {
        axios.get('api/schools').then((response) => {
            this.schools = response.data.schools;
        })
    },
    
    components: {
        Link,
        Layout,
    }

};
</script>