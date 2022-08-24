let blackbgPoups = document.querySelector('.blackbgPoups');
let inscription = document.querySelector('.insc_span');
let login = document.querySelectorAll('.login');
let Out = document.querySelector('.Out');
let connect_pop = document.querySelector('.connexion');
let inscription_pop = document.querySelector('.inscription');
let article_pop = document.querySelector('.article-ajout');
let pop_ups = document.querySelectorAll('.pop-ups');
let buttons = document.querySelectorAll('button');
let Add = document.querySelector('Add');

let connect_form = document.querySelector('.connexion form');
let inscription_form = document.querySelector('.inscription form');

let inscription_close = document.querySelector('.inscription .close');
let article_close = document.querySelector('.article-ajout .close');
let connect_close = document.querySelector('.connexion .close');


let aside = document.querySelector(".aside");
let list_items = document.querySelectorAll(".a_bottom ul li");
let aside1 = document.querySelector(".aside1");
let bgr = document.querySelector(".burgr");
aside1.addEventListener("click",()=>{
   aside.style.left="-90vw";
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


window.onload=function(){
    setInterval(slideShow,12000);
    console.log(window.innerHeight);
    // ada.style.height=`${Adescr.clientHeight}px`;
 }
 window.onresize=function(){
    // ada.style.height=`${Adescr.clientHeight}px`;
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


 
 if(login){

   //  array.forEach(element => {
      
   //  });
   login.forEach(element => {
      element.addEventListener('click',()=>{
         connect_pop.classList.toggle("active");
         blackbgPoups.classList.toggle("active");
      })
   });
 
 }

 if ( Out ){
  Out.addEventListener("click",()=>{
   let url="ConnectionInscription.php?Deconnection="+1 ;

   xhr = new XMLHttpRequest();
   xhr.open("Get" , url , true);
  
     
 
   setTimeout(()=>{
      location.reload();
   },2000)
   setTimeout(()=>{
      logOut.classList.toggle("active")
   },800)
   

   xhr.send();
})

 }

 
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


 let slide_els = document.querySelectorAll(".el");
 let index=1;

 function slideShow(){
   
   if(index <= (slide_els.length - 1 )){
      slide_els[index-1].style.opacity="0";
      slide_els[index ].style.opacity="1";
   }
   else{
      for(var i=0 ; i<slide_els.length ; i++ ){
         slide_els[i].style.opacity="0";
      }
      slide_els[0].style.opacity="1";
      index=0;
   }
  
 

   
   index++;

 }

 article_close.addEventListener('click',()=>{
   
   article_pop.classList.toggle("active");
   blackbgPoups.classList.toggle("active");
})

/* ------------------------- Ajax Formulaires -------------------------------------- */

let emailC = document.querySelector(".connexion form .input.email #email_c");
let PasseWC = document.querySelector(".connexion form .input.password #passe_c");
let Passeph = document.querySelector(".connexion form .input.password ");
let ConShow = document.querySelector(".connexion .show");
let ConHide = document.querySelector(".connexion .hidden");
let ph= document.querySelector(".connexion form .input.password .phenomenO");
let ewarningC = document.querySelector(".connexion .input.email .icon-notifier-warning");
let esuccessC = document.querySelector(".connexion .input.email .icon-notifier-success");
let passsuccessC = document.querySelector(".connexion .input.password .icon-notifier-success");
let passWarningC= document.querySelector(".connexion .input.password .icon-notifier-warning");
let echeCK =null;
let pcheCK =null;

PasseWC.addEventListener('focusout',()=>{
   let url = "ConnectionInscription.php?passeC="+PasseWC.value+"&emailC="+emailC.value+"&passeChecK="+true ;

   if(PasseWC.value!="" && emailC.value!=""){
 
    xhr = new XMLHttpRequest();
    xhr.open("Get" , url , true);
    xhr.responseType="json";
  
    xhr.onreadystatechange = function(){
   
       if(this.readyState === 4 && this.status === 200){
          //   alert(this.response.ebool)
          if( this.response.ebool ===  true ){
                passsuccessC.style="display:block";
                passWarningC.style="display:none";
                pcheCK=true
          }
          else{
                passsuccessC.style="display:none";
                passWarningC.style="display:block";
                pcheCK=false
          }
 
       }
    }
   
 
    xhr.send()
   }
   else{
         
    passsuccessC.style="display:none";
    passWarningC.style="display:none";
   
 
 }
 if(emailC.value==""){
    esuccessC.style="display:none";
    ewarningC.style="display:block";
 }
})

emailC.addEventListener('focusout',()=>{
  
})

PasseWC.addEventListener('keyup' , ()=>{

   let url = "ConnectionInscription.php?passeC="+PasseWC.value+"&emailC="+emailC.value+"&passeChecK="+true ;

  if(PasseWC.value!="" && emailC.value!=""){

   xhr = new XMLHttpRequest();
   xhr.open("Get" , url , true);
   xhr.responseType="json";
 
   xhr.onreadystatechange = function(){
  
      if(this.readyState === 4 && this.status === 200){
         //   alert(this.response.ebool)
         if( this.response.ebool ===  true ){
               passsuccessC.style="display:block";
               passWarningC.style="display:none";
               pcheCK=true
         }
         else{
               passsuccessC.style="display:none";
               passWarningC.style="display:block";
               pcheCK=false
         }

      }
   }
  

   xhr.send()
  }
  else{
        
   passsuccessC.style="display:none";
   passWarningC.style="display:none";
  

}
if(emailC.value==""){
   esuccessC.style="display:none";
   ewarningC.style="display:block";
}



})


emailC.addEventListener('keyup',()=>{
   let url = "ConnectionInscription.php?emailCCon="+emailC.value ;
   

   if(emailC.value!=""){

      if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailC.value)){

         xhr = new XMLHttpRequest();
         xhr.open("Get" , url , true);
         xhr.responseType="json";
       
         xhr.onreadystatechange = function(){
        
            if(this.readyState === 4 && this.status === 200){
               //   alert(this.response.ebool)
               if( this.response.ebool ===  true ){
                     esuccessC.style="display:block";
                     ewarningC.style="display:none";
                     echeCK=true
                    
               }
               else{
                     ewarningC.style="display:block";
                     esuccessC.style="display:none";
                     echeCK=false
               }
      
            }
         }
      
         xhr.send()
      
      }
      else{
        
            esuccessC.style="display:none";
            ewarningC.style="display:block";
           
      
      }
   }
   else{
      esuccessC.style="display:none";
      ewarningC.style="display:none";
   }
  
})


Passeph.addEventListener("mouseover" ,()=>{
   ph.style="display:block"
})
Passeph.addEventListener("mouseout" ,()=>{
   ph.style="display:none"
})

ConHide.addEventListener("click",()=>{
   ConHide.style="opacity:0;pointer-events:none;display:none";
   ConShow.style='opacity:1;pointer-events:fill;display:block';
   PasseWC.setAttribute("type","password")
})
ConShow.addEventListener("click",()=>{
   ConShow.style="opacity:0;pointer-events:none;display:none";
   ConHide.style='opacity:1;pointer-events:fill;display:block';
   PasseWC.setAttribute("type","text")
})

connect_form.addEventListener('submit',(e)=>{
  
   e.preventDefault();
   let url = "ConnectionInscription.php?emailC="+emailC.value+"&passeC="+PasseWC.value+"&connect="+true ;

  console.log(pcheCK && echeCK);
  
   if(pcheCK && echeCK){

      let url = "ConnectionInscription.php?emailC="+emailC.value+"&passeC="+PasseWC.value+"&connect="+true ;

      xhr = new XMLHttpRequest();
      xhr.open("Get" , url , true);
      // xhr.responseType="json";
      xhr.onreadystatechange = function(){
      
      if(this.readyState == 4 && this.status === 200 ){
         

      }

      let SubCon = document.querySelector("#Submit-Connect");
      SubCon.value ="Patienter un instant ..." ;
      SubCon.style="background-color:rgba(0,0,0,0.2)";
   
      setTimeout(()=>{
         SubCon.value ="Operation réussie !" ;
         SubCon.style="background-color:rgba(0,200,0,0.3);color:green";
         setTimeout(()=>{
            SubCon.value ="Connectez-vous" ;
            SubCon.style="";
            emailC.value="";
            PasseWC.value="";
            passsuccessC.style="display:none";
            esuccessC.style="display:none";
            SubCon.style="";
            
         },6000)
      },3000);
   
      setTimeout(()=>{
         connect_pop.classList.remove("active");
         blackbgPoups.classList.remove("active");

       
      },5000)
      setTimeout(()=>{
         location.reload();
      },6000)
      
    
    }
    xhr.send();
   

   }

   if(PasseWC.value == ""){
        
      passsuccessC.style="display:none";
      passWarningC.style="display:block";
     
   
   }
   if(emailC.value == ""){
       
      esuccessC.style="display:none";
      ewarningC.style="display:block";
     
   
   }
   
  

})




/*   ----------------------    Inscription      ---------------------------------------------------- */
let nomI = document.querySelector(".inscription form .input.nom #nom_i");
let prenomI = document.querySelector(".inscription form .input.prenom #prenom_i");
let emailI = document.querySelector(".inscription form .input.email #email_i");
let PasseWI = document.querySelector(".inscription form .input.password #passe_i");
let dateI = document.querySelector(".inscription form .input.date #date_i");
let PasseCI = document.querySelector(".inscription form .input.passwordConfirm #passec_i");
let PasseCIph = document.querySelector(".inscription form .input.password");
let phI= document.querySelector(".inscription form .input.password .phenomenO");
let ConHideI = document.querySelector(".inscription .hidden");
let ConShowI = document.querySelector(".inscription  .show");
let ewarningI = document.querySelector(".inscription .input.email .icon-notifier-warning");
let esuccessI = document.querySelector(".inscription .input.email .icon-notifier-success");
let passsuccessI = document.querySelector(".inscription .input.passwordConfirm .icon-notifier-success");
let passWarningI = document.querySelector(".inscription .input.passwordConfirm .icon-notifier-warning");
let emailCheck = null ;

PasseCIph.addEventListener("mouseover" ,()=>{
   phI.style="display:block"
})
PasseCIph.addEventListener("mouseout" ,()=>{
   phI.style="display:none"
})

ConHideI.addEventListener("click",()=>{
   ConHideI.style="opacity:0;pointer-events:none;display:none";
   ConShowI.style='opacity:1;pointer-events:fill;display:block';
   PasseWI.setAttribute("type","password")
})
ConShowI.addEventListener("click",()=>{
   ConShowI.style="opacity:0;pointer-events:none;display:none";
   ConHideI.style='opacity:1;pointer-events:fill;display:block';
   PasseWI.setAttribute("type","text")
})


emailI.addEventListener('focusout',(e)=>{
   // esuccessI.style="display:block";
   let url = "ConnectionInscription.php?emailI="+emailI.value ;

   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailI.value)){

   xhr = new XMLHttpRequest();
   xhr.open("Get" , url , true);
   xhr.responseType="json";
 
   xhr.onreadystatechange = function(){
  
      if(this.readyState === 4 && this.status === 200){
         //   alert(this.response.ebool)
         if( this.response.ebool === false ){
               esuccessI.style="display:block";
               ewarningI.style="display:none";
               emailCheck=false
         }
         else{
               ewarningI.style="display:block";
               esuccessI.style="display:none";
               emailCheck=true
         }

      }
   }

  
   xhr.send()

}
else{
   ewarningI.style="display:block";
   esuccessI.style="display:none";

}

})

PasseCI.addEventListener('keyup',(e)=>{

   if(PasseCI.value != ""){

      if(PasseCI.value != PasseWI.value ){
         passWarningI.style="display:block";
         passsuccessI.style="display:none"
      }
      if(PasseCI.value == PasseWI.value ){
         passWarningI.style="display:none";
         passsuccessI.style="display:block"
      }
   
   }
   else{
      passWarningI.style="display:none";
      passsuccessI.style="display:none"
   }

})


PasseWI.addEventListener('keyup',(e)=>{


   if(PasseCI.value != ""){
   
      if(PasseCI.value != PasseWI.value ){
         passWarningI.style="display:block";
         passsuccessI.style="display:none"
      }
      if(PasseCI.value == PasseWI.value ){
         passWarningI.style="display:none";
         passsuccessI.style="display:block"
      }
   
   }
      
      
   })



/* ------------------------------------------------------ FORM ------------------------------------------ */

inscription_form.addEventListener('submit',(e)=>{

   e.preventDefault();
  

   if(PasseWI.value!="" && PasseCI.value!="" && emailI.value!="" && nomI.value!=""  && prenomI.value!="" && dateI.value!=""){
      if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailI.value)){

      
         if(  PasseWI.value === PasseCI.value  && emailCheck === false ){

            // let dataInsc = []; 
            // dataInsc["nomI"]= nomI.value;
            // dataInsc["prenomI"]= prenomI.value;
            // dataInsc["passeWI"]= PasseWI.value;
            // dataInsc["emailI"]= emailI.value;
            // dataInsc["dateI"]= dateI.value;


            let url="ConnectionInscription.php?nomI="+nomI.value+"&prenomI="+prenomI.value+"&passeWI="+PasseWI.value+"&email="+emailI.value+"&dateI="+dateI.value ;

            xhr = new XMLHttpRequest();
            xhr.open("Get" , url , true);

            xhr.send();
              
            let Subinsc = document.querySelector("#Submit-insc");
            Subinsc.value ="Patienter un instant ..." ;
            Subinsc.style="background-color:rgba(0,0,0,0.1)";

            setTimeout(()=>{
               Subinsc.value ="Operation réussie !" ;
               Subinsc.style="background-color:rgba(0,200,0,0.1);color:green";
               setTimeout(()=>{
                  Subinsc.value ="Inscrivez-vous" ;
                  Subinsc.style="";
                  nomI.value="";
                  prenomI.value="";
                  PasseWI.value="";
                  emailI.value="";
                  dateI.value="";
                  Subinsc.style="";
                  
               },6000)
            },3000);
            setTimeout(()=>{
               connect_pop.classList.toggle("active");
               blackbgPoups.style.pointerEvents="painted";
               inscription_pop.classList.toggle("active");
            },6000)

            xhr.responseType="json"
   

            // let i = document.createElement("div")
            // i.innerHTML="neldnzend";
            // i.setAttribute("style","background-color:red;color:yellow;text-align:center");
            // inscription_form.appendChild(i)
         }
         else{
            alert(emailCheck);
         }
   
      }
      
      }
   
      

})

let signOut =document.querySelector(".logOut .user");
let logOut =document.querySelector(".logOut #logOut");

if(signOut){
   signOut.addEventListener("click" ,()=>{
      logOut.classList.toggle("active")
   })
   
   let loGout = document.querySelector("#logOut span");
   loGout.addEventListener("click",()=>{
      let url="ConnectionInscription.php?Deconnection="+1 ;
   
      xhr = new XMLHttpRequest();
      xhr.open("Get" , url , true);
     
        
    
      setTimeout(()=>{
         location.reload();
      },2000)
      setTimeout(()=>{
         logOut.classList.toggle("active")
      },800)
      
   
      xhr.send();
   })
   
}




function AjouterInf( IdArticle ) {

let ImagesArt = document.querySelector(".article_menu img");
let Imagesh3 = document.querySelector(".article_menu .title h3");
let ImagesPrix = document.querySelector(".article_menu .title .span_b");
let ImagesDesc = document.querySelector(".article_menu .description");
let ImagesQt = document.querySelector(".article_menu #qté");
let ImagesB = document.querySelector("Add");
let reduce= document.querySelector(".article_menu .decrease");
let add = document.querySelector(".article_menu .increase");


let url="ConnectionInscription.php?AjoutInf="+IdArticle ;
   
      xhr = new XMLHttpRequest();
      xhr.open("Get" , url , true);
   
      xhr.onreadystatechange= function(){
         if(this.readyState === 4 && this.status === 200){

            ImagesB.setAttribute("onclick","Ajouter("+this.response.id+")");
            ImagesB.setAttribute("id",this.response.id);
            Imagesh3.innerHTML=""+this.response.Designation+"";
            ImagesPrix.innerHTML=""+this.response.Prix+" euros";
            ImagesDesc.innerHTML=""+this.response.Descriptions+"";
            ImagesQt.innerHTML=""+1+""
            ImagesArt.setAttribute("src",this.response.url);
            reduce.setAttribute("onclick","decrease("+this.response.id+")");
            add.setAttribute("onclick"," increase("+this.response.id+")");

         }
      }
      xhr.responseType="json"
      xhr.send();

}

function increase(identifiant){
   
   let ImagesQt = document.querySelector(".article_menu #qté");
   let count =  ImagesQt.innerHTML;
   
    count = parseInt(count);
    
    if(count < 100){
      count++;
      ImagesQt.innerHTML = count;
     
      
      }
   


}

function decrease(identifiant){
//
let ImagesQt = document.querySelector(".article_menu #qté");
let count =  ImagesQt.innerHTML;

 count = parseInt(count);
 
 if(count> 1){
 count--;
 ImagesQt.innerHTML = count;

 
 }
} 

function Ajouter(id){

   let ImagesQt = document.querySelector(".article_menu #qté");
   let ImagesB = document.querySelector("Add");

   let url="ConnectionInscription.php?AddThis="+parseInt(id)+"&Qt="+parseInt(ImagesQt.innerHTML);
   
   xhr = new XMLHttpRequest();
   xhr.open("Get" , url , true);
  
   xhr.onreadystatechange= function(){
      if(this.readyState === 4 && this.status === 200){

        if( this.response.AddBool == true){
           let text  ="<div style='display:flex;margin:0px;line-height:45px;justify-content:center;";
            text +="background-color:rgba(0,225,0,0.3);border-color:Green;color:green;text-align:center'> Ajouté <i  style='margin-left:8px'class='fa fa-check-circle' aria-hidden='true'></i></div>";
            ImagesB.innerHTML = text;
            ImagesB.setAttribute("style","border-color:Green;background-color:white;color:white;pointer-events:none");
            setTimeout(()=>{
               ImagesB.innerHTML = "Ajouter";
               ImagesB.setAttribute("style","pointer-events:fill");
            },2000)
        }
        else{
         let text  ="<div style='display:flex;margin:0px;line-height:45px;justify-content:center;";
            text +="background-color:rgba(225,0,0,0.3);border-color:red;color:red;text-align:center'> Maximum  <i style='margin-left:8px'class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i></div>";
            ImagesB.innerHTML = text;
            ImagesB.setAttribute("style","border-color:red;background-color:white;color:white;pointer-events:none");
            setTimeout(()=>{
               ImagesB.innerHTML = "Ajouter";
               ImagesB.setAttribute("style","pointer-events:fill");
            },2000)
        }

      }
   }
   xhr.responseType="json"
   xhr.send();

}