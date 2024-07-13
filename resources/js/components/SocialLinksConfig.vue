<template>
    <div>
        <!-- Error popup (for input validation) -->
        <div v-if="error" class="alert alert-danger mt-2">
            {{ error }}
        </div>

        <!-- Form to add a new social link -->
        <form id="social-link-form" class="mb-3" @submit.prevent="addSocialLink">
            <div class="d-flex flex-row w-100 justify-content-start gap-2">
                <div class="col-sm-3">
                    <input type="text" class="form-control" v-model="platform" placeholder="Platform" required>
                </div>
                <div>
                    <input type="url" class="form-control" v-model="url" placeholder="URL">
                </div>
                <div>
                    <input type="text" class="form-control" v-model="icon" placeholder="Icon">
                </div>
                <!-- Preview icon -->
                <div class="d-flex align-items-center justify-content-center form-control-sm border rounded">
                    <iconify-icon class="p-0 m-0" :icon="icon" width="2em" height="2em"></iconify-icon>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-primary d-inline-flex flex-row align-items-center justify-content-center">
                        <iconify-icon icon="mdi:plus" width="2em" height="2em"></iconify-icon>
                    </button>
                </div>
            </div>
        </form>

        <!-- List of social links - sorted in order of "order" property -->
        <Sortable
            v-model:items="socialLinks"
            :list="socialLinks"
            item-key="id"
            tag="ul"
            class="list-group"
            :options="{ handle: '.handle' }"
            @update="onUpdate"
            @end="updateOrder"
        >
            <template #item="{ element }">
                <li :key="element.id" class="border rounded p-2 d-flex justify-content-between align-items-center mb-2" :data-id="element.id">

                    <!-- Drag handle for re-ordering items -->
                    <div class="handle d-flex align-items-center justify-content-center">
                        <iconify-icon icon="mdi:drag-horizontal" width="2em" height="2em"></iconify-icon>
                    </div>

                    <!-- When a link is being edited, we show this form -->
                    <div v-if="editingLink === element.id" class="d-flex flex-row gap-2 mb-0">
                        <input type="text" v-model="element.platform" class="form-control" placeholder="Platform" required>
                        <input type="url" v-model="element.url" class="form-control" placeholder="URL" required>
                        <input type="text" v-model="element.icon" class="form-control" placeholder="Icon" required>
                        <div class="d-flex align-items-center justify-content-center form-control-sm border rounded">
                            <iconify-icon class="p-0 m-0" :icon="element.icon" width="2em" height="2em"></iconify-icon>
                        </div>
                    </div>

                    <!-- The main content of the list item -->
                    <div class="d-flex flex-row justify-content-center align-items-center" v-if="editingLink !== element.id">
                        <div class="d-flex align-items-center justify-content-center me-2">
                            <iconify-icon :icon="element.icon" width="2em" height="2em"></iconify-icon>
                        </div>
                        <div>
                            {{ element.platform }} - <a :href="element.url" target="_blank">{{ element.url }}</a>
                        </div>
                    </div>

                    <!-- Edit, save, and delete buttons -->
                    <div>
                        <!-- Save button - to show when an item is in edit mode -->
                        <button v-if="editingLink === element.id" @click="saveSocialLink(element)" class="btn btn-sm btn-success me-2 d-inline-flex flex-row align-items-center justify-content-center">
                          <iconify-icon icon="mdi:tick" width="2em" height="2em"></iconify-icon>
                        </button>

                        <!-- Otherwise just show the edit and delete buttons -->
                        <template v-else>
                            <button @click="editSocialLink(element.id)" class="btn btn-sm btn-secondary me-2 d-inline-flex flex-row align-items-center justify-content-center">
                                <iconify-icon icon="mdi:edit" width="2em" height="2em"></iconify-icon>
                            </button>
                            <button @click="deleteSocialLink(element.id)" class="btn btn-sm btn-danger delete-btn d-inline-flex flex-row align-items-center justify-content-center">
                                <iconify-icon icon="mdi:bin" width="2em" height="2em"></iconify-icon>
                            </button>
                        </template>
                    </div>
                </li>
            </template>
        </Sortable>
    </div>
</template>

<script>
import axios from 'axios';
import {Sortable} from 'sortablejs-vue3';

export default {
    name: 'SocialLinksConfig',
    components: {
        Sortable
    },
    data() {
        return {
            platform: '',
            url: '',
            icon: '',
            error: null,
            socialLinks: [],
            editingLink: null
        };
    },
    created() {
        this.fetchSocialLinks();
    },
    computed: {
        sortedSocialLinks() {
            return this.socialLinks.sort((a, b) => a.order - b.order);
        }
    },
    methods: {

        // Get the social links for initial load
        async fetchSocialLinks() {
            try {
                const response = await axios.get('/api/social-links');
                // Sort the links by order
                this.socialLinks = response.data.sort((a, b) => a.order - b.order);
            } catch (error) {
                console.error('Error fetching social links:', error);
            }
        },

        // Create a new social link
        async addSocialLink() {
            try {
                const response = await axios.post('/api/social-links', {
                    platform: this.platform,
                    url: this.url,
                    icon: this.icon
                });

                this.socialLinks.push(response.data);

                // Clear the form fields
                this.platform = '';
                this.url = '';
                this.icon = '';
                this.error = null;

            } catch (error) {
                // Show the error popup if the validator rejects it
                if (error.response && error.response.data) {
                    this.error = error.response.data.message || 'Error adding social link';
                } else {
                    this.error = 'Error adding social link';
                }
            }
        },

        // Delete a social link
        async deleteSocialLink(id) {
            try {
                await axios.delete(`/api/social-links/${id}`);
                this.socialLinks = this.socialLinks.filter(link => link.id !== id);
            } catch (error) {
                console.error('Error deleting social link:', error);
            }
        },

        // Go into edit mode for a social link
        editSocialLink(id) {
            this.editingLink = id;
        },

        // Save the changes to a social link
        async saveSocialLink(link) {
            try {
                const response = await axios.put(`/api/social-links/${link.id}`, {
                    order: link.order,
                    platform: link.platform,
                    url: link.url,
                    icon: link.icon
                });

                // Clear the error message
                this.error = null;

                // Update the link in the local array
                const index = this.socialLinks.findIndex(item => item.id === link.id);
                if (index !== -1) {
                    this.socialLinks.splice(index, 1, response.data);
                }

                this.editingLink = null;
            } catch (error) {
                // Show the error popup if the validator rejects it
                if (error.response && error.response.data) {
                    this.error = error.response.data.message || 'Error saving social link';
                } else {
                    this.error = 'Error saving social link';
                }
            }
        },

        // Update the order of the social links - the local array is updated and re-ordered first
        onUpdate(event) {
            const oldIndex = event.oldIndex;
            const newIndex = event.newIndex;

            if (oldIndex === undefined || newIndex === undefined) {
                return;
            }

            const movedItem = this.socialLinks.splice(oldIndex, 1)[0];
            this.socialLinks.splice(newIndex, 0, movedItem);

            // Now we reflect the changes in the database
            this.updateOrder();
        },

        // Update the order of the social links in the database
        async updateOrder() {
            // Update order in the local array
            this.socialLinks.forEach((link, index) => {
                link.order = index + 1;
            });

            const orderData = this.socialLinks.map((link) => ({
                id: link.id,
                order: link.order
            }));

            try {
                await axios.put('/api/social-links/order', {order: orderData});
            } catch (error) {
                console.error('Error updating order:', error);
            }
        }
    }


};
</script>

<style scoped>
/* Add the grabby hand thing to cursor over the drag handle */
.handle {
    cursor: move;
}
</style>
