let blackbgPoups = document.querySelector('.blackbgPoups');
let inscription = document.querySelector('.insc_span');
let login = document.querySelector('.login');
let connect_pop = document.querySelector('.connexion');
let inscription_pop = document.querySelector('.inscription');
let article_pop = document.querySelector('.article-ajout');
let pop_ups = document.querySelectorAll('.pop-ups');
let buttons = document.querySelectorAll('button');

let connect_form = document.querySelector('.connexion form');
let inscription_form = document.querySelector('.inscription form');

let inscription_close = document.querySelector('.inscription .close');
// let article_close = document.querySelector('.article-ajout .close');
let connect_close = document.querySelector('.connexion .close');

let destoggle =document.querySelector('.b_toggle div:nth-child(1)');
let avistoggle =document.querySelector('.b_toggle div:nth-child(2)');

let ada =document.querySelector('.article_description_avis');
let hr =document.querySelector(' .hr');
let list_avis =document.querySelector('.list_avis');

let Adescr =document.querySelector('.article_description');
let Aavis =document.querySelector('.article_avis');



avistoggle.addEventListener('click',(e)=>{

  hr.style.display="block";
  list_avis.style.transitionDelay="0.2s";
  list_avis.style.display="block";
  list_avis.style.opacity="1";

   Adescr.style.opacity="0";
   Aavis.style.transitionDelay="0.2s";
   Adescr.style.transitionDelay="0.0s";
   Aavis.style.opacity="1";
   Aavis.style.pointerEvents="fill";
   ada.style.height=`${Aavis.clientHeight}px`;

})
destoggle.addEventListener('click',(e)=>{
   Adescr.style.opacity="1";
   Adescr.style.transitionDelay="0.2s";
   Aavis.style.transitionDelay="0.0s";
   hr.style.display="none";
   list_avis.style.transitionDelay="0.0s";
   list_avis.style.display="none";
   list_avis.style.opacity="0";

   Aavis.style.opacity="0";
   Adescr.style.pointerEvents="fill";
   ada.style.height=`${Adescr.clientHeight}px`;
})

let aside = document.querySelector(".aside");
let list_items = document.querySelectorAll(".a_bottom ul li");
let aside1 = document.querySelector(".aside1");
let bgr = document.querySelector(".burgr");
aside1.addEventListener("click",()=>{
   aside.style.left="-80vw";
   aside.style.zIndex="1";
   aside1.style.zIndex="-3";
   aside1.style.opacity="0";
   
   list_items.forEach((element,index)=>{
      element.style.animation=`fadeOut 0.9s linear ${0.0 + index/2}s forwards `;
      // alert("eee")
   })
});
bgr.addEventListener("click",()=>{
   aside.style.left="0vw";
   aside.style.zIndex="3";
   aside1.style.zIndex="2";
   aside1.style.opacity="1";
  
   list_items.forEach((element,index)=>{
      element.style.animation=`fadeIn 0.7s linear ${0.4 + index/6}s forwards `
   })

});

//  let slide_els = document.querySelectorAll(".el");
//  let index=1;

//  function slideShow(){
   
//    if(index <= (slide_els.length - 1 )){
//       slide_els[index-1].style.opacity="0";
//       slide_els[index ].style.opacity="1";
//    }
//    else{
//       for(var i=0 ; i<slide_els.length ; i++ ){
//          slide_els[i].style.opacity="0";
//       }
//       slide_els[0].style.opacity="1";
//       index=0;
//    }
  
 

   
//    index++;

//  }

window.onload=function(){
   // setInterval(slideShow,12000);
   console.log(window.innerHeight);
   ada.style.height=`${Adescr.clientHeight}px`;
   
}
window.onresize=function(){
   ada.style.height=`${Adescr.clientHeight}px`;
   // ada.style.height=`${Aavis.clientHeight}px`;
}



connect_close.addEventListener('click',()=>{
   connect_pop.classList.toggle("active");
   blackbgPoups.classList.toggle("active");

})


inscription_close.addEventListener('click',()=>{
  
   connect_pop.classList.toggle("active");
   blackbgPoups.style.pointerEvents="painted";
   inscription_pop.classList.toggle("active");

})


buttons.forEach((button , index)=>{
   button.addEventListener('click',(e)=>{
      
         // alert(e.target.getAttribute("id"));
         article_pop.classList.toggle("active") ;
         blackbgPoups.classList.toggle("active");
   })
})



login.addEventListener('click',()=>{
   connect_pop.classList.toggle("active");
   blackbgPoups.classList.toggle("active");
})

blackbgPoups.addEventListener('click',()=>{
  pop_ups.forEach((element , index)=>{
      element.classList.remove("active")
  })
  blackbgPoups.classList.toggle("active");
})

inscription.addEventListener('click',()=>{
   connect_pop.classList.toggle("active");
   blackbgPoups.style.pointerEvents="none";
   inscription_pop.classList.toggle("active");
})

let Amodify = document.querySelector(".fa-pencil");
let Atext = document.querySelector(".avis .text");


Amodify.addEventListener("click",()=>{
   Atext.innerText;
   Atext.innerHTML=`<textarea class='modifyTextarea'>${Atext.innerText}</textarea>`;
   Atext.focus()

})


// article_close.addEventListener('click',()=>{
//    article_pop.classList.toggle("active");
//    blackbgPoups.classList.toggle("active");
// })

connect_form.addEventListener('submit',(e)=>{
   e.preventDefault();
   alert("Let's ROck'n'Roll")
})

xhr = new XMLHttpRequest();
xhr.open(Get , "", true)

