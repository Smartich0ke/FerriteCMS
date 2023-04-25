<template>
    <Bar :data="data" :options="options" />
</template>

<script lang="ts">
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import { Bar } from 'vue-chartjs'

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)

export default {
    name: 'App',
    components: {
        Bar
    },
    data() {
        return {
            data: {
                labels: [
                    'monday',
                    'tuesday',
                    'wednesday',
                    'thursday',
                    'friday',
                    'saturday',
                    'sunday'
                ],
                datasets: [
                    {
                        borderRadius: 4,
                        label: 'Site visitors',
                        backgroundColor: '#0d6efd',
                        data: [40, 20, 12, 39, 10, 40, 39]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                        },
                        border: {
                            dash: [15,10],
                        },
                    }
                }
            }
        }
    }
}
</script>

<style scoped>
</style>
