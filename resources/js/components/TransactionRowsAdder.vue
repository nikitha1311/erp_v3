<template>
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Invoice Rows Adder<small></small>

            </h5>
                 <div>
                        <button class="btn btn-primary" @click="show = !show">
                            <div v-if="!show">
                                <i class="fa fa-eye"></i>
                                <span>Show</span>
                            </div>
                            <div v-else>
                                <i class="fa fa-ban"></i>
                                <span>Hide</span>
                            </div>
                        </button>
                </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped m-table" id="transaction-index">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>LHA & GCs</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Truck Type</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(row,index) in transactions">
                    <td>
                        <a :href="`/transactions/${row.id}`" target="_blank">TRN#{{ row.id }}</a>
                    </td>
                    <td>{{ row.date | shortDate }}</td>
                    <td>
                        <p>
                            <b>LHA : </b>
                            <a v-if="row.default_l_h_a" target="_blank" :href="getLHALink(row.default_l_h_a.id)">
                                {{ row.default_l_h_a.number }}
                            </a>
                            <a v-else>No LHA</a>
                        </p>
                        <p>
                            <b>GCs : </b>
                            <span class="twpr-2" v-for="gc in row.goods_consignment_notes">
                                <a target="_blank" :href="getGCLink(gc.id)">{{ gc.number }}</a>
                            </span>
                        </p>
                    </td>
                    <td>
                        {{ row.route.from.formatted_address | formatted_address }}
                    </td>
                    <td>
                        {{ row.route.to.formatted_address | formatted_address }}
                    </td>
                    <td>
                        {{ row.route.truck_type.name }}
                    </td>
                    <td class="d-flex justify-content-around">
                        <button @click="addRow(index)" class="btn btn-sm btn-primary" v-if="row.status == null">
                            <i class="fa fa-check"></i>
                        </button>
                        <i class="fa fa-spin fa-refresh" v-if="row.status == 'updating'">

                        </i>
                        <p v-else>
                            {{ row.status }}
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <div class="panel-footer">

        </div>
    </div>
</template>
<script>
    import moment from 'moment';
    export default{
        props : ['invoice'],
        filters: {
            shortDate: function (date) {
                if (!date) return ''
                    return moment(date).format('ll')
            },
            formatted_address : function(address){
                if (!address) return ''
                    return address.split(",")[0];
            }
        },
        data(){
            return {
                'transactions' : '',
                'table' : '',
                'show' : false,
            }
        },
        mounted(){
            this.initTable();
        },
        methods : {
            initTable(){
                this.transactions = '';
                var self = this;
                axios.get(`/customers/${this.invoice.customer_id}/transactions`).then((data)=>{
                    self.transactions = data.data;
                    setTimeout(()=>{
                        $('#transaction-index').dataTable({
                            aaSorting : [],
                        });
                    },1000)
                })
            },
            getGCLink(gcID){
                return `/goods-consignment-notes/${gcID}`;
            },
            getLHALink(lhaID){
                return `/loading-hire-agreements/${lhaID}`;
            },
            getGCs(gcs){
                let gc = "";
                for(var i=0;i<gcs.length;i++)
                    gc += gcs[i].number + ",";
                return gc;
            },
            addRow(index){
                console.log(index)
                var self = this;
                self.$set(self.transactions[index], 'status', 'updating');

                axios.post(`/invoices/${this.invoice.id}/invoice-rows`,{
                    'transaction_id' : self.transactions[index].id,
                }).then((data)=>{
                    self.$set(self.transactions[index], 'status', data.data);
                }).catch((error)=>{
                    self.$set(self.transactions[index], 'status', 'Error');
                })
            },
        }
    }
</script>
