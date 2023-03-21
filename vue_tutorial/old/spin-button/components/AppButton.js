export default {
    //can apply tailwind conditionally
    template: `
        <button 
        :class="{
            'border rounded px-5 py-2 disabled:cursor-not-allowed': true,
            'bg-blue-600 hover:bg-gray-700': type === 'primary', 
            'bg-red-200 hover:bg-gray-400': type === 'secondary',
            'bg-green-200 hover:bg-gray-400': type === 'muted',
            'is-loading':processing
        }" 
        :disabled="processing">
            <slot/>
        </button>
    `,

    props: {
        type: {
            type: String,
            default: 'primary'
        }
    },
    
    data() {
        return {
            processing: true
        };
        
    },

    mounted() {
        //alert('Hello');
    }
}