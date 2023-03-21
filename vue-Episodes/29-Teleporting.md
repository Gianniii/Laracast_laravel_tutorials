### Want the model code to be at the very bottom of the html
If the modal is nested ect.. may not work as expected
so good to place modal at the bottom of the page and use 
teleport

wrap modal in <Teleport to="body" or something like this"

### PB 2 
at the moment the button to show the modal is nested in a component

would like to combine the button to show the modal 
in the same place wheere te modal is declared

AddMemberModal.vue
<script setup>
import Modal from "@/Components/Modal.vue";
import {useTeamStore} from "@/stores/TeamStore";
import { ref } from "vue";
let showModal = ref(false);
let team = useTeamStore();
</script>

<template>
  <button
    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded disabled:bg-gray-400"
    :disabled="! team.spotsRemaining"
    @click="showModal = true"
  >Add Member ({{ team.spotsRemaining }} Spots Left)</button>

  <Teleport to="body">
    <Modal :show="showModal" @close="showModal = false">
      <template #default>
        <p>Need to add a new member to your team?</p>

        <form class="mt-6">
          <div class="flex gap-2">
            <input type="email" placeholder="Email Address..." class="flex-1">
            <button>Add</button>
          </div>
        </form>
      </template>
    </Modal>
  </Teleport>
</template>

at the place where the button to add the modal was can
just reference the modal
<AddMemmeberModal7> (ofc need to import it in scrip) 

(check code)
