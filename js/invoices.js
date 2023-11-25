    // var swiper = new Swiper('.swiper-container', {
	//       slidesPerView: 4,
	//       spaceBetween: 1,

	//       navigation: {
    //     	nextEl: '.swiper-button-next',
    //     	prevEl: '.swiper-button-prev',
    //   		},
	//       breakpoints: {
	//         1024: {
	//           slidesPerView: 4,
	//           spaceBetween: 1,
	//         },
	//         768: {
	//           slidesPerView: 3,
	//           spaceBetween: 1,
	//         },
	//         640: {
	//           slidesPerView: 2,
	//           spaceBetween: 1,
	//         },
	//         320: {
	//           slidesPerView: 3,
	//           spaceBetween: 1,
	//         }
	//       }
	//   });
	  document.querySelectorAll('a.toggle-vis').forEach((el) => {
    el.addEventListener('click', function (e) {
        e.preventDefault();
 
        let columnIdx = e.target.getAttribute('data-column');
        let column = table.column(columnIdx);
 
        // Toggle the visibility
        column.visible(!column.visible());
    });
});
