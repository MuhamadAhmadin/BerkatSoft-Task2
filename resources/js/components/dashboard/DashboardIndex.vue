<template>
  <div v-if="errors">
    <div
      v-for="(v, k) in errors"
      :key="k"
      class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0"
    >
      <p v-for="error in v" :key="error" class="text-sm">
        {{ error }}
      </p>
    </div>
  </div>

  <div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
      <!-- Column -->
      <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
          <a href="#"> </a>

          <header
            class="flex items-center justify-between leading-tight p-2 md:p-4"
          >
            <h1 class="text-lg">
              <a class="no-underline hover:underline text-black" href="#">
                Total Customer
              </a>
            </h1>
            <p class="text-grey-darker text-sm"></p>
          </header>

          <footer
            class="flex items-center justify-between leading-none p-2 md:p-4"
          >
            <a
              class="flex items-center no-underline hover:underline text-black"
              href="#"
            >
              <p class="ml-2 text-lg font-bold">{{ customers.length }}</p>
            </a>
            <a
              class="no-underline text-grey-darker hover:text-red-dark"
              href="#"
            >
              <span class="hidden">Like</span>
              <i class="fa fa-heart"></i>
            </a>
          </footer>
        </article>
        <!-- END Article -->
      </div>
      <!-- END Column -->
      <!-- Column -->
      <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
          <a href="#"> </a>

          <header
            class="flex items-center justify-between leading-tight p-2 md:p-4"
          >
            <h1 class="text-lg">
              <a class="no-underline hover:underline text-black" href="#">
                Total Products
              </a>
            </h1>
            <p class="text-grey-darker text-sm"></p>
          </header>

          <footer
            class="flex items-center justify-between leading-none p-2 md:p-4"
          >
            <a
              class="flex items-center no-underline hover:underline text-black"
              href="#"
            >
              <p class="ml-2 text-lg font-bold">{{ products.length }}</p>
            </a>
            <a
              class="no-underline text-grey-darker hover:text-red-dark"
              href="#"
            >
              <span class="hidden">Like</span>
              <i class="fa fa-heart"></i>
            </a>
          </footer>
        </article>
        <!-- END Article -->
      </div>
      <!-- END Column -->
      <!-- Column -->
      <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
          <a href="#"> </a>

          <header
            class="flex items-center justify-between leading-tight p-2 md:p-4"
          >
            <h1 class="text-lg">
              <a class="no-underline hover:underline text-black" href="#">
                Total Sales
              </a>
            </h1>
            <p class="text-grey-darker text-sm"></p>
          </header>

          <footer
            class="flex items-center justify-between leading-none p-2 md:p-4"
          >
            <a
              class="flex items-center no-underline hover:underline text-black"
              href="#"
            >
              <p class="ml-2 text-lg font-bold">{{ sales.length }}</p>
            </a>
            <a
              class="no-underline text-grey-darker hover:text-red-dark"
              href="#"
            >
              <span class="hidden">Like</span>
              <i class="fa fa-heart"></i>
            </a>
          </footer>
        </article>
        <!-- END Article -->
      </div>
      <!-- END Column -->
    </div>
  </div>
</template>

<script setup>
import useDashboard from "@/composables/dashboard";
import { onMounted } from "vue";

const { sales, products, customers, getSales, getProducts, getCustomers } =
  useDashboard();

onMounted(getSales);
onMounted(getProducts);
onMounted(getCustomers);
</script>
