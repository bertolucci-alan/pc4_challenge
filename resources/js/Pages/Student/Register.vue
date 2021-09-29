<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form @submit.prevent="formRegisterStudent" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="name">Nome Completo: </label>
                            <input type="text" v-model="forms.name" name="name" />
                            <p v-if="errors.name" class="message-error">{{ errors.name }}</p>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="email">E-mail: </label>
                            <input type="email" v-model="forms.email" name="email" />
                            <p v-if="errors.email" class="message-error">{{ errors.email }}</p>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="phone">Telefone: </label>
                            <input type="text" v-model="forms.phone" name="phone" placeholder="Ex:55149897959"/>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="birth">Nascimento: </label>
                            <input type="date" v-model="forms.birth" name="birth" />
                            <p v-if="errors.birth" class="message-error">{{ errors.birth }}</p>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Gênero: </label>
                            <select name="gender" v-model="forms.gender" id="" class="select-school-student">
                                <option value="" selected disabled>
                                    Selecione o gênero do aluno
                                </option>
                                <option value="feminine">
                                    Feminino
                                </option>
                                <option value="masculine">
                                    Masculino
                                </option>
                            </select>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="school">Escola: </label>
                            <select name="school" v-model="forms.school" id="" class="select-school-student">
                                <option value="" selected disabled>
                                    Selecione a escola do aluno
                                </option>
                                <option value="Etec Monsenhor Antonio magliano">
                                    Etec Monsenhor Antonio magliano
                                </option>
                            </select>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Turma: </label>
                            <select name="gender" id="" v-model="forms.class" class="select-school-student">
                                <option value="" selected disabled>
                                    Selecione a turma do aluno
                                </option>
                                <option value="3° ano do médio 2020">3° ano do médio 2020</option>
                            </select>
                        </div>

                        <button class="save-informations-edit-student">
                            Salvar alterações
                        </button>
                        <Link href="/alunos" class="back-to-students">Voltar</Link>
                    </form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/App.vue";
export default {

    data() {
        return {
            forms: {
                name: null,
                email: null,
                phone: null,
                birth: null,
                gender: null,
                school: null,
                class: null,
            },
            errors: {},
            valid: null,
        }
    },

    methods: {
        formRegisterStudent() {
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

            if(this.valid){
                axios.post('api/register-student', this.forms).then((response) => {
                    location.href="/alunos";
                })
            }
        }
    },

    components: {
        Link,
        Layout,
    },
};
</script>
