### Modas: 
Parent communicate to children w props
Children to parents through emits

its like a popup can you can interact with
1) Create a Modal.vue
basically a box that we place a fixed position
and makes the background less opaque. => modal mask css

2) in component

width: 75% instead of fixed px for mobdel


=> width: 80vw;
=> max-width: 500px;
<script setup>
  defineProps({
    show: Boolean
  });
</script>

<template>
  <div v-if="show" class="modal-mask">
    <div class="modal-container">
      <div>
        <slot>default body</slot>
      </div>

      <footer class="modal-footer">
        <slot name="footer">
          <button @click="$emit('close')">Close</button>
        </slot>
      </footer>
    </div>
  </div>
</template>

<style>
.modal-mask {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, .6);
  display: grid;
  place-items: center;
}
.modal-container {
  background: white;
  padding: 1rem;
  width: 80vw;
  max-width: 500px;
  border-radius: 7px;
}
.modal-footer {
  border-top: 1px solid #ddd;
  margin-top: 1rem;
  padding-top: 0.5rem;
  font-size: .8rem;
}
.modal-footer button {
  background: #ddd;
  padding: .25rem .75rem;
  border-radius: 20px;
}
.modal-footer button:hover {
  background: #c8c8c8;
}
</style>
-------------------------------------
Component: 
<script setup>
import TeamHeader from "@/components/Teams/TeamHeader.vue";
import TeamMembers from "@/components/Teams/TeamMembers.vue";
import TeamFooter from "@/components/Teams/TeamFooter.vue";
import { useTeamStore } from "@/stores/TeamStore";
import Modal from "@/components/Modal.vue";
import { ref } from "vue";
let team = useTeamStore();
team.fill();
let showModal = ref(false);
</script>

<template>
  <TeamHeader @add="showModal = true" />

  <div class="place-self-center flex flex-col gap-y-3" style="width: 725px">
    <TeamMembers />
  </div>

  <TeamFooter />

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
</template>

