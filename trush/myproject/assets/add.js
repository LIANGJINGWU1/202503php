document.getElementById('postForm').addEventListener('submit', function (e) {
    e.preventDefault();
    //当前表单的输入数据打包进FormData对象里
    const formData = new FormData(this);
    //用js发一个post请求到下面服务器地址，方式和数据
    //fetch是异步操作，1.发出请求，2.拿回返回结果，执行then
    //浏览器fetch()是以当前页面为基准,在add.php里
    fetch('api/add_post.php', {
        method: 'POST',
        body: formData,
    })
        //res是服务器返回的结果,把响应内容转正json
        .then(res => res.json())
        //data是解析好的对象，判断是否成功
        .then(data => {
            if(data.success){
                document.getElementById('message').innerText = '提交成功';
                this.reset();
            } else document.getElementById('message').innerText = '提交失败';
        })
        .catch(err => {
            console.error('错误', err)
            document.getElementById('message').innerText = '提交出错';
        });
})
//fetch(请求地址, 配置对象)
//     .then(响应 => 响应处理)
//     .then(拿到的数据 => 做点什么)
//     .catch(异常 => 处理异常);