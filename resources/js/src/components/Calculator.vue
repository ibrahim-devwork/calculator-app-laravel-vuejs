<template>
    <div class="border px-5 py-5 mt-5">
        <h1 class="text-center">Calculator</h1>
        <div class="mt-5 mx-auto">
            <div class="mb-3">
                <label for="theFirstNUmber" class="form-label">The first number</label>
                <input type="number" class="form-control" id="theFirstNUmber" @keyup="clearResult" v-model="theFirstNumber">
            </div>

            <div class="mb-3">
                <label for="theSecondNumber" class="form-label">The second number</label>
                <input type="number" class="form-control" id="theSecondNumber" @keyup="clearResult" v-model="theSecondNumber">
            </div>
        
            <div class="mb-3">
                <button type="button" @click="calculate(0)" class="btn btn-primary">+</button>
                <button type="button" @click="calculate(1)" class="btn btn-success ms-2">-</button>
                <button type="button" @click="calculate(2)" class="btn btn-info ms-2">*</button>
                <button type="button" @click="calculate(3)" class="btn btn-warning ms-2">/</button>
            </div>

            <div class="mb-3">
                <label for="result" class="form-label">Result</label>
                <input type="number" class="form-control" id="result" v-model="result">
            </div>

            <p class="text-danger" v-if="errors.first_number">{{ errors.first_number }}</p>
            <p class="text-danger" v-if="errors.second_number">{{ errors.second_number }}</p>

        </div>
    </div>
</template>

<script setup>
// Imports
import { ref } from 'vue';
import axiosInstance from "../utils/axiosInstance";

// Variables 
const theFirstNumber    = ref(0);
const theSecondNumber   = ref(0);
const result            = ref(0);
const errors            = ref([]);

// Methods
const calculate = async (operation) => {
    try {
        errors.value = [];
        const res = await axiosInstance.post(`calculator`, {
            operation : operation,
            first_number : theFirstNumber.value,
            second_number : theSecondNumber.value
        });
        result.value = res.data.result;

    } catch(error) {
        if(error.response.status == 422)
            errors.value = error.response.data.errors;
        console.log("Server error !");
    }
}

const clearResult = () => {
    result.value = 0;
}

</script>

<style scoped>

</style>