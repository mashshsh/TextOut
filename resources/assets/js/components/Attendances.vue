<template>
    <div>
        <div class="panel panel-default" v-for="attendance in attendances">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user" id="start"></span>
                 {{ attendance.name }} <label id="started">さん</label>
            </div>
            <div class="panel-body">
                <strong>本日の意気込み</strong>
                <p>{{ attendance.body }}</p>
            </div>
            <div class="panel-footer">
                <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ attendance.date }} |
                <span class="glyphicon glyphicon-flag" id="comment"></span>
                <a href="#" id="comments" @click="report(attendance.id)">Report</a>
            </div>
        </div>
        <paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'">
        </paginate>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                attendances: [],
                pageCount: 1,
                endpoint: 'api/attendances?page='
            };
        },
 
        created() {
            this.fetch();
        },
 
        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.attendances = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
 
            report(id) {
                if(confirm('この出席データを通報します。よろしいですか？')) {
                    axios.put('api/attendances/'+id+'/report')
                    .then(response => this.removeAttendance(id));
                }
            },
 
            removeAttendance(id) {
                this.attendances = _.remove(this.attendances, function (attendance) {
                    return attendance.id !== id;
                });
            }
        }
    }
</script>
