var proj = (function ($) {
  function afterLoad() {

	// observer, para animação na rolagem da página
	var observer = new IntersectionObserver(handleIntersection, { threshold: [0.3] });
	function handleIntersection(entries, observer){
		entries.forEach(entry => {
			if (entry.intersectionRatio > 0.3) {
				$(entry.target).addClass('ativa-animacao');
				observer.unobserve(entry.target); //roda apenas uma vez
			}
		});
	}

	$(".observe-me").each(function (index) {
		var cada = $(this);
		observer.observe(cada[0]);
	});

	$('.js-menu-mob').on('click', function(e){
		e.preventDefault();
		$('.section-header, .burger').toggleClass('show-mob');
	});

	// Estado inicial
	var scrollPos = 0;
	var sHeader = $('.section-header');
	// evento scroll
	window.addEventListener('scroll', function () {
	if ((document.body.getBoundingClientRect()).top > scrollPos) {
		//console.log('sobe', scrollPos);
		if (scrollPos <= -20) {
		sHeader.addClass('fativo');
		} else {
		//sHeader.removeClass('fativo');
		}
	} else {
		//console.log('desce', scrollPos);
		sHeader.removeClass('fativo');
	}
	scrollPos = (document.body.getBoundingClientRect()).top;
	});
    
    if ($(".slideshow-depoimentos").length > 0) {

      $(".slideshow-depoimentos").each(function (index) {
        slider = $(this);
        slider.slick({
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          prevArrow: slider.parent().find(".a-prev"),
          nextArrow: slider.parent().find(".a-next"),
          dots: false,
          adaptiveHeight: false,
		  responsive: [
            {
              breakpoint: 900,
              settings: {
                variableWidth: false,
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        });
      });

    }

	if ($(".slideshow-telas").length > 0) {

		$(".slideshow-telas").each(function (index) {
			slider = $(this);
			slider.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				prevArrow: slider.parent().find(".a-prev"),
				nextArrow: slider.parent().find(".a-next"),
				dots: true,
				adaptiveHeight: false,
				responsive: [
				{
					breakpoint: 900,
					settings: {
					variableWidth: false,
					slidesToShow: 1,
					slidesToScroll: 1,
					},
				},
				],
			});
		});

	}
	
	if ($(".slideshow-processo").length > 0) {

      $(".slideshow-processo").each(function (index) {
        slider = $(this);
        slider.slick({
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true,
          prevArrow: slider.parent().find(".a-prev"),
          nextArrow: slider.parent().find(".a-next"),
          dots: false,
          adaptiveHeight: false,
		  responsive: [
            {
              breakpoint: 900,
              settings: {
                variableWidth: false,
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        });
      });

    }

    $( ".ind-l1-c3" ).mouseenter(function() {
	  $( ".indica" ).removeClass('inativo');	
      $( ".ind-l1-c2, .ind-l2-c2, .ind-l2-c3" ).addClass('inativo');
	  $( ".preenchida" ).removeClass('ativo');
    });
    $( ".ind-l2-c2" ).mouseenter(function() {
	  $( ".indica" ).removeClass('inativo');
      $( ".ind-l2-c1, .ind-l3-c1, .ind-l3-c2" ).addClass('inativo');
	  $( ".preenchida" ).removeClass('ativo');
    });
    $( ".ind-l3-c3" ).mouseenter(function() {
	  $( ".indica" ).removeClass('inativo');
      $( ".ind-l3-c2, .ind-l2-c2, .ind-l2-c3" ).addClass('inativo');
	  $( ".preenchida" ).removeClass('ativo');
    });
    $( ".ind-l1-c3, .ind-l2-c2, .ind-l3-c3" ).mouseleave(function() {
		$( ".preenchida" ).removeClass('ativo');
        $( ".indica" ).removeClass('inativo');
    });

	// observer, para animação na rolagem da página
	var observerIndica = new IntersectionObserver(handleIntersectionIndica, { threshold: [0.3] });
	function handleIntersectionIndica(entries, observer){
		entries.forEach(entry => {
			if (entry.intersectionRatio > 0.3) {
				$( ".ind-l1-c3" ).addClass('ativo');
				$( ".ind-l1-c2, .ind-l2-c2, .ind-l2-c3" ).addClass('inativo');
				observer.unobserve(entry.target); //roda apenas uma vez
			}
		});
	}

	$(".observe-indica").each(function (index) {
		var cada = $(this);
		observerIndica.observe(cada[0]);
	});

    if ($('#vue-faq').length > 0) {
      var vue_faq = new Vue({
        el: '#vue-faq',
        data: {
          faq: parametros.faq,
          busca: '',
          tema: false,
        },
        methods: {
          abregaveta: function(oque) {
            $(oque.target).closest('.gaveta').toggleClass('ativo');
          },
        },
        computed: {
          temas_disponiveis: function () {
            var vthis = this;
            //return _.orderBy(_.uniq(_.flatten(_.map(vthis.faq, "tema"))));
            return _.uniq(_.flatten(_.map(vthis.faq, "tema")));
          },
          perguntas_filtradas: function(){
            var vthis = this;
            var retorno = vthis.faq;
            if (vthis.busca) {
              retorno = _.filter(retorno, function(o) {
                return _.reduce(_.map(_.split(vthis.busca, ' '), function(m) {
                  return _.includes(slugify(o.pergunta+' '+o.resposta), slugify(m));
                }), function(sum, n) {
                  return sum && n;
                }, true);
              })
            } else {
              if (vthis.tema) {
                retorno = _.filter(retorno, function(o) {
                  return o.tema == vthis.tema;
                })
              }
            }
            $( ".gaveta" ).removeClass('ativo');
            return retorno;
          }
        },
        created: function () {
          var vthis = this;
          vthis.tema = vthis.temas_disponiveis[0] || false; 
        }
      });
    }



  }

  return {
    inicializa: afterLoad,
  };
})(jQuery);

jQuery(document).ready(proj.inicializa);

function slugify(texto) {
  return texto
    .toString()
    .toLowerCase()
    .replace(/[àÀáÁâÂãäÄÅåª]+/g, "a") // Special Characters #1
    .replace(/[èÈéÉêÊëË]+/g, "e") // Special Characters #2
    .replace(/[ìÌíÍîÎïÏ]+/g, "i") // Special Characters #3
    .replace(/[òÒóÓôÔõÕöÖº]+/g, "o") // Special Characters #4
    .replace(/[ùÙúÚûÛüÜ]+/g, "u") // Special Characters #5
    .replace(/[ýÝÿŸ]+/g, "y") // Special Characters #6
    .replace(/[ñÑ]+/g, "n") // Special Characters #7
    .replace(/[çÇ]+/g, "c") // Special Characters #8
    .replace(/[ß]+/g, "ss") // Special Characters #9
    .replace(/[Ææ]+/g, "ae") // Special Characters #10
    .replace(/[Øøœ]+/g, "oe") // Special Characters #11
    .replace(/[%]+/g, "pct") // Special Characters #12
    .replace(/\s+/g, "-") // Replace spaces with -
    .replace(/[^\w\-]+/g, "") // Remove all non-word chars
    .replace(/\-\-+/g, "-") // Replace multiple - with single -
    .replace(/^-+/, "") // Trim - from start of text
    .replace(/-+$/, ""); // Trim - from end of text
}