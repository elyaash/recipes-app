import { reactive } from "vue";

export const useRecipes = () => {
    return reactive({
        recipes: [],
        pagination: {
            current_page: 1,
            from: 1,
            last_page: 1,
            total: 1
        }
    });
}
