<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
</head>
<body>
    <div class="container">
        <div class="modal-content">
            <div class="modal-title">
                <p>@{{ message }}</p>
                <input type="text" v-model="message" placeholder="双向绑定">
                <ul>
                    <li v-for="todo in todos">@{{ todo.message }}</li>
                </ul>
            </div>
        </div>
        <div id="reverse" @click="wordreverse">
            @{{ message }}
        </div>
        <div id="app">
            checkbox:<input type="checkbox" v-model="toggle"
                   :false-value='a'
                   :true-value='b'
            >
            radio: <input type="radio" v-model="radio2" :value="a">

            参数特性number:<input v-model="age" number>
        </div>
    </div>
</body>
<script type="text/javascript">
    //v-model 通常绑定到字符串，但是如果是bool值可以用false-value，true-value来自定义绑定的值
    $click = new Vue({
        el : '#app',
        data : {
            toggle : '',
            a : 'hello',
            b : 'world',
            radio2 : '',
            age : ''
        },
        methods : {
            proEvent(event){
                event.preventDefault();
            }
        }
    })
</script>
<script type="text/javascript">
    $index = new Vue({
        el : ".modal-title",
        data: {
            message: 'hello world!',
            todos :[
                {message:'learn'},
                {message:'suffering'},
                {message:'happy'}
            ]
        }
    })
</script>
<script type="text/javascript">
    $reverse = new Vue({
        el : "#reverse",
        data : {
            message : "happy suffering learn no_result"
        },
        methods:{
            wordreverse(){
                this.message = this.message.split('').reverse().join('')
            },
        }
    })
</script>
</html>
