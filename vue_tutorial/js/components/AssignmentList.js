import Assignment from "./Assignment.js";
import AssignmentTags from "./AssignmentTags.js";
import Panel from "./Panel.js";

//can access passed param with $event
export default {
    components: { Assignment, AssignmentTags, Panel, },
    
    props: {
        assignments: Array,
        title: String,
        canToggle: { type: Boolean, default: false}
    },

    data() {
        return {
            currentTag: 'all'
        };
    },

    computed: {
        tags() {
            return ['all', ...new Set(this.assignments.map(a => a.tag))];
        },

        filteredAssignments() {
            if(this.currentTag === 'all') {
                return this.assignments;
            }
            return this.assignments.filter(a => a.tag === this.currentTag)
        }
    },

    template: `
        <panel v-show="assignments.length" class="w-60">
            <div class="flex justify-between items-start">
                <h2 class="font-bold mb-2">
                {{ title }}
                <span>({{assignments.length}})</span>
                </h2>

                <button v-show="canToggle" @click="$emit('toggle')">&times;</button>
            </div>
           

           <assignment-tags
                :initial-tags="assignments.map(a => a.tag)"
                v-model:currentTag="currentTag"
           />

            <ul class="border border-gray-600 divide-y divide-gray-600 mt-6">
                <assignment 
                v-for="assignment in filteredAssignments"
                :key="assignment.id"
                :assignment="assignment"
                ></assignment>
            </ul>

            <slot></slot>

            <!-- <template #footer> --> <!-- # === v-slot: --> <!--
                My footer
            </template> -->
        </panel>
    `,
}