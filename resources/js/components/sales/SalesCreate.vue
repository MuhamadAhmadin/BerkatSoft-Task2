<template>
  <div v-if="errors_sale">
    <div
      v-for="(v, k) in errors_sale"
      :key="k"
      class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0"
    >
      <p v-for="error in v" :key="error" class="text-sm">
        {{ error }}
      </p>
    </div>
  </div>
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

  <form class="space-y-6" @submit.prevent="saveCart">
    <div class="space-y-4 rounded-md shadow-sm">
      <div>
        <div>
          <h4>Add to Cart Form</h4>
        </div>
        <div class="grid grid-cols-4 gap-4">
          <div>
            <label
              for="product_id"
              class="block text-sm font-medium text-gray-700"
              >Product</label
            >
            <div class="mt-1">
              <select
                name="product_id"
                id="product_id"
                v-model="form_cart.product_id"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              >
                <template v-for="item in products" :key="item.id">
                  <option :value="item.id">{{ item.name }}</option>
                </template>
              </select>
            </div>
          </div>
          <div>
            <label for="qty" class="block text-sm font-medium text-gray-700"
              >Qty</label
            >
            <div class="mt-1">
              <input
                type="text"
                name="qty"
                id="qty"
                v-model="form_cart.qty"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              />
            </div>
          </div>
          <div>
            <label for="qty" class="block text-sm font-medium text-gray-700"
              >.</label
            >
            <div class="mt-1">
              <button
                type="submit"
                class="inline px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
              >
                <span v-if="form_cart.edit_state == true">Update cart</span>
                <span v-else>Add to cart</span>
              </button>
            </div>

            <div v-if="form_cart.edit_state == true">
              <button
                type="button"
                @click="cancelEdit"
                class="inline px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-800 rounded-md border border-transparent ring-red-300 transition duration-150 ease-in-out hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25"
              >
                Cancel edit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <form class="space-y-6 mt-5" @submit.prevent="saveSale">
    <div class="space-y-4 rounded-md shadow-sm">
      <div>
        <label for="customer_id" class="block text-sm font-medium text-gray-700"
          >Select Customer</label
        >
        <div class="mt-1">
          <select
            name="customer_id"
            id="customer_id"
            v-model="form_sale.customer_id"
            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          >
            <template v-for="item in customers" :key="item.id">
              <option :value="item.id">{{ item.name }}</option>
            </template>
          </select>
        </div>
      </div>

      <hr />
      <div class="text-center">
        <h4>Products Cart</h4>
      </div>
      <table class="min-w-full border divide-y divide-gray-200">
        <thead>
          <tr>
            <th class="px-6 py-3 bg-gray-50">
              <span
                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                >Product Name</span
              >
            </th>
            <th class="px-6 py-3 bg-gray-50">
              <span
                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                >Description</span
              >
            </th>
            <th class="px-6 py-3 bg-gray-50">
              <span
                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                >Price</span
              >
            </th>
            <th class="px-6 py-3 bg-gray-50">
              <span
                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                >Qty</span
              >
            </th>
            <th class="px-6 py-3 bg-gray-50">
              <span
                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                >Subtotal</span
              >
            </th>
            <th class="px-6 py-3 bg-gray-50"></th>
          </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
          <template v-for="item, index in carts" :key="item.id">
            <tr class="bg-white">
              <td
                class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
              >
                {{ item.name }}
              </td>
              <td
                class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
              >
                {{ item.desc }}
              </td>
              <td
                class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
              >
                Rp {{ (item.price).toLocaleString() }}
              </td>
              <td
                class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
              >
                {{ item.qty }}
              </td>
              <td
                class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
              >
                Rp {{ (item.qty * item.price).toLocaleString() }}
              </td>
              <td
                class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
              >
                <button
                  type="button"
                  @click="editCart(index)"
                  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                >
                  Edit
                </button>
                <button
                  type="button"
                  @click="deleteCart(index)"
                  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                >
                  Delete
                </button>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>

    <button
      type="submit"
      class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
    >
      Finish Transaction
    </button>
  </form>
</template>

<script setup>
import { reactive } from "vue";
import useCarts from "@/composables/carts";
import useProducts from "@/composables/products";
import useSales from "@/composables/sales";
import useCustomers from "@/composables/customers";
import { onMounted } from "vue";

const form_cart = reactive({
  product_id: "",
  qty: "",
  edit_state: false,
});

const form_sale = reactive({
  customer_id: "",
  cartData: []
});

const { products, getProducts } = useProducts();
const { customers, getCustomers } = useCustomers();
const { errors_sale, storeSale } = useSales();
const { errors, carts, getCarts, storeCart, getCartData, destroyCart, confirmUpdate } = useCarts();

onMounted(getProducts);
onMounted(getCarts);
onMounted(getCustomers);

const deleteCart = async (id) => {
  if (!window.confirm("Are you sure?")) {
    return;
  }
  await destroyCart(id);
  await getProducts();
  await getCarts();
};

const editCart = async (id) => {
  let cartData = await getCartData(id);
  form_cart.qty = cartData.qty;
  form_cart.product_id = cartData.id;
  form_cart.edit_state = true;
}

const saveSale = async () => {
  form_sale.cartData = carts.value;
  await storeSale({ ...form_sale });
};
const saveCart = async () => {
  form_cart.edit_state
    ? await confirmEdit()
    : await storeCart(form_cart.qty, products.value.filter((item) => item.id == form_cart.product_id)[0]);
};

const confirmEdit = async () => {
  await confirmUpdate(form_cart.qty, products.value.filter((item) => item.id == form_cart.product_id)[0]);
  cancelEdit();
}

const cancelEdit = async () => {
  form_cart.qty = "";
  form_cart.product_id = "";
  form_cart.edit_state = false;
}

</script>
