class Piece{
    constructor(col, row){
        this.X = boardLeft + pieceSize * col + 5 * (col + 1);
        this.Y = boardTop + pieceSize * row + 5 * (row + 1);

        this.Number = row * 4 + col + 1;
    }

    Draw(){
        ctx.fillStyle = "#000";
        ctx.fillRect(this.X, this.Y, pieceSize, pieceSize);
        ctx.fillStyle = "#fff";
        ctx.textAlign = "center";
		ctx.textBaseline = "middle";
		ctx.font = "20px Zen Kaku Gothic New";
		ctx.fillText(this.Number, this.X+pieceSize*0.5, this.Y+pieceSize*0.5);
    }

    IsClick(x, y){
        if(x < this.X || this.X + pieceSize < x){
            return false;
        }
        else if(y < this.Y || this.Y + pieceSize < y){
            return false;
        }

        return true;
    }

    Check(){
        let col = Math.round((this.X - boardLeft)/pieceSize);
        let row = Math.round((this.Y - boardTop)/pieceSize);

        if((row * 4 + col + 1) === this.Number){
            return true;
        }
        else{
            return false;
        }
    }
    
}