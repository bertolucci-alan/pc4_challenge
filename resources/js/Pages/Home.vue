<template>
    <layout>
        <div class="container-home">    
            <div class="box-home">
                <Link href="/alunos" class="options-home">
                    <div class="img-container-home">
                        <img src="assets/students.jpg" alt="" class="img-home">
                    </div>
                    <p class="title-home">Alunos</p>
                </Link>

                <Link href="/turmas" class="options-home">
                    <div class="img-container-home">
                        <img src="assets/class.jpg" alt="" class="img-home">
                    </div>
                    <p class="title-home">Turmas</p>
                </Link>

                <Link href="/escolas" class="options-home">
                    <div class="img-container-home">
                        <img src="assets/school.jpg" alt="" class="img-home">
                    </div>
                    <p class="title-home">Escolas</p>
                </Link>
            </div>
        </div>    
    </layout>
</template>

<script>
import Layout from "../Layouts/App.vue";
import { Link } from '@inertiajs/inertia-vue3';

export default{
      layout: Layout,

      components: {
          Link,
      }
}
</script>