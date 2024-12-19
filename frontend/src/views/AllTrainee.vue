<template>
    <div>
        <h1>Currently Available Trainees</h1>
        <ul class="list-unstyled">
            <li v-for="trainee in trainees" :key="trainee.id">
                <div :class="{'highlight': trainee.skill > 70, 'card': true}">
                    <div class="w-70]">
                        <h3>{{ trainee.name }}</h3>
                        <p>{{ trainee.training_center.name }}</p>
                    </div>

                    <!-- View Details Button -->
                    <a :href="`/trainees/${trainee.id}`">View Details</a>

                    <!-- Edit Button -->
                    <a :href="`/trainees/${trainee.id}/edit`" class="btn btn-primary w-25">Edit</a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>

import apiService from '@/services/api';

export default {
    data() {
        return {
            trainees: [],
        };
    },

    methods: {
        async fetchTrainees() {
            try {
                const response = await apiService.getTrainees();
                console.log(response)
                this.trainees = response.data.data.data;
                console.log(this.trainees)
                
            } catch (error) {
                
            }
        }
    },
    mounted() {
        this.fetchTrainees();
    }
}

</script>

