<template>
    <div class="d-inline-flex align-items-center button-hover-pill">
        <div @click="toggleTimeFormat">
            {{ displayTime }}
        </div>
        <span @click="toggleTimeFormat" class="d-inline-flex flex-row justify-content-center align-items-center ms-1 cursor-pointer">
            <iconify-icon style="margin: auto" icon="mdi:calendar-clock" width="1.2em" height="1.2em"></iconify-icon>
        </span>
    </div>
</template>

<script>
import { DateTime } from 'luxon';

export default {
    name: 'ToggleTime',

    props: {
        utcTime: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            showRelative: true, // Initial state to show relative time
        };
    },

    computed: {
        localTime() {
            return DateTime.fromFormat(this.utcTime, "y-MM-dd HH:mm:ss", {zone: 'utc'}).toLocal();
        },
        relativeTime() {
            return this.localTime.toRelative();
        },
        absoluteTime() {
            return this.localTime.toFormat('d MMM yyyy, h:mma');
        },
        displayTime() {
            return this.showRelative ? this.relativeTime : this.absoluteTime;
        }
    },

    methods: {
        toggleTimeFormat() {
            this.showRelative = !this.showRelative;
        }
    }
}
</script>

<style lang="scss" scoped>
@import './../../sass/_variables.scss';

</style>
