<template>
    <div>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>No of articles</label>
                    <input type="text" class="form-control" v-model="newGood.no_of_articles">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Description of Goods</label>
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="newGood.desc">
                        <div class="input-group-btn">
                            <button v-on:click.prevent="addGoods()" class="btn btn-primary"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <table v-if="goods.length" id="goodsTable" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th>No of Articles</th>
                    <th>Description of goods</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(good,index) in goods">
                    <td>{{ good.no_of_articles }}</td>
                    <td>{{ good.desc }}</td>
                    <td>
                        <button v-on:click.prevent="goods.splice(index,1)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="text" name="desc" v-bind:value=computedGoods hidden>
        </div>
    </div>

</template>

<script>
    export default{
        props: ['desc'],
        mounted(){
            this.goods = [];
            if (this.desc)
                for (var i = 0; i < this.desc.length; i++) {
                    this.goods.push(this.desc[i]);
                }
        },
        data(){
            return {
                newGood: {
                    no_of_articles: '',
                    desc: ''
                },
                goods: []
            };
        },
        computed: {
            computedGoods(){
                return JSON.stringify(this.goods);
            }
        },
        methods: {
            addGoods(){
                if (this.newGood.no_of_articles != '' && this.newGood.desc != '') {
                    this.goods.push({
                        no_of_articles: this.newGood.no_of_articles,
                        desc: this.newGood.desc
                    });
                    this.newGood.no_of_articles = '';
                    this.newGood.desc = '';
                    $('#goodsTable').DataTable().destroy();
                }
                else {
                    flash('danger', 'Give articles details')
                }
            },
            removeObject(index){

            }
        }
    }
</script>