 <template>
     <tbody>
        <tr v-for="skeleton in 15">
            <td>
                <skeleton-loader-vue
                    type="rect"
                    :height="15"
                    class="m-3"
                    animation="fade"
                    />
            </td>

            <td>
                <skeleton-loader-vue
                    type="rect"
                    :height="15"
                    class="m-3"
                    animation="fade"
                    />
            </td>

            <td>
                <skeleton-loader-vue
                    type="rect"
                    :height="15"
                    class="m-3"
                    animation="fade"
                    />
            </td>

            <td>
                <skeleton-loader-vue
                    type="rect"
                    :height="15"
                    class="m-3"
                    animation="fade"
                    />
            </td>

            <td>
                <skeleton-loader-vue
                    type="rect"
                    :width="70"
                    :height="15"
                    class="m-3"
                    animation="fade"
                    />
            </td>
        </tr>
    </tbody>
 </template>

 <script>
    export default {
        components: {
            'skeleton-loader-vue': window.VueSkeletonLoader,
        },
        props: {
            // spinner: {
            //     type: String,
            //     default: '',
            // },
           
        },
        mounted() {
            console.log('Skeleton Component mounted.')
        }
    }
</script>