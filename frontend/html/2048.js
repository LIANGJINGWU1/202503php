const boardSize = 4;
let board = [];
function initBoard(){
    board = [];
    for(let i = 0; i < boardSize ; i++){
        board.push(new Array(boardSize).fill(0));
    }
    
}
//随机生成数字2/4
// Math.random()	得到 0~1 之间的随机小数
// Math.random() * N	得到 0~N 之间的随机小数
// Math.floor(Math.random()*N)	得到 0 到 N-1 的整数索引
function generateRandom(){
    let empty = [];
    for(let r = 0; r < boardSize;r++){
        for(let c = 0; c < boardSize; c++){
            if(board[r][c]===0){
                empty.push({r,c});
            }
           
        }
    }
    if (empty.length === 0) return;
    let {r,c} = empty[Math.floor(Math.random() * empty.length)];//解构获得r，c的值
    board[r][c] = Math.random() < 0.9? 2 : 4;
}
function renderBoard(){
    const $board = $("#board");
    for (let r = 0; r < boardSize; r++){
        const $row = $('<div class = "row d-flex justify-content-center align-items-center"></div>');//生成一个dom元素，本身是jq对象
        for(let c = 0; c < boardSize; c++){
            const value = board[r][c];
            const $cell = $('<div class = "cell col-1" ></div>')
            .attr("id",`cell-${r}-${c}`)//添加id
            .text(value === 0? "":value)
            .addClass(value ? `num-${value}` : "");

            $row.append($cell);
        }
        $board.append($row);
    }
}
function moveLeft(r,c) { 
    let a,b,sum;
    a=$(`#cell-${r}-${c}`).text();
    b=$(`#cell-${r}-${c-1}`).text();
    sum=parseInt(a)+parseInt(b);
    if(parseInt(a)===parseInt(b)){
        $(`#cell-${r}-${c-1}`).text(parseInt(a)+parseInt(b)).addClass(`num-${sum}`);
        $(`#cell-${r}-${c}`).text("").removeClass(`num-${parseInt(a)}`);
        generateRandom();
    }
   

    
 }
function moveRight(r,c) { 
    let a,b;
    a=$(`#cell-${r}-${c}`).text();
    b=$(`#cell-${r}-${c+1}`).text();
    if(parseInt(a)===parseInt(b)){
        $(`#cell-${r}-${c+1}`).text(parseInt(a)+parseInt(b))
        $(`#cell-${r}-${c}`).text("");
        generateRandom();
        
    }
    

    
 }
function moveUp(r,c){
    let a,b;
    a=$(`#cell-${r}-${c}`).text();
    b=$(`#cell-${r-1}-${c}`).text();
    if(parseInt(a)===parseInt(b)){
        $(`#cell-${r-1}-${c}`).text(parseInt(a)+parseInt(b))
        $(`#cell-${r}-${c}`).text("");
        generateRandom();
    }
    
}
function moveDown(r,c){
    let a,b;
    a=$(`#cell-${r}-${c}`).text();
    b=$(`#cell-${r+1}-${c}`).text();
    if(parseInt(a)===parseInt(b)){
        $(`#cell-${r+1}-${c}`).text(parseInt(a)+parseInt(b))
        $(`#cell-${r}-${c}`).text("");
        generateRandom();
    }
    
}
let startX,startY;
function addLis(){
    for(let r=0;r<boardSize;r++){
        for(let c=0;c<boardSize;c++){
             $(`#cell-${r}-${c}`).on("mousedown",function(e){
                startX = e.pageX;
                startY = e.pageY;
                console.log(startX);
                console.log(startY);
                
             })
             $(`#cell-${r}-${c}`).on("mouseup",function(e){
                let dx = e.pageX - startX;
                let dy = e.pageY - startY;
                if (Math.abs(dx) > Math.abs(dy)){
                    if (dx > 20) moveRight(r,c);
                    else if (dx < -20) moveLeft(r,c);
                }
                else{
                    if (dy > 20) moveDown(r,c);
                    else if (dy < -20) moveUp(r,c);
                }
             })
        }
    }
   

}





$(function(){
    $("#startBtn").one("click",(function(){
        
    initBoard();
    generateRandom();
    generateRandom();
    generateRandom();
    generateRandom();
    generateRandom();
    generateRandom();
    generateRandom();
    generateRandom();

    renderBoard();
    addLis();
    }))
    
})