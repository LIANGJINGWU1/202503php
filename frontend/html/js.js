document.getElementById("button_click").addEventListener("click",function()
    {
    alert("这是单击事件");
    });
    document.getElementById("button_click").addEventListener("click",function()
    {
    alert("这是双击事件");
    });
document.getElementById("button_mousedown").addEventListener("mousedown",function(event){
    alert("这是鼠标按压拖拽事件");
    console.log("Mouse button pressed:", event.button);//0左键 1中键 2右键
});
document.getElementById("button_mousemove").addEventListener("mousemove",function(){
    const x = document.getElementById("button_mousemove");
    x.style.backgroundColor = "blue";
});
document.getElementById("button_mousemove").addEventListener("mouseout",function(){
    const x = document.getElementById("button_mousemove");
    x.style.backgroundColor = "pink";
})
function onff(){
    const x = document.getElementById("onff");
    x.placeholder = "请输入你的名字";
    x.style.width = "800px";
    alert("获取焦点成功");
}
document.getElementById("onff").addEventListener("focus",onff);
function remove(){
    document.getElementById("onff").removeEventListener("focus",onff);
    alert("移除成功");
}
setTimeout(remove,5000);
let parent = document.getElementById("parent");
let child = document.getElementById("child");
parent.addEventListener("click",function(event){
    alert("父元素被点击了！");
    
});
child.addEventListener("click",function(event){
    alert("子元素被点击了！");
    event.stopPropagation();//阻止事件冒泡
});




// document.getElementById("onff").addEventListener("blur",function(){
//     const x = document.getElementById("onff");
//     x.removeEventListener("focus",)
//     // x.placeholder = "";
//     // x.style.width = "";
// });

// for (let i = 0; i < 3; i++) {
//     console.log(i);
// }
// let a=1;
// while( a<3){
//     console.log(a);
//     a++;
// }
// let b = 2;
// do{
//     console.log(b);
//     b++;
// }while(b<3);
// let userInfo = {
//     usrname: "John",
//     age: 25,
//     city: "New York"
// }
// let phone = ["iPhone", "Samsung", "Huawei"];
// console.log(userInfo.usrname);
// console.log(phone[2]);
// for (let key in userInfo)//遍历对象
//      {
//     console.log(key);//属性名称
//     console.log(userInfo[key]);//属性值
//     }
// for(let st of phone)//遍历数组 字符串，set集合，map集合
//     {
//     console.log(st)
// }
// for (let c = 4; c < 8; c++) {
//     if (c == 6) {
//         continue;
//     }
//     if (c == 7) {
        
//         console.log(c);
//         break;
//     }
//     console.log(c);
    
// }
// let jiantou = (a, b) => a * b;
// console.log(jiantou(2,5));
// function ab(name = "666"){
//     return name;
// }
// console.log(ab());
// console.log(ab("777"));
//解构参数
// function abe([a,b])
// {
   
//     return (`${a}+${b}= ${a+b}`);
// }
// let cc = [1,2];
// console.log(abe(cc));
// let globalVar = 5;
// function df( ){
//     let  localVar = 10;
//     console.log(globalVar);
//     console.log(localVar);
// }
// df();
// function bibao(){
//     let cf = 2;
//     return function(){
//         cf++;
//         return cf;
//     }
// }
// let awsdaslk = bibao();
// console.log(awsdaslk());
// console.log(awsdaslk());
//单击事件



// function a1(Arr){
//     // const container=document.getElementById('a1');
//    const container = document.getElementById("arrayContainer");
//     let htmlContent = "<ul>";

//     arr.forEach(item => {
//         htmlContent += `<li>${item}</li>`;
//     });

//     htmlContent += "</ul>";
//     container.innerHTML = htmlContent; 

// for(i=0;i<car.lengty;i++)
// {+
//     Document.write(car[i]+"<br>");
// }

// }
// var i = 0;
// var car=new Array();
// car[0] = '1';
// car[1] = '2';
// car[2] = '3';
// a1();
// 声明一个函数来展示数组
// function displayArray(arr) {
//     const container = document.getElementById("arrayContainer");
//     let htmlContent = "<ul>";  

//     for (let i = 0; i < arr.length; i++) {
//         htmlContent += `<li>${arr[i]}</li>`;
//     }

//     htmlContent += "</ul>";
//     container.innerHTML = htmlContent;
// }

// const fruits = ["🍎 苹果", "🍌 香蕉", "🍇 葡萄", "🍓 草莓", "🍑 桃子"];
// displayArray(fruits);

// var user = "John";
// let age = 25;
// var user2 = "中国人";
// const pi =3.14;
// let a = true;
// let b = false;
// let c= null;
// let d = undefined;
// let e = {name: "John", age: 25};
// console.log(e)
// let f = [1, 2, 3, 4, 5];
// console.log(f);
// console.log(typeof user);
// console.log(typeof age);
// console.log(typeof user2);
// console.log(typeof pi);
// console.log(typeof a);
// console.log(typeof b);
// console.log(typeof c);
// console.log(typeof d);
// console.log(typeof e);
// let g = 5;
// let h = 3;
// console.log(g+h);
// console.log(g-h);
// console.log(g*h);
// console.log(g/h);
// console.log(g%h);
// console.log(g**h);
// console.log(g++);
// console.log(g--);
// console.log(++g);
// console.log(--g);
// let a1="80";
// let a2=90;
// let a3=80;
// console.log(a1==a2);
// console.log(a1>a3);
// console.log(a1<a2);
// console.log(a1!=a2);
// console.log(a1===a3);
// console.log(a1!=a3)//!= 是非严格不等运算符，它会自动进行类型转换后再比较值。
// console.log(a1!==a3);
// let b1 = true;
// let b2 = false;
// console.log(b1 && b2);
// console.log(b1 || b2);
// console.log(!b1);
// let sanyuan = true;
// let result = sanyuan ? "姬你好美" : "姬你不美";
// console.log(result);
// let nedann = 1;
// switch(nedann) {
//     case 1:
//         console.log("你好");
//         break;
//     case 2:
//         console.log("你不好");
//         break;
//     default:
//         console.log("好你嘛");
// }


