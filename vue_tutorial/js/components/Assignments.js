import AssignmentList from "./AssignmentList.js";
import AssignmentCreate from "./AssignmentCreate.js";

//@add="add" // listen to add and call my own "add"(can see on vue timeline)
export default {
    components: { AssignmentList, AssignmentCreate },

    template: `
        <section class="flex gap-8">
            <assignment-list :assignments="filters.inProgress" title="In Progress">
                <assignment-create @add="add"></assignment-create>
            </assignment-list>
            <assignment-list 
                v-if="showCompleted"
                :assignments="filters.completed" 
                title="Completed" 
                can-toggle
                @toggle="showCompleted = !showCompleted"
            ></assignment-list>
        </section>
    `,

    data() {
        return {
            assignments: [],
            showCompleted: true,
            newAssignment: ''
        }
    },

    computed: {
        filters() {
            return {
                inProgress: this.assignments.filter(assignment => ! assignment.complete),
                completed: this.assignments.filter(assignment => assignment.complete),
            }
        },
    },

    created() {
        fetch('http://localhost:3001/assignments')
            .then(response => response.json())
            .then(data => {
                this.assignments = data;
            });
            
    },
    
    methods: {
        add(name) {
            this.assignments.push({
                name: name,
                completed: false,
                id: this.assignments.length +1
            })

            this.newAssignment = '';
        }
    }
}