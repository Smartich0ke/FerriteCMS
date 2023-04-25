<template>
    <Doughnut :data="data" :options="options" />
</template>

<script lang="ts">
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'

ChartJS.register(ArcElement, Tooltip, Legend)

export default {
    name: 'PlatformChart',
    components: {
        Doughnut
    },
    data() {
        return {
            data: {
                labels: ['Mobile', 'Desktop', 'Smart TV'],
                datasets: [
                    {
                        backgroundColor: ['#0d6efd', '#97bcfc', '#00D8FF', '#ffc107'],
                        data: [70, 29, 1]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    }
}
</script>
