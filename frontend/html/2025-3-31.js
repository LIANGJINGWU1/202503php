// $('#title').hide();
// document.getElementById("title").style.display = "none";
// $('#header').css("background-color","#B2B2B2");
// $(".content").addClass('text-right');
// $('p').text("what the fuck");
// $('*').css("margin","30");
// $("h1,p,title").hide();
// $('div .title').css("color","red");
// $('.content-2 > span').css("color","red");//直接子元素选择器
// $('#content-2 + p').css("color","red")//相邻选择器
// let titleElement = $('#title');
// let html = titleElement.html();//HTML内容
// let text = titleElement.text();//元素 的文本内容
// console.log(html,text);
// let content4 = $('#content4');
// content4.html("<h4>这是标题h4</h4>");//修改样式
// // content4.text("修改后的content4");//内容
// let input = $('#input-1');
// let value = input.val();//获取
// console.log(value);
// input.val("fuck word");//修改
// //.attr()方法
// let link = $("#href");
// let href = link.attr("href")
// console.log(href);
// link.attr("href","https://www.baidu.com");
// link.text("百度");
// let remove = $("#removeAttr");
// remove.removeAttr("style");
// link.removeAttr("href");
// //prop方法，获取布尔类型
// let option = $("#city option[value='bei']");
// let selected = option.prop('selected');
// console.log(selected);
// // 结构操作
// // .append 方法用于在元素内部的最后面添加内容
// // .prepend 方法用于在元素内部的最前面添加内容
// // .after 方法用于在元素后面添加内容
// // .before 方法用于在元素前面添加内容
// // .remove 方法用于移除元素
// // .empty 方法用于移除元素内部的所有内容
// let ul = $("#ul");
// ul.append("<li>4</li>");
// ul.prepend("<li>0</li>");
// ul.after("<h1>前</h1>");
// ul.before("<h1>后</h1>");
// ul.empty();
// // 事件操作
// // .on 方法用于绑定事件, 第一个参数是事件名称, 第二个参数是事件处理函数
let button1 = $("#666");
// button1.on("mouseover",function(){
//     button1.css("background-color","#FF0000");
// })
// // .one 方法用于绑定事件, 但是只会执行一次
// button1.one("click",function(){
//     button1.css("background-color","blue");
// })
// .focus 方法用于绑定 focus 事件
// let button2 = $("#input-2");
// button2.focus(function(){
//     // button2.attr("value","2");
// })
// .off 方法用于解绑事件
// button1.toggle();
// button1.fadeIn(2000);
// button1.fadeOut(2000);
// button1.fadeToggle();
let ul = $("#ul");

ul.slideUp(3000);ul.slideDown(3000);
let ajaxBtn = $("#ajax-btn");
let ajaxContentUl = $("#ajax-content-ul");
ajaxBtn.on("click", function () {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts",
        method: "GET",
        dataType: "json",
        success: function (data) {
            data.forEach(function (item) {
                ajaxContentUl.append(
                    "<li>UserID: " + item.userId +
                    ", ID: " + item.id +
                    ", Title: " + item.title +
                    ", Body: " + item.body + "</li>");
            });
        },
        error: function (error) {
            console.log(error.message);
        }
    });
});
ajaxBtn.on("click", function () {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts",
        method: "POST",
        dataType: "json",
        formData: {
            userId: 1,
            title: "Hello World!",
            body: "Hello World!"
        },
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(error.message);
        }
    });
});