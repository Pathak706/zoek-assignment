// When true, moving the mouse draws on the canvas
let isDrawing = false;
let x = 0;
let y = 0;

const myPics = document.getElementById("myPics");
const context = myPics.getContext("2d");
var triangleObj = [];
// event.offsetX, event.offsetY gives the (x,y) offset from the edge of the canvas.

// Add the event listeners for mousedown, mousemove, and mouseup
myPics.addEventListener("mousedown", (e) => {
    x = e.offsetX;
    y = e.offsetY;
    isDrawing = true;
    if (!triangleObj.length) triangleObj.push({ x, y });
    console.log("validate triangle", triangleObj);
    if (triangleObj.length > 3) {
        clearCanvas();
    }
});

myPics.addEventListener("mousemove", (e) => {
    if (isDrawing === true) {
        drawLine(context, x, y, e.offsetX, e.offsetY);
        x = e.offsetX;
        y = e.offsetY;
    }
});

window.addEventListener("mouseup", (e) => {
    if (isDrawing === true) {
        drawLine(context, x, y, e.offsetX, e.offsetY);
        x = 0;
        y = 0;
        isDrawing = false;
        triangleObj.push({ x: e.offsetX, y: e.offsetY });
        console.log("validate triangle", triangleObj);
    }
});

function drawLine(context, x1, y1, x2, y2) {
    context.beginPath();
    context.strokeStyle = "black";
    context.lineWidth = 1;
    context.moveTo(x1, y1);
    context.lineTo(x2, y2);
    context.stroke();
    context.closePath();
}

function clearCanvas() {
    context.clearRect(0, 0, myPics.width, myPics.height);
    triangleObj = [];
    window.location.reload();
}

function validate() {
    console.log("validate triangle", triangleObj);
    // can be re-factored  later
    let x1 = triangleObj[0]["x"],
        y1 = triangleObj[0]["y"],
        x2 = triangleObj[1]["x"],
        y2 = triangleObj[1]["y"],
        x3 = triangleObj[2]["x"],
        y3 = triangleObj[2]["y"],
        x4 = triangleObj[3]["x"],
        y4 = triangleObj[3]["y"];
    if (Math.abs(x1 - x4) < 10 && Math.abs(y1 - y4) < 10) {
        let sideA = getDistance(x1, y1, x2, y2);
        let sideB = getDistance(x2, y2, x3, y3);
        let sideC = getDistance(x3, y3, x4, y4);
        if (
            sideA + sideB > sideC &&
            sideB + sideC > sideA &&
            sideA + sideC > sideB
        ) {
            alert("The Triangle made is almost valid.");
        } else {
            alert("You might formed triangle but they don't follow our conditions.");
        }
        window.location.reload();
    } else {
        alert("The Triangle made is not valid.");
        clearCanvas();
    }
}

function getDistance(xA, yA, xB, yB) {
    var xDiff = xA - xB;
    var yDiff = yA - yB;

    return Math.sqrt(xDiff * xDiff + yDiff * yDiff);
}
