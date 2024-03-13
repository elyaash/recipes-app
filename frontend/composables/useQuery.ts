import { reactive } from "vue";
export const useQuery = () => {
    return reactive( {
            "page": 1,
            "email": "",
            "ingredient": "",
            "keyword":""
    }
   );
}
