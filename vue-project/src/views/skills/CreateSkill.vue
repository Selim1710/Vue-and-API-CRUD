<script setup>
import { ref } from 'vue';
import useSkills from '@/composables/skill';

const form = ref({
    name: "",
    slug: "",
});

const { storeSkill } = useSkills();
</script>

<template>
    <div>
        <h1>Create skill</h1>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <form @submit.prevent="storeSkill(form)">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" v-model="form.name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input type="text" v-model="form.slug" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Store</button>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
</template>
