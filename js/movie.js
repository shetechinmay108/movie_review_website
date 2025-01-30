const locoScroll = new LocomotiveScroll({
    el: document.querySelector(".main"),
    smooth: true,
  });

  let redirect = () => {
    alert('Please Sign In..!')
    window.location.href="../index.php"
}
// let animal = ()=>{
//   window.location.href="../movie/animal.php"
// }

function animal(){
  window.location.href="../movie/animal.php"
}