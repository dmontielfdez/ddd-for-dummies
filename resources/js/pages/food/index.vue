<template>
    <div class="container">
        <h1>
            Food List
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFoodModal">New food</button>
        </h1>

        <div class="row">
            <div class="col-md-12">
                <div class="table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Proteins</th>
                            <th>Fats</th>
                            <th>Carbs</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="food in foods">
                            <td>{{ food.name }}</td>
                            <td :class="
                            {
                                'text-warning': food.status === 'draft',
                                'text-success': food.status === 'published',
                            }">
                                {{ food.status }}
                            </td>
                            <td>{{ food.proteins }} grs</td>
                            <td>{{ food.fats }} grs</td>
                            <td>{{ food.carbs }} grs</td>
                            <td>{{ food.amount }} {{ food.type }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" v-if="food.status === 'draft'"
                                        @click="publishFood(food.id)" :disabled="publishFoodForm.processing">Publish
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createFoodModal" tabindex="-1" aria-labelledby="createFoodModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createFoodModalLabel">New food</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form
                    @submit.prevent="
                                    createFoodForm.post(
                                        $route('food.create',{}),
                                         {
                                             preserveScroll: true,
                                             onSuccess: () => closeModal()
                                         })
                                    ">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" v-model="createFoodForm.name" required>
                            <div v-if="createFoodForm.errors.name" class="text-danger">
                                Mandatory field
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Prots</span>
                            <input type="number" class="form-control" v-model="createFoodForm.proteins">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Fats</span>
                            <input type="number" class="form-control" v-model="createFoodForm.fats">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Carbs</span>
                            <input type="number" class="form-control" v-model="createFoodForm.carbs">
                        </div>

                        <select class="form-select mb-3" v-model="createFoodForm.portionType">
                            <option value="0">Uds</option>
                            <option value="1">Grams</option>
                            <option value="2">Teaspoons</option>
                        </select>

                        <div class="mb-3">
                            <label for="name" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="name" v-model="createFoodForm.amount"
                                   required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" :disabled="createFoodForm.processing">Save food
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "index",
    props: ['foods'],
    data() {
        return {
            createFoodForm: useForm({
                name: null,
                proteins: null,
                fats: null,
                carbs: null,
                portionType: 0,
                amount: null,
            }),
            publishFoodForm: useForm({})
        }
    },
    methods: {
        closeModal() {
            bootstrap.Modal.getInstance(document.getElementById('createFoodModal')).hide();
        },
        publishFood(foodId) {
            this.publishFoodForm.post(route('food.publish', {foodId: foodId}))
        }
    }
}
</script>

<style scoped>
td {
    vertical-align: middle;
}
</style>
