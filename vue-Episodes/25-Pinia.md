## Pinia defacto tool for dealing with global state

We will convert counterStore from previous and convert to pinia

npm install pinia
in main.js:
import { createPinia } from "pinia"
app.use(createPinia()); //and ready to go

CounterStore.js
import { defineStore } from "pinia";

export let useCounterStore = defineStore('counter', {
    state() {
        return {
            count: 0
        }
    }, 
    actions: {
        increment() {
            this.count++;
        }
    },
    
    getters: {
    	remaining() {
            return 10-this.count;
    	}
    }

});

Now in vue have a new Pinia tab and can timetravel pog

component can use 
import { useCounterStore } from '@/stores/CounterStore';
let counter = useCounterStore();

<button 
      @click="counter.increment()"
      :disabled="! counter.remaining" >
      Increment {{ counter.remaining }} Remaining
    </button>
