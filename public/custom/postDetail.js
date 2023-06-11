const iconBtn = document.querySelector('#icon-btn');    // いいねアイコン
const addLikesP = document.querySelector('#add-likes-p');   // いいね数を表示するpタグ
const addLikes = document.querySelector('#add-likes');   // いいね数を保持・送信するtextbox
const dispLikes = document.querySelector('#display-likes');   // 「いいねをする画面」を表示するボタン
const dispDelete = document.querySelector('#display-delete');      // 「投稿削除画面」を表示するボタン
const modalLikes = document.querySelector('#modal-likes');     // いいね用モーダルウィンドウ
const modalDelete = document.querySelector('#modal-delete');     // 削除用モーダルウィンドウ
const cancelLikes = document.querySelector('#cancel-likes');
const cancelDelete = document.querySelector('#cancel-delete');


// アニメーションの設定
const showKeyframes = {
    opacity: [0, 1],
}
const hideKeyframes = {
    opacity: [1, 0],
}
const options = {
    duration: 600,
    easing: 'ease',
    fill: 'forwards',
}


// いいねアイコンがクリックされたら、いいね数を１追加する
iconBtn.addEventListener('click', () => {
    if (addLikesP.innerHTML < 5 && addLikes.value < 5){
        addLikesP.innerHTML = Number(addLikesP.innerHTML) + 1;
        addLikes.value = Number(addLikes.value) + 1;
    }
})


// 「いいねをする画面」を表示/非表示
let dispLikesStm = 'off';

dispLikes.addEventListener('click', () => {
    if (dispLikesStm === 'off'){
        modalLikes.style.display = 'block';    // displayプロパティの値を'block'に変更
        modalLikes.animate(showKeyframes, options);
        dispLikesStm = 'on';
        dispLikes.innerHTML = '▽ この投稿にいいねする'
    } else if (dispLikesStm === 'on'){
        modalLikes.style.display = 'none';    // displayプロパティの値を'none'に変更
        modalLikes.animate(hideKeyframes, options);
        dispLikesStm = 'off';
        dispLikes.innerHTML = '▷ この投稿にいいねする'
    }
})
cancelLikes.addEventListener('click', () => {
    if (dispLikesStm === 'on'){
        modalLikes.style.display = 'none';    // displayプロパティの値を'none'に変更
        modalLikes.animate(hideKeyframes, options);
        addLikesP.innerHTML = 0;
        addLikes.value = 0;
        dispLikesStm = 'off';
        dispLikes.innerHTML = '▷ この投稿にいいねする'
    }
})



// 「投稿削除画面」を表示/非表示
let dispDeleteStm = 'off';

dispDelete.addEventListener('click', () => {
    if (dispDeleteStm === 'off'){
        modalDelete.style.display = 'block';    // displayプロパティの値を'block'に変更
        modalDelete.animate(showKeyframes, options);
        dispDeleteStm = 'on';
        dispDelete.innerHTML = '▽ この投稿を削除する'
    } else if (dispDeleteStm === 'on'){
        modalDelete.style.display = 'none';    // displayプロパティの値を'none'に変更
        modalDelete.animate(hideKeyframes, options);
        dispDeleteStm = 'off';
        dispDelete.innerHTML = '▷ この投稿を削除する'
    }
})
cancelDelete.addEventListener('click', () => {
    if (dispDeleteStm === 'on'){
        modalDelete.style.display = 'none';    // displayプロパティの値を'none'に変更
        modalDelete.animate(hideKeyframes, options);
        dispDeleteStm = 'off';
        dispDelete.innerHTML = '▷ この投稿を削除する'
    }
})
