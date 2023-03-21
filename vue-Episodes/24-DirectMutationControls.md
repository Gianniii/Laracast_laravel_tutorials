### Direct mutation concerns 
Imaging we have a count variable that we can access in multiple pages
### Sol1) can store a reactive 'count' in a file and access directly
### Sol2 For big projects, can safeguard state through access functions 
in store can add a function

stores/counterStore.js:
import { reactive } form "vue";
export let counter = reactive() {
	count: 0, //state
	count
	increment() {this.count++} //action 
});
components can now do: 
import { counter } form "...CounterStore"
 -- @click="counter.increment()" --
 and like before can still access state: counter.count

