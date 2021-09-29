<template>
    <layout>
        <div class="edit-student-container">
            <div class="box-edit-student-container">
                <div class="form-edit-student-container">
                    <form action="" class="form-edit-student">
                        <div class="input-container-edit-student">
                            <label for="year">Ano: </label>
                            <input type="text" name="year">
                        </div>
                        <div class="input-container-edit-student level-container">
                            <label for="level">Nível de ensino: </label>
                            <p class="p-level-class">Fundamental</p><input type="radio" name="level">
                            <p class="p-level-class">Médio</p><input type="radio" name="level">
                        </div>
                        <div class="input-container-edit-student">
                            <label for="grade">Série: </label>
                            <input type="text" name="grade">
                        </div>
                        <div class="input-container-edit-student level-container">
                            <label for="level">Turno: </label>
                            <p class="p-level-class">Matutino</p><input type="radio" name="level">
                            <p class="p-level-class">Vespertino</p><input type="radio" name="level">
                            <p class="p-level-class">Noturno</p><input type="radio" name="level">
                        </div>

                        <div class="input-container-edit-student">
                            <label for="gender">Escola: </label>
                            <select name="" id="" class="select-school-student">
                                <option value="" selected disabled>Selecione a escola do aluno</option>
                                <option value="">Etec Monsenhor Antonio magliano</option>
                            </select>
                        </div>

                        <p>ALUNOS: </p>
                        <form action="" class="form-remove-student">
                                <div class="box-students-class">
                                    <div class="align-students-class">
                                        <Link href="/editar-aluno" class="student-link-class">Alan dos Santos Bertolucci</Link>
                                    </div>
                                </div>
                        </form>
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
    layout: Layout,

    components: {
        Link,
    }

};
</script>