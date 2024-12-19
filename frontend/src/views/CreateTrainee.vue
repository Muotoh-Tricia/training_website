<template>
    <div class="container mt-4">
        <h2 class="mb-4">Create a New Trainee</h2>

        <!-- Trainee Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Trainee Name:</label>
            <input type="text" id="name" v-model="form.name" required class="form-control" />
        </div>

        <!-- Trainee Skill -->
        <div class="mb-3">
            <label for="skill" class="form-label">Trainee Skill (0-100):</label>
            <input type="number" id="skill" v-model="form.skill" min="0" max="100" required class="form-control" />
        </div>

        <!-- Trainee Bio -->
        <div class="mb-3">
            <label for="bio" class="form-label">Biography:</label>
            <textarea rows="5" id="bio" v-model="form.bio" required class="form-control"></textarea>
        </div>

        <!-- Select a Training Center -->
        <div class="mb-3">
            <label for="training_center_id" class="form-label">Select a Training Center:</label>
            <select id="training_center_id" v-model="form.training_center_id" required class="form-select">
                <option value="" disabled>Select a Center</option>
                <option v-for="center in trainingCenters" :key="center.id" :value="center.id">
                    {{ center.name }}
                </option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="button" @click="submitForm" class="btn btn-danger w-100">
            Create Trainee
        </button>

        <!-- Validation Errors -->
        <ul v-if="errors.length" class="mt-3 alert alert-danger">
            <li v-for="(error, index) in errors" :key="index">
                {{ error }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: "",
                skill: 0,
                bio: "",
                training_center_id: "",
            },
            trainingCenters: [], 
            errors: [],
        };
    },
    created() {
        this.fetchTrainingCenters();
    },
    methods: {
        fetchTrainingCenters() {
            axios.get("services/api").then((response) => {
                this.trainingCenters = response.data;
            });
        },
        submitForm() {
            this.errors = [];

            axios
                .post("services/api", this.form)
                .then((response) => {
                    alert("Trainee created successfully!");
                    this.form = {
                        name: "",
                        skill: 0,
                        bio: "",
                        training_center_id: "",
                    };
                })
                .catch((error) => {
                    if (error.response && error.response.data.errors) {
                        this.errors = Object.values(error.response.data.errors).flat();
                    } else {
                        this.errors.push("An unexpected error occurred.");
                    }
                });
        },
    },
};
</script>

<style>
</style>
