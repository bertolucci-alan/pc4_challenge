<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form @submit.prevent="formUpdateStudent" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="name">Nome Completo: </label>
                            <input type="text" name="name" v-model="forms.name">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="phone">E-mail: </label>
                            <input type="email" name="phone" v-model="forms.email">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="phone">Telefone: </label>
                            <input type="text" name="phone" v-model="forms.phone">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="birth">Nascimento: </label>
                            <input type="date" name="birth" v-model="forms.birth">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Gênero: </label>
                            <select name="gender" v-model="forms.gender" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione o gênero do aluno</option>
                                <option value="feminine">Feminino</option>
                                <option value="masculine">Masculino</option>
                            </select>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Escola: </label>
                            <select name="" id="" v-model="forms.school" class="select-school-student">
                                <option value="" selected disabled>Selecione a escola do aluno</option>
                                <option value="">Etec Monsenhor Antonio magliano</option>
                            </select>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Turma: </label>
                            <select name="" id="" v-model="forms.class" class="select-school-student">
                                <option value="" selected disabled>Selecione a turma do aluno</option>
                                <option value="">3° ano do médio 2020</option>
                            </select>
                        </div>

                        <button type="submit" class="save-informations-edit-student">Salvar alterações</button>
                        <Link href="/alunos" class="back-to-students">Voltar</Link>
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
        student: Object | Array
    },

    data() {
        return {
            forms: {
                id: this.student.id,
                name: this.student.name,
                email: this.student.email,
                phone: this.student.phone,
                birth: this.student.birth,
                gender: this.student.gender,
                school: this.student.school,
                class: this.student.class,
            },
            errors: {},
            valid: null,
        }
    },

    methods: {
          formUpdateStudent() {
            this.errors = {};
            this.valid = true;

            if(!this.forms.name) {
                this.valid = false;
                this.errors.name = "Campo nome obrigatório!";
            }
            if(!this.forms.email) {
                this.valid = false;
                this.errors.email = "Campo email obrigatório!";
            }
            if(this.forms.birth && this.forms.birth.length > 10){
                this.valid = false;
                this.errors.birth = "Formato incorreto!";
            }

            if(this.valid) {
                axios.post('/api/update-student', this.forms).then((response) => {
                   location.href = "/alunos";
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