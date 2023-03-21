export default {
    template: `
    <form @submit.prevent="add">
        <div class="flex border border-gray-600 text-black">
            <input v-model="newAssignment" placeholder="New assignment..." class="p-2 w-full"/>
            <button type="submit" class="p-2 border-l">Add</button>
        </div>
    </form>
    `,

    data() {
        return {
            newAssignment: ``,

        }
    },

    methods: {
        add() {
            this.$emit('add', this.newAssignment);
        }
    }
}