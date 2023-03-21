### Replace json with a store

### Might need to seed the store with the json

import { defineStore } form "pinia";

export let useTeamStore = defineStore('team', {

	state() {
		return {
		 name: '',
		 spots: 0,
		 members: []
		}
	},

	actions: {
		fill() {
			import('@team.json')then(r=>{
			let data=r.default,
			this.name = data.name;
			this.spots = data.spots;
			this.members = data.members;
			
			})
		}		
	}

});
//Component will call the fill() on the store after
importing it
=> asynchronous actions
async fill() {
	let r = await import(..)
	this.$state = r.default;
}
Has added advantage of only importing when needed!!
MUCH FASTER INITIAL PAGE LOADING!

alternatively can just do.
this.$state = r.default; //instead of what we did in fill

can now remove all props form before and replace
with an import of the store in all components that need it

A getter is a pinia version of a computed property
like before can create 

getters: {}
	spotsRemaining() {
		returns spots - members.length
	}
	
	
### Final thing new way to declare the state
//Better typescript support
state: () => ({
	name: 
	...

});

