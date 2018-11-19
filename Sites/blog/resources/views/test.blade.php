<!doctype html>
<html xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue</title>
    <script src="https://vuejs.org/js/vue.js"></script>
</head>
<body>
    <div id="s1">
        <span v-html="message"></span>
        <p>reverseMessage:@{{ reverseMessage }}</p>
        <span>@{{ true ? "mustache双大括号语法必须要使用表达式" : "no"}}</span>
        <p v-if="seen">v-if if seen is true,you can see me</p>
        <p v-bind:href="true ? 'Yes' : 'No'">@{{ href }}</p>
        <p>@{{ FullName }}</p>
        <div v-bind:class="[isActive,errorClass]">bind-class-array</div>
    </div>
</body>
<script type="text/javascript">
    var span = new Vue({
        el : "#s1",
        data : {
            message : 'hello vue',
            seen : true,
            href : '',
            firstName : 'Cao',
            LastName : 'xiang',
            isActive : true,
            errorClass : 'text-danger'
        },
        computed :{
            reverseMessage : function(){
                return this.message.split('').reverse().join('')
            },
/*            FullName : function(){
                return this.firstName + ' '+ this.LastName;
            }*/
            FullName : {
                get : function(){
                    return this.firstName+ ' '+ this.LastName
                },
                set : function(newName){
                    var names = newName.split(' ');
                    this.firstName = names[0];
                    this.LastName = names[names.length-1]
                }
            },
        }
    })
</script>
</html>
