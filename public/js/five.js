var chessBoard=[];
var chess=document.getElementById('chess');
var context=chess.getContext('2d');

var over =false;
//黑子先落下
var me=true;

//赢法数组
var wins=[];

//赢法的统计数组
var myWin=[];
var computerWin=[];

//检查这块地方是否已经有子
for(var i=0;i<15;i++){
   chessBoard[i]=[];
   for(var j=0;j<15;j++)
   	chessBoard[i][j]=0;
}

//设置一个三维数组
for(var i=0;i<15;i++){
     wins[i]=[];
     for(var j=0;j<15;j++){
     	wins[i][j]=[];
     }
}

//赢法种类的索引

var count=0;
for (var i=0;i<15;i++){
	for(var j=0;j<11;j++){
		for(var k=0; k<5;k++){
			wins[i][j+k][count]=true;
		}
		count++;
	}
}

//穷举法算出所有胜利的赢法
for (var i=0;i<15;i++){
	for(var j=0;j<11;j++){
		for(var k=0; k<5;k++){
			wins[j+k][i][count]=true;
		}
		count++;
	}
}

for (var i=0;i<11;i++){
	for(var j=0;j<11;j++){
		for(var k=0; k<5;k++){
			wins[i+k][j+k][count]=true;
		}	
		count++;
	}
}

for (var i=0;i<11;i++){
	for(var j=14;j>3;j--){
		for(var k=0; k<5;k++){
			wins[i+k][j-k][count]=true;
		}
		count++;
	}
}



for(var i=0;i<count;i++){
    myWin[i]=0;
    computerWin[i]=0;
}


context.strokeStyle="#BFBFBF";

var logo =new Image();
logo.src="/image/logo.jpg";

logo.onload=function(){
   context.drawImage(logo, 0, 0, 450,450);
    
   //绘制棋盘
   drawChessBoard();
   

}
var drawChessBoard= function(){
for(var i=0;i<15;i++){
  context.moveTo(15 +i*30,15);
  context.lineTo(15+i*30,435);
  context.stroke();

  context.moveTo(15 ,15+i*30);
  context.lineTo(435,15+i*30);
  context.stroke();
  }
}

//走棋子函数,第一个为x坐标，第二个为y坐标,第三个参数true为黑棋,false为白棋
var oneStep =function(i,j,me){
	console.log();
  context.beginPath();
   context.arc(15 +i*30,15 +j*30,13, 0 , 2 * Math.PI);
   context.closePath();
   context.gradient=context.createRadialGradient(15 +i*30+2,15 +j*30-2,13,15 +i*30+2,15 +j*30-2,0);
   var gradient=context.gradient;
   if(me){
   gradient.addColorStop(0,"#0A0A0A");
   gradient.addColorStop(1,"#636766");
   }else{
   gradient.addColorStop(0,"#D1D1D1");
   gradient.addColorStop(1,"#F9F9F9");
   }
   context.fillStyle=gradient;
   context.fill();
}


//绑定chess事件
chess.onclick =function(e){
	if(over){
		return;
	}
	if(!me){
		return;
	}
     var x =e.offsetX;
     var y =e.offsetY;
     var i =Math.floor(x / 30);
     var j =Math.floor(y / 30);
     if(chessBoard[i][j]==0){
       oneStep(i,j,me);
       if(me){
       	chessBoard[i][j]=1;
       }else{
       	chessBoard[i][j]=2;
       }
    
     //判断第k种赢法
     for(var k=0;k<count;k++){
     	if(wins[i][j][k]){
     		myWin[k]++;
     		computerWin[k]=6;
           if(myWin[k]==5){
           	window.alert("你赢了!");
           	over =true;
           }
     	}
     }
     if(!over){
     	me =!me;
     	computerAI();
     }
   }
}

//计算机AI算法

var computerAI=function(){
	var myScore=[];
	var computerScore=[];
	var max=0;
	var u=0,v=0;
	for(var i=0;i<15;i++){
		myScore[i]=[];
		computerScore[i]=[];
		for(var j=0;j<15;j++){
			myScore[i][j]=0;
			computerScore[i][j]=0;
		}
	}
	for(var i=0; i<15;i++){
		for(var j=0;j<15;j++){
			if(chessBoard[i][j] == 0){
				for(var k=0;k<count;k++){
					if(wins[i][j][k]){
						if(myWin[k]==1){
							myScore[i][j]+=200;
						}else if(myWin[k] ==2){
							myScore[i][j]+=400;
						}else if(myWin[k] ==3){
							myScore[i][k]+=2000;
						}else if(myWin[k] ==4){
							myScore[i][k]+=10000;
						}
						if(computerWin[k]==1){
							computerScore[i][j]+=220;
						}else if(computerWin[k] ==2){
							computerScore[i][j]+=420;
						}else if(computerWin[k] ==3){
							computerScore[i][k]+=2100;
						}else if(computerWin[k] ==4){
							computerScore[i][k]+=20000;
						}

					}
				};
				if(myScore[i][j]>max){
					max =myScore[i][j];
					u=i;
					v=j;
				}else if(myScore[i][j] ==max){
					if(computerScore[i][j]>computerScore[u][v]){
						u=i;
						v=j;
					}
				}

				if(computerScore[i][j]>max){
					max =computerScore[i][j];
					u=i;
					v=j;
				}else if(computerScore[i][j] ==max){
					if(myScore[i][j]>myScore[u][v]){
						u=i;
						v=j;
					}
				}
			}
		}
	}
	oneStep(u,v,false);
	chessBoard[u][v] = 2;
     if(wins[u][v][k]){
     		computerWin[k]++;
     		console.log(computerWin[k]);
     		myWin[k]=6;
            if(computerWin[k]==5){
           	window.alert("电脑赢了!");
           	over =true;
           }
     	}

     if(!over){
     	me =!me;
     }
 }