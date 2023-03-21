<script setup>
  import { useStorage } from "@/composables/useStorage";
  import TabbableTextarea from "@/components/TabbableTextarea.vue";
  import { ref } from "vue";
  import { useCounterStore } from '@/stores/CounterStore';
  
  let comment = ref('initial textarea value');
  let food = useStorage('food', 'tacos');
  let counter = useCounterStore();
</script>

<template>
  <main>
    <p>
      What is your favorite food? <input type="text" v-model="food">
    </p>
    <form>
      <TabbableTextarea v-model="comment" style="width: 100%; height: 300px;" />
    </form>
    <h1>{{ counter.count }}</h1>
    <button 
      @click="counter.increment()"
      :disabled="! counter.remaining" >
      Increment {{ counter.remaining }} Remaining
    </button>
  </main>
</template>