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
                            <label for="gender">Escola: </label>
                            <select  name="" v-model="forms.school_id" @change="changeSchool(forms.school_id)" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione a escola do aluno</option>
                                <option v-for="school in schools" :key="school.id" :value="school.id">{{ school.name }}</option>
                            </select>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Tumas: </label>
                            <select  name="" v-model="forms.class_id" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione as turmas do aluno</option>
                                <option v-for="classE in classesE" :key="classE.id" :value="classE">{{ classE.grade }}° {{classE.level}} {{classE.day}} - {{ classE.year }}</option>
                            </select>
                        </div>
                        <p v-if="errors.class" class="message-error">{{ errors.class }}</p>
                        <div @click="addClass" class="add-classes-student"><p>Adicionar Turma</p></div>
                        <ul id="classesList" v-for="classA in forms.classesA" :key="classA.id">
                            <li v-if="classA.level === 'elementary'" class="li-class-list">
                                <p>{{ classA.grade }}° ano do fundamental {{classA.day}} - {{ classA.year }} </p><div @click="removeClass(classA.id)">X</div></li>

                            <li v-if="classA.level === 'high'" class="li-class-list">
                                <p>{{ classA.grade }}° ano do médio {{classA.day}} - {{ classA.year }} </p><div @click="removeClass(classA.id)">X</div></li>
                        </ul>
                        <button class="save-informations-edit-student">Salvar alterações</button>
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
                classesA: [],
                class_id: null,
            },
            errors: {},
            classesE: null,
            schools: {},
            valid: null,
        }
    },

    methods: {
        changeSchool(value) {
              axios.get(`/api/classes/${this.forms.id}/${this.forms.school_id}`).then((response) => {
                  this.classesE = response.data.classE;
                  this.forms.classesA = [];
              })
          },

        addClass() {
            this.errors = {};
            this.valid = true;

            if(!this.forms.class_id) {
                this.valid = false;
                return this.errors.class = "Selecione uma turma.";
            }

            this.forms.classesA.forEach(classA => {
                if(classA == this.forms.class_id) {
                    this.valid = false;
                    return this.errors.class = "Aluno já incluído na turma.";
                }
            });

            if(this.valid) {
                this.forms.classesA.push(this.forms.class_id);
            }
        },

        removeClass(value) {
            let removeClassA = this.forms.classesA.findIndex(classA => classA.id === value)

            if(removeClassA > -1) {
                    this.forms.classesA.splice(removeClassA ,1);
            }
        },

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
            if(this.forms.birth && this.forms.birth.length > 10){
                this.valid = false;
                this.errors.birth = "Formato incorreto!";
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

    mounted() {
        axios.get('/api/schools').then((response) => {
            this.schools = response.data.schools;
        })
    },

    components: {
        Link,
        Layout,
    },
};
</script>
