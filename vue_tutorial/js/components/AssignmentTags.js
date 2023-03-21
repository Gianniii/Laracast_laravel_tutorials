export default {
    //notify parent when value changes with update:currentTage (must be like this) (normally put functoin name name)
    template: `
        <div class ="flex gap-2">
            <button 
            @click="$emit('update:currentTag', tag)"
            v-for="tag in tags" 
            class="border rounded px-1 py-1px text-xs"
            :class="{
                'border-blue-500 text-blue-500': tag===currentTag  
            }"
            >
            {{tag}}
            </button>
        </div>
    `,

    //must be called modeValue (default naming)
    props: {
        initialTags: Array,
        currentTag: String
    },

    computed: {
        tags() {
            return ['all', ...new Set(this.initialTags)];
        },
    }

}