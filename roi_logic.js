const video = document.querySelector(".video");
const canvas = document.querySelector(".video_overlay");

const ctx = canvas.getContext("2d");
const src = video.src.replace(".mp4", ".json");

let rois;
let colors = ["#6a61ab", "#b0cc52", "#d58c3e", "#d34071"]
let unique_colors = {}

fetch(src, {method: 'GET', credentials: 'same-origin'})
    .then( res => res.json() )
    .then( res => {
        rois = res;
        start();
    } )

video.addEventListener('loadeddata', event => {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    start();
})

function start(){
    unique_colors = gen_unique_colors();
    draw_rois();
}

function gen_unique_colors(){
    let unique_colors = {}

    for(entry of Object.values(rois.rois)){
        for(key of Object.keys(entry)) {
            if(!(key in unique_colors)){
                console.log(key)
                unique_colors[key] = colors.pop();
            }
        }
    }

    return unique_colors;
}

function draw_rois(){
    let time = Math.ceil(video.currentTime * 25);

    ctx.clearRect(0,0,canvas.width, canvas.height);

    if(time in rois.rois){
        rois_at_frame = rois.rois[time]

        for(entry of Object.entries(rois_at_frame)) {
            let [x, y, w, h] = entry[1]
    
            ctx.lineWidth = 5;
            ctx.strokeStyle = unique_colors[entry[0]] || '#FFFFFF';
            ctx.strokeRect(x, y, w, h);
            ctx.closePath();
        }
    }

    window.requestAnimationFrame(draw_rois)
}