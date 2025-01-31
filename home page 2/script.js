var swiper = new Swiper(".mySwiper", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    grabCursor:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  const locoScroll = new LocomotiveScroll({
    el: document.querySelector(".main"),
    smooth: true,
  });


  function animal(){
    window.location.href="../movie/animal.php"
  }
  function arjun(){
    window.location.href="../movie/arjun-reddy.php"
  }
  function atal(){
    window.location.href="../movie/atal.php"
  }
  function barbie(){
    window.location.href="../movie/barbie.php"
  }
  function fast(){
    window.location.href="../movie/fast-x.php"
  }
  function gadar(){
    window.location.href="../movie/gadar.php"
  }
  function ib(){
    window.location.href="../movie/ib71.php"
  }
  function jailer(){
    window.location.href="../movie/jailer.php"
  }
  function jhon(){
    window.location.href="../movie/jhon.php"
  }
  function joker(){
    window.location.href="../movie/joker.php"
  }
  function leo(){
    window.location.href="../movie/leo.php"
  }
  function oppenhimer(){
    window.location.href="../movie/oppenhimer.php"
  }
  function rrr(){
    window.location.href="../movie/rrr.php"
  }
  function salaar(){
    window.location.href="../movie/salaar.php"
  }
  