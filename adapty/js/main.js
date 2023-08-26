window.addEventListener('load', function () {

    if (document.documentElement.clientWidth < 768) {
        document.querySelector('.lang_choose').addEventListener('click', function(){
            document.querySelector('.lang_choose .submenu').classList.toggle('show');
        })	
    }

   /* document.querySelector('.select-countries').addEventListener('click', function(){
        document.querySelector('.select-countries .menu-flags').classList.toggle('show');
    })*/
})








