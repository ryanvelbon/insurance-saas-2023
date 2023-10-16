import { defineStore } from 'pinia'

export const useStaticDataStore = defineStore('staticData', {
    state: () => ({
        collections: [],
        dropdowns: [],
    }),
    actions: {
        async fetchStaticData() {
            const response = await fetch('/api/v1/static-data')
            const data = await response.json()

            this.collections = data.collections
            this.dropdowns = data.dropdowns
        }
    },
})
