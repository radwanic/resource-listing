<template>
    <loading-card :loading="loading" class="h-auto">
        <div class="px-3 py-3">
            <h4 class="text-center text-2xl text-80 font-light mb-3">{{ card.cardTitle }}</h4>

            <template v-if="errorMessage">
                <p class="text-80">{{ errorMessage }}</p>
            </template>

            <template v-else>
                <table cellpadding="0" cellspacing="0" class="w-full">
                    <tbody>
                        <tr class="mb-2" v-for="item in items" :key="item.id">
                            <td class="p-2 border-t border-l border-r border-b border-50">
                                <router-link v-if="card.resourceUri" :to="`${card.resourceUrl}${item.id}`" class="text-sm text-primary no-underline dim">
                                    <p>{{ item.title }}</p>
                                </router-link>
                                <p class="text-sm dim" v-else>{{ item.title }}</p>
                            </td>
                            <td class="text-sm p-2 text-right border-t border-r border-b border-50">
                                {{ item.ordered_column }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </template>
        </div>
    </loading-card>
</template>

<script>
    export default {
        props: [
            'card',
        ],

        data() {
            return {
                items: [],
                errorMessage: null,
                cardTitle: '-',
                loading: true,
                url: ''
            }
        },

        mounted() {
            Nova.request().post('/nova-vendor/radwanic/resource-listing/fetch', JSON.stringify(
                {
                    'resource': this.card.resource,
                    'orderBy': this.card.orderBy,
                    'order': this.card.order,
                    'limit': this.card.limit,
                    'resourceTitleColumn': this.card.resourceTitleColumn,
                    'readableDate': this.card.readableDate
                }))
                .then(response => {
                    this.items = response.data;
                    this.loading = false;
                })
                .catch(error => {
                    this.errorMessage = error.response.data.message;
                    this.loading = false;
                })
        },
    }
</script>
