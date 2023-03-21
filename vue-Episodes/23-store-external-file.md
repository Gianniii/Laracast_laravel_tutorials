## Store state in external files then any components can import it.

1) create stores folder in src directory 
ex: quizStore.js 
export let state = {
	name: 'My first quiz',
	questions: []
};

homeView.vue
import { state } from "@stores/quizStore"
now dont even need to provide or prop quiz, all childs can import the store.

### Pb1) how to update value in store
1) if component does: <button @click="state.name = 'new name'">Change name</button>
=> its changes the string in store but Its NOT REACTIVE!! 
sol) MAKE IT REACTIVE
quizStore.js
export let state = reactive({
	name: 'My first quiz',
	questions: []
});
