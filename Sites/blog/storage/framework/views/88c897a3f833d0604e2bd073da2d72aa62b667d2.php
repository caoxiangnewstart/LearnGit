<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://vuejs.org/js/vue.js"></script>
    <script src="https://unpkg.com/vuex"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
</body>
<script type="text/javascript">
    Vue.use(Vuex)
    //创建一个store
    const store = new Vuex.Store({
        state: {
            todos: [
                { id:1, text: '1...1',done: true},
                { id:2, text: '2...2',done: false},
                { id:3, text: '3...3',done: true}
            ]
        },
        mutations: {
            increment(state){
                state.count++
            }
        },
        getters: {
            doneTodos: state =>{
                return state.todos.filter(todo => todo.done).length
            },
            getTodoById : state => id =>{
               return state.todos.find(todo => todo.id ===id)
            }
        }
    })

    //创建一个counter组件
    const Counter = {
        template : `<div> {{ doneTodosDoneLength }} </div>`,
        computed : {
            count() {
                return this.$store.state.count;
            },
            doneTodosDoneLength()  {
                return this.$store.getters.doneTodos;
            }
        }
    }

    const app = new Vue({
        el : '#app',
        store,
        components: { Counter },
        template: `
        <div class="app">
            <counter></counter>
        </div>
        `
    })
</script>
</html>
