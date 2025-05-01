<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script src="https://unpkg.com/vue@2.6.14/dist/vue.min.js"></script>
</head>
<body>
            <div id = "test2">
                <h1>这是{{title}}</h1>
                <h1>{{details()}}</h1>
            </div>
</body>
<script>
    var vm = new Vue({
        el: '#test2',
        data:{
            title:"test2"
        },
        methods:{
            details: function ()
            {
                return "zheshi test 2";
            }
        }
    })
</script>
</html>
<?php /**PATH E:\laragon\www\laravel\resources\views/tests/index2.blade.php ENDPATH**/ ?>