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
                    <a :href="`/ViewDetails/${trainee.id}`">View Details</a>

                    <!-- Edit Button -->
                    <a :href="`/Edit/${trainee.id}/edit`" class="btn btn-primary w-25">Edit</a>
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
                this.trainees = response.data.data.data;
                
            } catch (error) {
                
            }
        }
    },
    mounted() {
        this.fetchTrainees();
    }
}

</script>

