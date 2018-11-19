<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://vuejs.org/js/vue.js"></script>
</head>
<body>
    <div id="app">
        <h1 v-if="ok">ok</h1>
        <h2 v-else >no</h2>
        <h1 v-show="ok">v-show</h1>
    </div>
</body>
<script type="text/javascript">
    var app = new Vue({
        el : '#app',
        data : {
            ok : true
        }
    })
</script>
</html>
