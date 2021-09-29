<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form action="" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="name">Nome Completo: </label>
                            <input type="text" name="name">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="phone">Telefone: </label>
                            <input type="text" name="phone">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="birth">Nascimento: </label>
                            <input type="text" name="birth">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Gênero: </label>
                            <input type="text" name="gender">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Escola: </label>
                            <select name="" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione a escola do aluno</option>
                                <option value="">Etec Monsenhor Antonio magliano</option>
                            </select>
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Turma: </label>
                            <select name="" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione a turma do aluno</option>
                                <option value="">3° ano do médio 2020</option>
                            </select>
                        </div>

                        <button class="save-informations-edit-student">Salvar alterações</button>
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
    layout: Layout,
    components: {
        Link,
    }

};
</script>