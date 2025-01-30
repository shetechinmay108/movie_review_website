document.querySelector(".signUpPage .closeSignUp").addEventListener("click",()=>{ 
    gsap.to(".signUpPage",{
        right:"-100%"
    })
})
 
const closeSignIn = document.querySelector(".closeSignIn");
closeSignIn.addEventListener("click", () => {
  gsap.to(".signInPage", {
    right: "-100%",
    ease: "elastic.out(0.5,1)",
  });
});
 


document.querySelector("#signIn").addEventListener("click",()=>{ 
    gsap.to(".signUpPage",{
        right:"0%"
    })
})
document.querySelector("#signUp").addEventListener("click",()=>{
    gsap.to(".signInPage",{
        right:"0%"
    })
})