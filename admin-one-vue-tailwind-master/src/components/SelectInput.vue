<script setup>
import { onMounted, ref } from "vue";

defineProps(["modelValue", "selectOptions"]);
defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <select
    class="form-select mt-1 block w-3/4"
    :value="modelValue"
    @change="$emit('update:modelValue', $event.target.value)"
    ref="input"
  >
    <option v-for="option in selectOptions" :key="option.id" :value="option.id">
      {{ option.name + option.last_name }}
    </option>
  </select>
</template>

<style scoped>
.select {
  border-color: #d1d5db;
  box-shadow: 0 0 0 3px rgba(125, 81, 237, 0.5);
  border-radius: 0.375rem;
}
</style>
