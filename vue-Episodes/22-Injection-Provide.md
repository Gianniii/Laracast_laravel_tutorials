#Episode 22 Dependency injection with Provide
## Provide and inject
Might happen that a prob is needed in several levels down nested components

- sol1) Each receive it as prop and pass it down to nested pro
- sol2) provide:

The top component provides it
provide('key', 'value')
and the child
let key = inject('key') //any nested component can retrieve it as follows.

### What about reactive data
- parent
parent: let name = ref('John doe');
provide('name' , name)

-child
let name = inject('name')

Ok this works but frowned upon cuz reactive data chould be changing
and dont know where its changing.

Sol) Create a rule:
// in parent pass a ref to a function in parent that can change the name. 
ex in parent: 
provide('name', {
	name,
	changeaName:() => name.value='Changed',
	}
) 

child: let name = inject{'name', changeName} //now can call changeName in child

	

