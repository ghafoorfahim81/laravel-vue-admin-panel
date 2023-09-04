<template>
<div>
   
    <div class="col-md-12">
        <div class="col-md-8">

            <renderless-laravel-vue-pagination :data="data" :limit="limit" :show-disabled="showDisabled" :size="size" :align="align" v-on:pagination-change-page="onPaginationChangePage">
                <ul class="pagination" :class="{
                'pagination-sm': size == 'small',
                'pagination-lg': size == 'large',
                'justify-content-center': align == 'center',
                'justify-content-end': align == 'right'
            }" v-if="computed.total > computed.perPage" slot-scope="{ data, limit, showDisabled, size, align, computed, prevButtonEvents, nextButtonEvents, pageButtonEvents }">

                    <li class="page-item pagination-prev-nav" :class="{'disabled': !computed.prevPageUrl}" v-if="computed.prevPageUrl || showDisabled">
                        <a class="page-link" href="#" aria-label="Previous" :tabindex="!computed.prevPageUrl && -1" v-on="prevButtonEvents">
                            <slot name="prev-nav">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </slot>
                        </a>
                    </li>

                    <li class="page-item pagination-page-nav" v-for="(page, key) in computed.pageRange" :key="key" :class="{ 'active': page == computed.currentPage }">
                        <a class="page-link" href="#" v-on="pageButtonEvents(page)">
                            {{ page }}
                            <span class="sr-only" v-if="page == computed.currentPage">(current)</span>
                        </a>
                    </li>

                    <li class="page-item pagination-next-nav" :class="{'disabled': !computed.nextPageUrl}" v-if="computed.nextPageUrl || showDisabled">
                        <a class="page-link" href="#" aria-label="Next" :tabindex="!computed.nextPageUrl && -1" v-on="nextButtonEvents">
                            <slot name="next-nav">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </slot>
                        </a>
                    </li>

                </ul>
            </renderless-laravel-vue-pagination>
        </div>
        <div class="col-md-4" id="pagination_count_element" style="margin-top:8px;">

            <span>
                <span id="pagination_showing_text">Showing</span>
                {{(data.from)?data.from:0}}
                <span id="pagination_to_text">To</span>
                {{(data.to)?data.to:0}}
                <span id="pagination_from_text">From</span>
                {{data.total}}
                <span id="pagination_record_text">Record</span>
            </span>

        </div>
    </div>

</div>
</template>

<script>
import RenderlessLaravelVuePagination from './RenderlessLaravelVuePagination.vue';

export default {
    props: {
        columns:{
            type:Array,
            default: () => []
        },
        data: {
            type: Object,
            default: () => {}
        },
        limit: {
            type: Number,
            default: 0
        },
        showDisabled: {
            type: Boolean,
            default: false
        },
        size: {
            type: String,
            default: 'default',
            validator: value => {
                return ['small', 'default', 'large'].indexOf(value) !== -1;
            }
        },
        align: {
            type: String,
            default: 'left',
            validator: value => {
                return ['left', 'center', 'right'].indexOf(value) !== -1;
            }
        }
    },

    data()
    {
        return{
            activeSortColumn:'name',
            activeSortDirection:'asc',
        }
    },

    watch: { 
      	columns: function(newVal, oldVal) { // watch it
          console.log('Prop changed: ', newVal, ' | was: ', oldVal)
        }
    },
    mounted() {
       
        for(var i=0;i<this.columns.length;i++)
        {
            if(this.columns[i].sort !=undefined && this.columns[i].activeSort !=undefined)
            {
                if(this.columns[i].activeSort===true)
                {
                    this.activeSortColumn=this.columns[i].name;
                    this.activeSortDirection=this.columns[i].sortDirection;
                    break;
                }  
            }
            
        }
        
    },

    methods: {
        onPaginationChangePage(page) {
            this.$emit('pagination-change-page', page);
        },
        getSortDirection(index)
        {   
            let dir='';
            if(this.columns[index] !=undefined)
            {
                if(this.columns[index].sort !=undefined)
                {
                    if(this.columns[index].sort===true)
                    {
                        
                        dir='asc';
                        
                        if(this.columns[index].sortDirection !=undefined)
                        {
                            dir=this.columns[index].sortDirection.toLowerCase();
                        }
                    }
                    
                }
                
            }

            return dir;
        }
    },

    components: {
        RenderlessLaravelVuePagination
    }
}
</script>
