import './bootstrap';

let prev = '';
let apiBase='/api/messages';

$('.button').click(function(){
    let current = $('.light.active');
    if(current.length){
        let colorArr =  $('.light.active').attr('class').split(' ').filter((x) => {
            return x != 'active' && x != 'light'
        })
        let color = colorArr[0];
        switch(color){
            case 'green':
                sendMessage('Проезд на зеленый!');
            break;
            case 'red':
                sendMessage('Проезд на красный. Штраф!');
            break;
            case 'yellow':
                if(prev == 'red'){
                    sendMessage('Слишком рано начали движение!');
                } else {
                    sendMessage('Успели на желтый!');
                }
            break;
        }
    }
})


function sendMessage(mess){
    $('#clickedMess').text(mess)
    $.ajax({
        type: "POST",
        url: apiBase,
        data: {mess:mess},
        fail :function() {
            alert("error");
        }
    });
}

function deactivateAll() {
    $('.light').removeClass('active')
}

function activeRed() {
    prev = 'red';
    // $('#prev').text('red')
    $('.red.light').first().addClass('active')
    return returnResolvedPromise(5000)
}

function activeGreen() {
    prev = 'green';
    // $('#prev').text('green')
    $('.green.light').first().addClass('active')
    return returnResolvedPromise(5000)
}

function activeYellow() {
    $('.yellow.light').first().addClass('active')
    return returnResolvedPromise(2000)
}

function switchLights(arr) {
    let p = Promise.resolve()
    for (var i = 0; i < arr.length; i++) {
        p = p.then(arr[i]);
    }
    return p
}

function returnResolvedPromise(ms) {
    return new Promise(resolve => {
        setTimeout(() => {
            deactivateAll()
            resolve(true)
        }, ms)
    })
}
let p = switchLights([activeGreen, activeYellow, activeRed, activeYellow, activeGreen])
p.then($('.button').disable)




